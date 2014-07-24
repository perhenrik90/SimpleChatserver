<?php
/*******************************
 * Create a JSON of chat data
 * @author Per-Henrik Kvalnes
 *******************************/

require('database.php');
$c = dbGetChatCollection();

$result = $c->find();

foreach($result as $post)
  {
    $json = json_encode($post);
    echo $json;
  }
?>
