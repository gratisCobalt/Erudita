<?php

require_once('./components/navbar.php');

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

$messages = getMessages();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $author_id = getUser($_SESSION['user'])['id'];
  $msgContent = htmlspecialchars($_POST['msgContent']);
sendMessages($author_id, $msgContent);
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Chat with others- Erudita</title>

</head>

<body>
    <div class="container mt-5">
        <div class="px-4 py-5 my-5 text-center">
            <h1 class="display-5 fw-bold"><span class="text-warning">Chat</span></h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">Introducing our new chat feature, a real-time communication tool designed to enhance collaboration and productivity among our team. Start using the chat feature today and experience the power of connected teamwork.
            </div>
        </div>
        <div class="container" style="width: 30rem; clear: both;">
        <form class="col-sm-18" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Write a message" aria-label="Message" aria-describedby="msgSend" name="msgContent" id="msgContent">
            <input class="btn btn-outline-dark" type="submit" name="msgSend" id="msgSend" value="Send">
          </div>
        </form>
      </div>
      <br>
      <div class="container" style="height: 30rem; width: 40rem; overflow-y: scroll; clear: both;" id="chatbox">
      <?php foreach ($messages as $message):
          $senderId = $message['author_id'];
          $sender = getUserByID($senderId);
        ?>
        <p><strong><?php echo $sender['username'];?>:</strong> <span class="text-muted"><?php echo $message['content'];?></span></p>
      <?php endforeach; ?>
    </div>
    </div>
</body>

<?php require_once('./components/footer.php'); ?>

<script>

    // Aktualisiere nur den Div "chatbox" - Funktion
    function reloadChat() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("chatbox").innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "./ajax.php", true);
      xhttp.send();

    }

    // Chatbox aktualisieren - Intervall
    setInterval(function() {
      reloadChat();
    }, 250);


</script>

</html>