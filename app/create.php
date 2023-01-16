<?php

require_once('./components/navbar.php');

if (!isset($_SESSION['user'])) {
  echo '<div class="alert alert-warning" role="alert">You must be <a href="login.php">logged in</a> to create an article.</div>';
} else {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $cover_image_url = $_FILES['cover_image_url'];
    $author_id = getUser($_SESSION['user'])['id'];
    $category_id = $_POST['category_id'];


    $cover_image_name = "./uploads/article-" . uniqid() . '.' . pathinfo($cover_image_url['tmp_name'], PATHINFO_EXTENSION);
    echo $cover_image_url['tmp_name'] . " - " . $cover_image_name;

    try {
      // Validate input
      if (empty($title) || empty($content) || empty($cover_image_url) || empty($author_id) || empty($category_id)) {
        throw new Exception("All fields are required.");
      }

      // Check if cover image is valid
      if (!is_uploaded_file($cover_image_url['tmp_name']) || !exif_imagetype($cover_image_url['tmp_name'])) {
        throw new Exception("Invalid cover image.");
      }

      // Check if author ID is valid
      if (!isValidAuthorId($author_id)) {
        throw new Exception("Invalid author ID.");
      }

      // Check if category ID is valid
      if (!isValidCategoryId($category_id)) {
        throw new Exception("Invalid category ID.");
      }

      // Move cover image to uploads folder and rename it
      $cover_image_name = "./uploads/article-" . uniqid() . '.' . pathinfo($cover_image_url['tmp_name'], PATHINFO_EXTENSION);
      move_uploaded_file($cover_image_url['tmp_name'], $cover_image_name);

      // Create article
      $article_id = createArticle($title, $content, $cover_image_name, $author_id, $category_id);

      header('Location: article_post.php?id=' . $article_id);
      exit;
    } catch (Exception $e) {
      echo '<div class="alert alert-danger" role="alert">' . $e->getMessage() . '</div>';
    }
  }
}

$categories = getCategories();

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Artikel erstellen - Erudita</title>
</head>

<body>
  <h1 id="heading" class="text-center mt-3">Artikel erstellen</h1>
  <form method="post" action="create.php" class="container mt-5" enctype="multipart/form-data">
    <div class="form-group">
      <label for="cover_image_url">Cover Bild</label>
      <input type="file" name="cover_image_url" id="cover_image_url" accept="image/*" class="form-control">
    </div>
    <div class="form-group">
      <label for="title">Titel</label>
      <input type="text" name="title" id="title" required class="form-control">
    </div>
    <div class="form-group">
      <label for="content">Inhalt</label>
      <textarea name="content" id="content" required class="form-control"></textarea>
    </div>
    <div class="form-group">
      <label for="category_id">Category</label>
      <select name="category_id" id="category_id" class="form-control">
        <?php foreach ($categories as $category): ?>
          <option value="<?php echo $category['id']; ?>">
            <?php echo $category['name']; ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <button type="submit" class="btn btn-primary" <?php if (!isset($_SESSION['user'])): ?>disabled<?php endif; ?>>Erstellen</button>
  </form>
</body>

<?php require_once('./components/footer.php'); ?>

</html>