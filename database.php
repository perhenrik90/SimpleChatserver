<?php
require('config.php');

function dbGetDatabase()
{
  require('config.php');
  $dbname = $config["dbname"];
  $host = $config["host"];

  $m = new Mongo($host);
 

  return $m->$dbname;
}

function dbGetChatCollection()
{
  $db = dbGetDatabase();
  $cname = "chat";
  return $db->$cname;
}

function dbGetUserCollection()
{
  $db = dbGetDatabase();
  $cname = "user";
  return $db->$cname;
}

?>