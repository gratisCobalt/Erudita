<?php

// LEGAL NOTICE

// This project contains software solution.

// Please check the LICENSE OF THIS PROJECT below, to find the license 
// information for this project. This license is just related to the 
// contained software solution and its source code, as far as the 
// software solution was developed by the copyright holder.
// This license bases on [bsd-3], but some modifications make it 
// different from regular BSD-Licences. 

// Errors, changes and deviations are not impossible!

// The project was developed and tested with the software 
// [Apache 2.4 VS16] in connexion with [php 8.1.3].
// [Apache 2.4 VS16] and [php 8.1.3] will not be delivered/distributed 
// as parts of this project. 
// The project uses elements of [Bootstrap 4.5.3].

// LICENSE OF THIS PROJECT

// This license bases on [bsd-3] with fundamental modifications:

// Copyright 2023 Kevin Tamme, IU University of Applied Sciences, 
// Nordring 53, 63517 Rodenbach, Germany

// Copyright 2023 Dominik Hein, IU University of Applied Sciences, 
// Am Bobenhäuserweg 9, 63773 Goldbach, Germany

// Copyright 2023 Rares-Constantin Velnic, IU University of Applied Sciences, 
// Am Melonenberg 6, 65187 Wiesbaden, Germany

// The use of this project is only allowed in the context of 
// the lecture to facilitate the understanding of programming 
// techniques. Redistribution and use in source or binary forms, with 
// or without modification, are not allowed. 

// DISCLAIMER [bsd-3]: 
//  THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS 
//  "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT 
//  LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS 
//  FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE 
//  COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, 
//  INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, 
//  BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; 
//  LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER 
//  CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT 
//  LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN 
//  ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE 
//  POSSIBILITY OF SUCH DAMAGE.

// REFERENCES

// [bsd-3] Open Source Initiative (n. Y.): "The 3-Clause BSD License". 
//    URL: https://opensource.org/licenses/BSD-3-Clause, 
//    accessed 2023-FEB-07.
// [Apache 2.4 VS16] Apache Lounge powered by Apache (2021): 
//    "Apache 2.4 VS16 Windows Binaries and Modules". Version 2.4.52 Win64. 
//    Online available at URL: https://www.apachelounge.com/download/, 
//    accessed 2023-FEB-07. 
//    [License-URL: https://www.apachelounge.com/contact.html].
// [php 8.1.3] The PHP Group (2022): "PHP: Hypertext Preprocessor". 
//    Version 8.1.3. Online available at 
//    URL: https://windows.php.net/download/, accessed 2023-FEB-07. 
//    [License: PHP License v3.01, 
//    License-URL: https://www.php.net/license/3_01.txt].
// [Bootstrap 4.5.3] Mark Otto / Jacob Thornton / XhmikosR / GeoSot / 
//    Rohit Sharma / alpadev / Gael Poupard / Patrick H. Lauke /
//    Martijn Cuppend / Johann-S / Gleb Mazovetskiy (2022): "Bootstrap".
//    Version 4.5.3. Bootstrap is released under the MIT license 
//    and is copyright 2022 Twitter. Online available at
//    URL: https://getbootstrap.com/, accessed 2023-FEB-07.
//    [Bootstrap v4.5.3 (https://getbootstrap.com/), 
//    Copyright 2011-2023 The Bootstrap Authors, 
//    Copyright 2011-2023 Twitter, Inc., 
//    Licensed under MIT 
//    (https://github.com/twbs/bootstrap/blob/main/LICENSE)].

// BOOTSTRAP 4.5.3 LICENSE

// Copyright (c) 2011-2023 The Bootstrap Authors

// Permission is hereby granted, free of charge, to any person obtaining a copy
// of this software and associated documentation files (the "Software"), to deal
// in the Software without restriction, including without limitation the rights
// to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
// copies of the Software, and to permit persons to whom the Software is
// furnished to do so, subject to the following conditions:

// The above copyright notice and this permission notice shall be included in
// all copies or substantial portions of the Software.

// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
// IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
// FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
// AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
// LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
// OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
// THE SOFTWARE.

require_once('./components/navbar.php');

if (isset($_SESSION['user'])) {
  // header('Location: index.php');
  echo "<script>window.location.href='index.php'</script>";
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = htmlspecialchars($_POST['username']);
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);
  $password_repeat = htmlspecialchars($_POST['password_repeat']);
  $first_name = htmlspecialchars($_POST['first_name']);
  $last_name = htmlspecialchars($_POST['last_name']);

  if ($userFunctions->register($username, $email, $password, $password_repeat, $first_name, $last_name)) {
    $_SESSION['user'] = $username;
    // header('Location: index.php');
  echo "<script>window.location.href='index.php'</script>";
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
  <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
  <div class="container mt-5">
    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
    <div class="px-4 py-5 my-5 text-center">
      <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
      <h1 class="display-5 fw-bold"><span class="text-warning">Sign Up</span></h1>
      <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
      <div class="col-lg-6 mx-auto">
        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
        <p class="lead mb-4">Creating an account allows you to access all of our services and features, including the
          ability to create and edit entries.
        </p>
      </div>
    </div>
    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
    <div class="row">
      <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
      <div class="col-md-12">
        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
        <h1 id="heading" class="mb-4">Register</h1>

        <?php if (isset($error)): ?>
        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
          <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="post" action="register.php">
          <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
          <div class="form-group">
            <label for="username">Username</label>
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
            <input type="text" class="form-control" name="username" id="username" placeholder="Choose your username"
              required>
          </div>
          <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
          <div class="form-group">
            <label for="first_name">First name</label>
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
            <input type="text" class="form-control" name="first_name" id="first_name"
              placeholder="Please enter your first name" required>
          </div>
          <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
          <div class="form-group">
            <label for="last_name">Last name</label>
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
            <input type="text" class="form-control" name="last_name" id="last_name"
              placeholder="Please enter your last name" required>
          </div>
          <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
          <div class="form-group">
            <label for="email">E-mail</label>
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
            <input type="email" class="form-control" name="email" id="email" placeholder="Please provide your email"
              required>
          </div>
          <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
          <div class="form-group">
            <label for="password">Password</label>
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
            <input type="password" class="form-control" name="password" id="password" placeholder="Choose a password"
              required>
          </div>
          <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
          <div class="form-group">
            <label for="password_repeat">Repeat password</label>
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
            <input type="password" class="form-control" name="password_repeat" id="password_repeat"
              placeholder="Please repeat your password" required>
          </div>
          <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
          <div class="form-group">
            <div class="g-recaptcha" data-sitekey="<?php echo $site_key; ?>"></div>
          </div>
          <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
          <button type="submit" class="btn btn-warning">Sign Up</button>
        </form>
        <p>If you already are a menber, please <a href="login.php">sign in</a>!</p>
        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
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
