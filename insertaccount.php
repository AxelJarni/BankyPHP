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
  // $amount = $_POST['amount'];
  // $account_type = $_POST['account_type'];
  $accountMan = new AccountManager();
  $create_account = $accountMan->create_account($db, $_SESSION["user"], $_POST['amount'], $_POST['account_type']); 

  require "view/insertAccountView.php";