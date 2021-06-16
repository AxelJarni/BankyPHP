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
  $create_account = $accountMan->create_account($db, $_SESSION["user"], $_POST['amount'], $_POST['account_type']);
  $accountID = $db->lastInsertId();
  // var_dump($accountID);
  $operationsMan = new OperationsManager();
  $addOperationNewAcc = $operationsMan->addOperationNewAcc($db, $_POST['amount'], $accountID);

  require "view/insertAccountView.php";