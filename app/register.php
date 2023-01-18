<?php

require_once('./components/navbar.php');

if (isset($_SESSION['user'])) {
  header('Location: index.php');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = htmlspecialchars($_POST['username']);
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);
  $password_repeat = htmlspecialchars($_POST['password_repeat']);
  $first_name = htmlspecialchars($_POST['first_name']);
  $last_name = htmlspecialchars($_POST['last_name']);

  if (register($username, $email, $password, $password_repeat, $first_name, $last_name)) {
    $_SESSION['user'] = $username;
    header('Location: index.php');
    exit;
  } else {
    $error = 'Registrierung fehlgeschlagen';
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Registrieren - Erudita</title>

</head>

<body>
  <div class="container mt-5">

    <div class="row">
      <div class="col-12">
        <h1 id="heading" class="mb-4">Registrieren</h1>
        <?php if (isset($error)): ?>
          <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="post" action="register.php">
          <div class="form-group">
            <label for="username">Nutzername</label>
            <input type="text" class="form-control" name="username" id="username" required>
          </div>
          <div class="form-group">
            <label for="first_name">Vorname</label>
            <input type="text" class="form-control" name="first_name" id="first_name" required>
          </div>
          <div class="form-group">
            <label for="last_name">Nachname</label>
            <input type="text" class="form-control" name="last_name" id="last_name" required>
          </div>
          <div class="form-group">
            <label for="email">E-Mail</label>
            <input type="email" class="form-control" name="email" id="email" required>
          </div>
          <div class="form-group">
            <label for="password">Passwort</label>
            <input type="password" class="form-control" name="password" id="password" required>
          </div>
          <div class="form-group">
            <label for="password_repeat">Passwort wiederholen</label>
            <input type="password" class="form-control" name="password_repeat" id="password_repeat" required>
          </div>
          <div class="form-group">
            <div class="g-recaptcha" data-sitekey="<?php echo $site_key; ?>"></div>
          </div>
          <button type="submit" class="btn btn-warning">Registrieren</button>
        </form>
        <p>Bereits Mitglied? <a href="register.php">Hier einloggen</a>!</p>
      </div>
    </div>
  </div>
  <!-- JavaScript-Code von Google einfügen -->
  <script src='https://www.google.com/recaptcha/api.js'></script>
</body>

<?php require_once('./components/footer.php'); ?>

</html>