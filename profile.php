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
   $userid = $_GET["nickname"];
if(! $userid)
  {
    echo "<h1>No user seleced </h1>";
    echo "<p><a href='chat.php'>Go back to chat</a></p>";
    die();
  }
require('database.php');

$collection = dbGetUserCollection();
$cursor = $collection->find(array('nickname'=>$userid));
$usr = $cursor->getNext();

if(! $usr)
  {
    echo "<h1>User not found!</h1>";
    echo "<p>No user found with nickname ";
    echo "<p class='redText'> $userid</p></p>";
    die();
  }

$name = $usr["name"];
$age  = $usr["age"];

echo "<p>$userid</p>";


if($name){ echo "<p>Name: $name</p>";}
if($age){ echo "<p>Age: $age</p>";}

?>
  </div>
<!-- end blanket -->
</div>






</body>
</html>
