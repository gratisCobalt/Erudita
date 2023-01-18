<?php

require_once('./components/navbar.php');

$articles = getArticlesFromCategory($_GET['id']);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Artikel Übersicht</title>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-5">Kategorie:
            <span class="text-warning">
                <?php echo getCategoryByID($_GET['id'])['name'] ?>
            </span>
        </h1>
        <div class="row">
            <?php
            include_once('article_cards.php');
            ?>
        </div>
    </div>
</body>

<?php require_once('./components/footer.php'); ?>

</html>
