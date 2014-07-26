<!DOCTYPE html>
<html>
<meta charset='utf8'></meta>
<link rel="stylesheet" type="text/css" href="css/main.css"></link>
<link rel="stylesheet" type="text/css" href="css/chat.css"></link>
<script src="chat.js"></script>

<body>
<h1 class="mainH1">Simple Chat</h1>

<div class="blanket">
   <div class="mainInformation">
   <?php
   $userid = $_GET["userid"];
if(! $userid)
  {
    echo "<h1>No user seleced </h1>";
    echo "<p><a href='chat.php'>Go back to chat</a></p>";
  }
echo "<p>$userid</p>";

?>
  </div>
<!-- end blanket -->
</div>






</body>
</html>
