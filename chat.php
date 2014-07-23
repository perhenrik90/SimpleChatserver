<!DOCTYPE html>
<html>
<meta charset='utf8'></meta>
<link rel="stylesheet" type="text/css" href="css/main.css"></link>
<link rel="stylesheet" type="text/css" href="css/chat.css"></link>
<body>
<h1 class="mainH1">Simple Chat</h1>

<div class="blanket">
   <div id="chatArea">
   <?php
   require('database.php');
   $c = dbGetChatCollection();

$result = $c->find();

foreach($result as $post)
  {
    $message = $post["message"];
    $nn = $post["nickname"];

    $p = "<div class='chatRow'>"
      ."<p class='nicknameString'>$nn</p>"
      ."<p class='messageString'>$message</p>" 
      ."</div></br>";

    echo $p;
  }
   ?>
   </div>
</div>
<?php



$nickname = $_COOKIE["nickname"];
echo $nickname;

?>
</body>
</html>
