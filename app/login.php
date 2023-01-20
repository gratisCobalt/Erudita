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
    <div class="px-4 py-5 my-5 text-center">
      <h1 class="display-5 fw-bold text-warning">Sign In</h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Here at Erudita, we value your security and privacy. That's why we have implemented a
          secure login system to protect your personal information and ensure that only you have access to your account.
        </p>
      </div>
    </div>
    <div class="row align-items-md-stretch">
      <div class="col-md-6">
        <?php if (isset($error)): ?>
          <div class="alert alert-danger">
            <?php echo $error; ?>
          </div>
        <?php endif; ?>
        <div class="h-100 p-5 bg-light border rounded-lg">
          <form method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username"
                required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" id="password"
                placeholder="Enter your password" required>
            </div>
            <input type="submit" class="btn btn-warning mb-3" name="login" value="Log in">
          </form>
        </div>
      </div>
      <div class="col-md-6">
        <div class="h-100 p-5 bg-light border rounded-lg">
          <h2>How to use.</h2>
          <hr>
          <p>We are glad you are here and want to make sure you have a seamless experience while accessing your account.
            Whether you are a professional or a new user, logging in is quick and easy. Simply enter your username and
            password in the fields provided and click "Log in".</p>
          <p class="text-muted">If you are a new user, you can <a href="register.php">create a new account</a>.
          </p>
        </div>
      </div>
    </div>
  </div>
</body>

<?php require_once('./components/footer.php'); ?>

</html>