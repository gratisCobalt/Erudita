<?php

require_once('./components/navbar.php');

if (!isset($_SESSION['user'])) {
  header('Location: login.php');
  exit;
}

if (!$user) {
  header('Location: logout.php');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $current_password = htmlspecialchars($_POST['current_password']);
  $password = htmlspecialchars($_POST['password']);
  $password_repeat = htmlspecialchars($_POST['password_repeat']);

  if (!password_verify($current_password, $user['password'])) {
    $error = 'Das aktuelle Passwort ist inkorrekt';
  }

  if ($password !== $password_repeat) {
    $error = 'Die Passwörter müssen übereinstimmen';
  }

  if (password_verify($current_password, $user['password'])) {
    $email = htmlspecialchars($_POST['email']);
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);

    if (isset($_POST['password']) && isset($_POST['password_repeat'])) {
      $password = htmlspecialchars($_POST['password']);
      $password_repeat = htmlspecialchars($_POST['password_repeat']);

      if ($password !== $password_repeat) {
        $error = 'Die Passwörter müssen übereinstimmen';
      } elseif (!password_verify($_POST['current_password'], $user['password'])) {
        $error = 'Das aktuelle Passwort ist inkorrekt';
      } else {
        if (updateUser($user['username'], $email, $first_name, $last_name, $password)) {
          $success = 'Profil erfolgreich aktualisiert';
        } else {
          $error = 'Aktualisierung fehlgeschlagen';
        }
      }
    } else {
      if (updateUser($user['username'], $email, $first_name, $last_name, null)) {
        $success = 'Profil erfolgreich aktualisiert';
      } else {
        $error = "Aktualisierung fehlgeschlagen";
      }
    }
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Profil - Erudita</title>
</head>

<body>
  <div class="container" style="max-width: 50%; margin: 15 auto;">
    <h1 id="heading">Profil</h1>
    </br>

    <form method="post" action="profile.php" enctype="multipart/form-data">
      <div class="form-group">
        <label for="username">Nutzername</label>
        <input type="text" class="form-control form-control-sm" name="username" id="username"
          value="<?php echo $user['username']; ?>" disabled>
      </div>
      <div class="form-group">
        <label for="email">E-Mail</label>
        <input type="email" class="form-control form-control-sm" name="email" id="email"
          value="<?php echo $user['email']; ?>" required>
      </div>
      <div class="form-group">
        <label for="first_name">Vorname</label>
        <input type="text" class="form-control form-control-sm" name="first_name" id="first_name"
          value="<?php echo $user['first_name']; ?>" required>
      </div>
      <div class="form-group">
        <label for="last_name">Nachname</label>
        <input type="text" class="form-control form-control-sm" name="last_name" id="last_name"
          value="<?php echo $user['last_name']; ?>" required>
      </div>

      <div class="form-group">
        <label for="current_password">Aktuelles Passwort</label>
        <input type="password" class="form-control form-control-sm" name="current_password" id="current_password"
          required>
      </div>
      <div class="form-group">
        <label for="password">Passwort ändern</label>
        <input type="password" class="form-control form-control-sm" name="password" id="password">
      </div>
      <div class="form-group">
        <label for="password_repeat">Passwort wiederholen</label>
        <input type="password" class="form-control form-control-sm" name="password_repeat" id="password_repeat">
      </div>

      <button type="submit" class="btn btn-warning btn-sm">Aktualisieren</button>
    </form>

    <div class="container mt-3">
      <?php if (isset($success)): ?>
        <div class="alert alert-success">
          <?php echo $success; ?>
        </div>
      <?php elseif (isset($error)): ?>
        <div class="alert alert-danger">
          <?php echo $error; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</body>

<?php require_once('./components/footer.php'); ?>

</html>