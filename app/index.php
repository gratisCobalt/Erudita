<?php

require_once('./components/navbar.php');

$articles = getArticles();

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Erudita</title>
</head>

<body>
  <div class="container">
    <h1 id="heading" class="text-center mb-2 mt-5 display-4">Willkommen bei Erudita!</h1>
    <div class="text-center mb-5 text-warning">Wir stehen für freies Wissen!</div>
    <img src="assets/v2.png" alt="Logo" class="mx-auto d-block mb-5" width="256" height="256">

    <form id="search" method="get" action="search.php" class="form-inline justify-content-center mb-5">
      <input type="text" class="form-control form-control-lg mb-5" name="query" placeholder="Suche">
      <button type="submit" class="btn btn-lg mx-2 mb-5 bg-warning">Los</button>
    </form>

    <hr class="my-4 mb-5">

    <h2 class="text-center mb-4 h2">Beliebte Artikel</h2>
    <ul class="list-unstyled">
      <?php
      include_once('article_cards.php');
      ?>
    </ul>
  </div>

  <?php require_once('./components/footer.php'); ?>
  <script src="https://apps.elfsight.com/p/platform.js" defer></script>
  <div class="elfsight-app-43131585-678d-4400-acd2-7f5f22620c11"></div>
</body>

</html>