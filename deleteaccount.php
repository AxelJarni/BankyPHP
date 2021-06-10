<?php 
  session_start();
  if(!isset($_SESSION["user"])) {
      header("Location:login.php");
      exit;
  }
  header( "refresh:3;url=index.php" );
  require "model/connection.php";
    $db = DataBase::getDB();
  require "model/accountsManager.php";
  require "model/operationsManager.php";
  // $amount = $_POST['amount'];
  // $account_type = $_POST['account_type'];
  $accountMan = new AccountManager();
  $operationsMan = new OperationsManager();
  $delete_operations = $operationsMan->deleteOperations($db, $_POST["account_id"]); 
  $delete_account = $accountMan->deleteAccount($db, $_POST["account_id"], $_SESSION["user"]); 
  

  require "view/deleteAccountView.php";