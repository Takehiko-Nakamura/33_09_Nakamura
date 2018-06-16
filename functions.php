<?php

function db_conn(){
  $dbname='gs_db';
  try {
    $pdo = new PDO('mysql:dbname='.$dbname.';charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('データベースに接続できませんでした'.$e->getMessage());
  }
  return $pdo;
}

function errorMsg($stmt){
  $error = $stmt->errorInfo();
  exit("SQLエラー:".$error[2]);
}

function h($str){
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

function chk_ssid(){
    if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
      exit("ログインエラー");
    }else{
      session_regenerate_id(true);
      $_SESSION["chk_ssid"]=session_id();
    }
  }
?>
