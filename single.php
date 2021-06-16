<?php
session_start();
if(!isset($_SESSION["user"])) {
    header("Location:login.php");
    exit;
}

require "model/connection.php";
    $db = DataBase::getDB();

require "model/accountsManager.php";
require "model/operationsManager.php";
require_once "model/entity/operation.php";

$id = $_GET["id"];
// $operationsModel = new operationsManager();
// $operations = get_operations($db, $id);

if (empty($_GET) || !isset($_GET["id"])) {
  header("Location: index.php");
}
$id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
// $accountsModel = new AccountManager();
// $operations = $accountsModel->get_single_account($db, $id);
$operationsMan = new OperationsManager();
// $operations = $operationsModel->get_operations($db, $id);
// var_dump($operations);
$operations = $operationsMan->get_operations($db, $id);
if(!$operations ) {
  $error ="Nous avons rencontré un problème, veuillez retourner à l'accueil.";
}

require "view/singleView.php";