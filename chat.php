<!DOCTYPE html>
<html>
<meta charset='utf8'></meta>
<link rel="stylesheet" type="text/css" href="css/main.css"></link>
<link rel="stylesheet" type="text/css" href="css/chat.css"></link>
<script src="chat.js"></script>

<body>
<h1 class="mainH1">Simple Chat</h1>

<div class="blanket">
   <div id="chatArea">

   <?php
   /****************************************
    * Update the messages in the chat box 
    ****************************************/
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
   
   <div id="inputBlanket">
   <form method='post'>
     <input id="messageIn" name='messageIn'></input>
     <input type="submit"></input>
   </form>
  </div>
<!-- end blanket -->
</div>
<script>
  // scroll chat area automaticly down
  chatArea = document.getElementById("chatArea");
  chatArea.scrollTop = chatArea.scrollTopMax;



</script>
<?php



$nickname = $_COOKIE["nickname"];


?>



<?php
$newmessage = $_POST["messageIn"];
if($newmessage && $_COOKIE["nickname"])
  {
    //       require('database.php');
       $c = dbGetChatCollection();
      
       $obj = array();
       $obj["message"] = $newmessage;
       $obj["nickname"] = $_COOKIE["nickname"];
       $obj["time"] = time();
       $c->insert($obj);
       echo "<p>You posted $newmessage </p>";
       echo "<script> window.location.href = 'chat.php';"
    . "</script>";
  }
else if(!$_COOKIE["nickname"] && $newmessage)
  {
    echo "<script> window.location.href = 'index.php';"
    . "</script>";
  }
?>
</body>
</html>
