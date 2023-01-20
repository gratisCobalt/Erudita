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
    <div class="px-4 py-5 my-5 text-center">
      <h1 class="display-5 fw-bold"><span class="text-warning">Sign Up</span></h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Creating an account allows you to access all of our services and features, including the
          ability to create and edit entries.
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h1 id="heading" class="mb-4">Registrieren</h1>
        <?php if (isset($error)): ?>
          <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="post" action="register.php">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Choose your username"
              required>
          </div>
          <div class="form-group">
            <label for="first_name">Prename</label>
            <input type="text" class="form-control" name="first_name" id="first_name"
              placeholder="Please enter your first name" required>
          </div>
          <div class="form-group">
            <label for="last_name">Surname</label>
            <input type="text" class="form-control" name="last_name" id="last_name"
              placeholder="Please enter your last name" required>
          </div>
          <div class="form-group">
            <label for="email">E-Mail</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Please provide your email"
              required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Choose a password"
              required>
          </div>
          <div class="form-group">
            <label for="password_repeat">Repeat password</label>
            <input type="password" class="form-control" name="password_repeat" id="password_repeat"
              placeholder="Please repeat your password" required>
          </div>
          <div class="form-group">
            <div class="g-recaptcha" data-sitekey="<?php echo $site_key; ?>"></div>
          </div>
          <button type="submit" class="btn btn-warning">Sign Up</button>
        </form>
        <p>If you already are a menber, please <a href="register.php">sign in</a>!</p>
        <p class="text-muted">We take the protection of your personal information seriously, and use industry-standard
          encryption to keep your data safe. If you have any questions or concerns about the security of your account,
          please don't hesitate to contact us.</p>
      </div>
    </div>
  </div>
  <!-- JavaScript-Code von Google einfügen -->
  <script src='https://www.google.com/recaptcha/api.js'></script>
</body>

<?php require_once('./components/footer.php'); ?>

</html>