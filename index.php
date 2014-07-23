<!DOCTYPE html>
<html>
<meta charset='utf8'></meta>
<link rel="stylesheet" type="text/css" href="css/main.css"></link>
<body>
<h1 class="mainH1">Welcome to Simple Chat</h1>

<div class="blanket">
   <div class="login">
   <form method="post">
   <p>Enter a nickname!</p>
   <input name="nickname"></input></br></br>
   <input type="submit"></input>
   </form>
   </div>
</div>
<?php

require('database.php');

$nickname = $_POST['nickname'];
if($nickname)
  {

    $c = dbGetUserCollection();
    $result = $c->find(array("nickname"=>$nickname));
    $size = $result->count();
    
    if($size > 0)
      {
       	setcookie("nickname",$nickname,time()+(60*2));
	echo "<p>Welcome back $nickname</p>";
	echo "<script>setTimeout(function(){window.location.href = 'chat.php';}, 1000); </script>";

      }
    else
      {
	$c->insert(array("nickname"=>$nickname));

       	setcookie("nickname",$nickname,time()+(60*2));
	echo "<p>Welcome $nickname</p>";
	echo "<script>setTimeout(function(){window.location.href = 'chat.php';}, 1000); </script>";
      }

  }



?>
</body>
</html>
