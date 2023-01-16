<?php


require_once('./components/navbar.php');

$query = htmlspecialchars($_GET['query']);
$articles = searchArticles($query);
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Suchergebnisse - Erudita</title>
  
</head>

<body>
  
  <h1 id="heading">Suchergebnisse für "<?php echo $query; ?>"</h1>
  <ul>
    <?php
    foreach ($articles as $article) {
      echo '<li><a href="article_post.php?id=' . $article['id'] . '">' . $article['title'] . '</a></li>';
    }
    ?>
  </ul>
</body>

<?php require_once('./components/footer.php'); ?>

</html>
