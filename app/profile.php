<!--
LEGAL NOTICE

  This project contains software solution.

  Please check the LICENSE OF THIS PROJECT below, to find the license 
  information for this project. This license is just related to the 
  contained software solution and its source code, as far as the 
  software solution was developed by the copyright holder.
  This license bases on [bsd-3], but some modifications make it 
  different from regular BSD-Licences. 

  Errors, changes and deviations are not impossible!

  The project was developed and tested with the software 
  [Apache 2.4 VS16] in connexion with [php 8.1.3].
  [Apache 2.4 VS16] and [php 8.1.3] will not be delivered/distributed 
  as parts of this project. 
  The project uses elements of [Bootstrap 4.5.3].
  
LICENSE OF THIS PROJECT

  This license bases on [bsd-3] with fundamental modifications:

  Copyright 2023 Kevin Tamme, IU University of Applied Sciences, 
  Nordring 53, 63517 Rodenbach, Germany

  Copyright 2023 Dominik Hein, IU University of Applied Sciences, 
  Am Bobenhäuserweg 9, 63773 Goldbach, Germany

  Copyright 2023 Rares-Constantin Velnic, IU University of Applied Sciences, 
  Am Melonenberg 6, 65187 Wiesbaden, Germany

  The use of this project is only allowed in the context of 
  the lecture to facilitate the understanding of programming 
  techniques. Redistribution and use in source or binary forms, with 
  or without modification, are not allowed. 

  DISCLAIMER [bsd-3]: 
   THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS 
   "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT 
   LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS 
   FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE 
   COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, 
   INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, 
   BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; 
   LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER 
   CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT 
   LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN 
   ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE 
   POSSIBILITY OF SUCH DAMAGE.

REFERENCES

  [bsd-3] Open Source Initiative (n. Y.): "The 3-Clause BSD License". 
     URL: https://opensource.org/licenses/BSD-3-Clause, 
     accessed 2023-FEB-07.
  [Apache 2.4 VS16] Apache Lounge powered by Apache (2021): 
     "Apache 2.4 VS16 Windows Binaries and Modules". Version 2.4.52 Win64. 
     Online available at URL: https://www.apachelounge.com/download/, 
     accessed 2023-FEB-07. 
     [License-URL: https://www.apachelounge.com/contact.html].
  [php 8.1.3] The PHP Group (2022): "PHP: Hypertext Preprocessor". 
     Version 8.1.3. Online available at 
     URL: https://windows.php.net/download/, accessed 2023-FEB-07. 
     [License: PHP License v3.01, 
     License-URL: https://www.php.net/license/3_01.txt].
  [Bootstrap 4.5.3] Mark Otto / Jacob Thornton / XhmikosR / GeoSot / 
     Rohit Sharma / alpadev / Gael Poupard / Patrick H. Lauke /
     Martijn Cuppend / Johann-S / Gleb Mazovetskiy (2022): "Bootstrap".
     Version 4.5.3. Bootstrap is released under the MIT license 
     and is copyright 2022 Twitter. Online available at
     URL: https://getbootstrap.com/, accessed 2023-FEB-07.
     [Bootstrap v4.5.3 (https://getbootstrap.com/), 
     Copyright 2011-2023 The Bootstrap Authors, 
     Copyright 2011-2023 Twitter, Inc., 
     Licensed under MIT 
     (https://github.com/twbs/bootstrap/blob/main/LICENSE)].

BOOTSTRAP 4.5.3 LICENSE

Copyright (c) 2011-2023 The Bootstrap Authors

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
-->
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
      <a href="logout.php"><button type="button" class="btn btn-danger btn-sm" onclick="<?php deleteAccount($user['id']); ?>">Delete account</button></a>
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