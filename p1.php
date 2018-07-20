<?php

function db_connect(){
  //データベース接続
  $server = "localhost";
  $userName = "g031o153";
  $password = "a04073486";
  $dbName = "g031o153";

  $mysqli = new mysqli($server, $userName, $password,$dbName);

  if ($mysqli->connect_error){
    echo $mysqli->connect_error;
    exit();
  }else{
    $mysqli->set_charset("utf8");
  }
  return $mysqli;
}

?>
