<!DOCTYPE html>
<html>
<body>
<h1>Welcome to Chat</h1>

<?php

require('database.php');


$c = dbGetChatCollection();


$entity = array("message"=>"Hello World", "nickname"=>"tom");
var_dump($entity);
$c->insert($entity);

?>
</body>
</html>
