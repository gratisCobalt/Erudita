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
            <h1 class="display-5 fw-bold"><span class="text-warning">Sign In</span></h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">Here at <span class="text-warning">Erudita</span>, we value your security and privacy. That's why we have implemented a secure login system to protect your personal information and ensure that only you have access to your account.
                </p>
            </div>
        </div>
        <div class="row align-items-md-stretch">
            <div class="col-md-6">
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>
                <div class="h-100 p-5 text-bg-dark rounded-3">
                    <form class="col-sm-20" method="post" enctype="multipart/form-data">
                        <div class="col-9">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username" required>
                        </div><br>
                        <div class="col-9">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                        </div><br>
                        <div class="col-2">
                            <input type="submit" class="btn btn-warning mb-3" name="login" value="Log in">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h2>How to use.</h2>
                    <hr>
                    <p>We are glad you are here and want to make sure you have a seamless experience while accessing
                        your account. Whether you are a professional or a new user, logging in is quick and easy.
                        Simply enter your username and password in the fields provided and click "Log in".</p>
                    <p class="text-muted">If you are a new user and do not yet have an account with us, click the <a class="link-warning" style="text-decoration: none;" href="register.php">here</a> to
                        create a new account.</p>
                </div>
            </div>
        </div>
    </div>
</body>

<?php require_once('./components/footer.php'); ?>

</html>