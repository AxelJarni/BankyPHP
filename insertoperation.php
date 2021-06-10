<?php 
  session_start();
  if(!isset($_SESSION["user"])) {
      header("Location:login.php");
      exit;
  }
  
  require "model/connection.php";
    $db = DataBase::getDB();
  require "model/operationsManager.php";
  require "model/accountsManager.php";
  $accountsModel = new AccountManager();
  $operationsModel = new operationsManager();
  $account = $accountsModel->get_only_account($db, $_POST["account_id"], $_SESSION["user"]);
  // header( "refresh:3;url=single.php?id=$account_id" );

  if($_POST["operation_type"] === "debit") {
    $account["amount"] = floatval($account["amount"]) - floatval($_POST["amount"]);
    $_POST["amount"] = "-" . $_POST["amount"];
  }
  else {
    $account["amount"] = floatval($account["amount"]) + floatval($_POST["amount"]);
  }
  $operationsModel->create_operation($db, $_POST);
  $accountsModel->update_account_amount($db, $account);
  

require "view/insertOperationView.php";