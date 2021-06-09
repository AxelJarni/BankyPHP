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

require "model/accountsModel.php";
require "model/operationsModel.php";

$id = $_GET["id"];
$operations = get_operations($db, $id);

if (empty($_GET) || !isset($_GET["id"])) {
  header("Location: index.php");
}
$id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
$operations = get_single_account($db, $id);
$account = $operations[0];
if(!$account || ($account["user_id"] !== $_SESSION["user"]["id"])) {
  $error ="Nous avons rencontré un problème, veuillez retourner à l'accueil.";
}

require "view/singleView.php";