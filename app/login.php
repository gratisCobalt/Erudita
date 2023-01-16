<?php


require_once('./components/navbar.php');

if (isset($_SESSION['user'])) {
  header('Location: index.php');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);

  if (login($username, $password)) {
    $_SESSION['user'] = $username;
    header('Location: index.php');
    exit;
  } else {
    $error = 'Falscher Nutzername oder Passwort';
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Anmelden - Erudita</title>

</head>

<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-12">
        <h1 id="heading" class="mb-4">Anmelden</h1>
        <?php if (isset($error)): ?>
          <div class="alert alert-danger">
            <?php echo $error; ?>
          </div>
        <?php endif; ?>
        <form method="post" action="login.php">
          <div class="form-group">
            <label for="username">Nutzername</label>
            <input type="text" class="form-control" name="username" id="username" required>
          </div>
          <div class="form-group">
            <label for="password">Passwort</label>
            <input type="password" class="form-control" name="password" id="password" required>
          </div>
          <button type="submit" class="btn btn-warning btn-sm">Anmelden</button>
        </form>
        <p>Noch kein Konto? <a href="register.php">Hier registrieren</a>!</p>
      </div>
    </div>
  </div>
</body>

<?php require_once('./components/footer.php'); ?>

</html>