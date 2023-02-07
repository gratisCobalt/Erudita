<?php

require_once('config.php');
require_once('functions.php');

$messages = getMessages();

foreach ($messages as $message):
    $senderId = $message['author_id'];
    $sender = getUserByID($senderId);
?>

<p><strong><?php echo $sender['username'];?>:</strong> <span class="text-muted"><?php echo $message['content'];?></span></p>

<?php endforeach; ?>