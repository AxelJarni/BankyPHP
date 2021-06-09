<?php 
  session_start();
  if(!isset($_SESSION["user"])) {
      header("Location:login.php");
      exit;
  }
  header( "refresh:3;url=index.php" );
  require "model/connection.php";
    $db = DataBase::getDB();
  require "model/accountsModel.php";
  $amount = $_POST['amount'];
  $account_type = $_POST['account_type'];
  create_account($db, $_SESSION["user"], $amount, $account_type); 

  require "view/insertAccountView.php";