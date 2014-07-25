<?php
/*******************************
 * Create a JSON of chat data
 * @author Per-Henrik Kvalnes
 *******************************/
header('Content-type: application/json');    

require('database.php');
$c = dbGetChatCollection();

/** make a message list **/
$result = $c->find();
$list = [];
foreach($result as $post)
  {
    array_push($list, $post);
  }

$output = array("stream"=>$list);
$jsonOutput = json_encode($output);

echo $jsonOutput;
?>
