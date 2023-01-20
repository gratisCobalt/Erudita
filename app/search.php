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
  <div class="container">
    <div class="mt-3 mb-3">
      <h1 class="text-center" id="heading">Suchergebnisse für "<?php echo $query; ?>"</h1>
    </div>
    <ul class="list-group">
      <?php include_once('article_cards.php'); ?>
    </ul>
  </div>

  <?php require_once('./components/footer.php'); ?>

</html>