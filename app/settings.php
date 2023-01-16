<?php


require_once('./components/navbar.php');

if (!isset($_SESSION['user'])) {
  header('Location: login.php');
  exit;
}

$user = getUser($_SESSION['user']);


?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Einstellungen - Erudita</title>
  
</head>

<body>

</body>

<?php require_once('./components/footer.php'); ?>

</html>