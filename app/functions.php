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
// Zugriff auf Funktionen von [php 8.1.3]
function getArticles()
{
  global $pdo;

  $stmt = $pdo->prepare("SELECT * FROM articles ORDER BY views DESC LIMIT 10");
  $stmt->execute();
  return $stmt->fetchAll();
}
// Zugriff auf Funktionen von [php 8.1.3]
function getArticle($id)
{
  global $pdo;

  $stmt = $pdo->prepare("SELECT * FROM articles WHERE id = ?");
  $stmt->execute([$id]);
  return $stmt->fetch();
}
// Zugriff auf Funktionen von [php 8.1.3]
function searchArticles($query)
{
  global $pdo;

  $stmt = $pdo->prepare("SELECT * FROM articles WHERE title LIKE ? OR content LIKE ?");
  $stmt->execute(["%$query%", "%$query%"]);
  return $stmt->fetchAll();
}
// Zugriff auf Funktionen von [php 8.1.3]
function createArticle($title, $content, $cover_image_url, $author_id, $category_id)
{
  global $pdo;

  $stmt = $pdo->prepare("INSERT INTO articles (title, content, cover_image_url, author_id, category_id) VALUES (?, ?, ?, ?, ?)");
  $stmt->execute([$title, $content, $cover_image_url, $author_id, $category_id]);

  // return the ID of the newly created article
  return $pdo->lastInsertId();
}
// Zugriff auf Funktionen von [php 8.1.3]
function getUser($username)
{
  global $pdo;

  $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
  $stmt->execute([$username]);
  return $stmt->fetch();
}
// Zugriff auf Funktionen von [php 8.1.3]
function updateUser($username, $email, $firstname, $lastname, $password)
{
  global $pdo;

  // sanitize input
  $username = filter_var($username, FILTER_SANITIZE_STRING);
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  $firstname = filter_var($firstname, FILTER_SANITIZE_STRING);
  $lastname = filter_var($lastname, FILTER_SANITIZE_STRING);
  $password = filter_var($password, FILTER_SANITIZE_STRING);

  // update user in database
  $stmt = $pdo->prepare("UPDATE users SET email = ?, first_name = ?, last_name = ?, password = ? WHERE username = ?");
  $stmt->execute([$email, $firstname, $lastname, password_hash($password, PASSWORD_DEFAULT), $username]);
  return True;
}
// Zugriff auf Funktionen von [php 8.1.3]
function register($username, $email, $password, $password_repeat, $first_name, $last_name)
{
  // Validate input
  if (empty($username) || empty($email) || empty($password) || empty($password_repeat)) {
    return false;
  }
  if ($password != $password_repeat) {
    return false;
  }

  // Sanitize input
  $username = htmlspecialchars($username);
  $email = htmlspecialchars($email);
  $first_name = htmlspecialchars($first_name);
  $last_name = htmlspecialchars($last_name);

  // Check if username or email is already in use
  global $pdo;
  $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
  $stmt->execute([$username, $email]);
  if ($stmt->rowCount() > 0) {
    return false;
  }

  // Insert new user into database
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  $stmt = $pdo->prepare("INSERT INTO users (username, email, password, first_name, last_name) VALUES (?, ?, ?, ?, ?)");
  $stmt->execute([$username, $email, $hashed_password, $first_name, $last_name]);

  return true;
}
// Zugriff auf Funktionen von [php 8.1.3]
function login($username, $password)
{
  // Validate input
  if (empty($username) || empty($password)) {
    return false;
  }

  // Sanitize input
  $username = htmlspecialchars($username);

  // Check if username exists in database
  global $pdo;
  $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
  $stmt->execute([$username]);
  $user = $stmt->fetch();
  if (!$user) {
    return false;
  }

  // Check if password is correct
  if (!password_verify($password, $user['password'])) {
    return false;
  }

  // Set session variables and return true
  $_SESSION['user'] = $username;
  return true;
}
// Zugriff auf Funktionen von [php 8.1.3]
function getUserByID($id)
{
  // Sanitize the input to prevent SQL injection attacks
  $id = intval($id);

  global $pdo;

  // Benutzer-ID sicher vorbereiten und ausführen
  $stmt = $pdo->prepare('SELECT * FROM users WHERE id = :id');
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();

  // Benutzer aus der Datenbank abrufen
  return $stmt->fetch(PDO::FETCH_ASSOC);
}
// Zugriff auf Funktionen von [php 8.1.3]
function getCategoryByID($id)
{
  // Sanitize the input to prevent SQL injection attacks
  $id = intval($id);

  global $pdo;

  // Kategorie-ID sicher vorbereiten und ausführen
  $stmt = $pdo->prepare('SELECT * FROM categories WHERE id = :id');
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();

  // Kategorie aus der Datenbank abrufen
  return $stmt->fetch(PDO::FETCH_ASSOC);
}
// Zugriff auf Funktionen von [php 8.1.3]
function getCategories()
{
  global $pdo;

  $stmt = $pdo->prepare("SELECT * FROM categories ORDER BY name ASC");
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// Zugriff auf Funktionen von [php 8.1.3]
function getArticlesFromCategory($category_id)
{
  global $pdo;

  $stmt = $pdo->prepare('SELECT * FROM articles WHERE category_id = :category_id');
  $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// Zugriff auf Funktionen von [php 8.1.3]
function isValidAuthorId($author_id)
{
  global $pdo;
  $stmt = $pdo->prepare("SELECT id FROM users WHERE id = ?");
  $stmt->execute([$author_id]);
  return $stmt->rowCount() === 1;
}
// Zugriff auf Funktionen von [php 8.1.3]
function isValidCategoryId($category_id)
{
  global $pdo;
  $stmt = $pdo->prepare("SELECT id FROM categories WHERE id = ?");
  $stmt->execute([$category_id]);
  return $stmt->rowCount() === 1;
}
// Zugriff auf Funktionen von [php 8.1.3]
function updateArticle($article_id, $title, $content, $cover_image_name, $author_id, $category_id)
{
  global $pdo;

  // Prepare the update statement
  $stmt = $pdo->prepare("UPDATE articles SET title = :title, content = :content, cover_image_url = :cover_image_url, author_id = :author_id, category_id = :category_id WHERE id = :id");

  // Bind the parameters
  $stmt->bindParam(':title', $title);
  $stmt->bindParam(':content', $content);
  $stmt->bindParam(':cover_image_url', $cover_image_name);
  $stmt->bindParam(':author_id', $author_id);
  $stmt->bindParam(':category_id', $category_id);
  $stmt->bindParam(':id', $article_id);

  // Execute the statement
  $stmt->execute();
}
// Zugriff auf Funktionen von [php 8.1.3]
function getMessages()
{
  global $pdo;

  $stmt = $pdo->prepare("SELECT * FROM messages ORDER BY id ASC");
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// Zugriff auf Funktionen von [php 8.1.3]
function sendMessages($sender, $content)
{
  global $pdo;

  $stmt = $pdo->prepare("INSERT INTO messages (id, author_id, content, created_at) VALUES (DEFAULT, $sender, '$content', DEFAULT)");
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>
