<?php
session_start();
if(!isset($_SESSION["user"])) {
    header("Location:login.php");
    exit;
}

try {
  $db = new PDO('mysql:host=localhost;dbname=banque_php', 'root', '');
} 
catch (Exception $e) {
  echo $e->getMessage();
  exit;
}

require "model/operationsModel.php";

$account_id = $_GET["id"];
// var_dump($account_id);
$operations = get_operations($db, $account_id);
// var_dump($operations);

require "view/singleView.php";