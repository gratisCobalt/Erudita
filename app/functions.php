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
