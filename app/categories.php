<?php

require_once('./components/navbar.php');

$categories = getCategories();

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Category Overview</title>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-5">Category Overview</h1>
        <div class="row">
            <?php foreach ($categories as $category): ?>
                <div class="col-3 mb-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="https://picsum.photos/200/200?id=<?php echo $category['id']; ?>" class="card-img-top mb-3" alt="Cover image"></img>
                            <h5 class="card-title"><?php echo $category['name']; ?></h5>
                            <a href="category.php?id=<?php echo $category['id'] ?>" class="btn btn-warning">View Category</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

<?php require_once('./components/footer.php'); ?>

</html>