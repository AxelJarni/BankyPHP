<?php 
  session_start();
  if(!isset($_SESSION["user"])) {
      header("Location:login.php");
      exit;
  }

  require "model/connection.php";
  $db = DataBase::getDB();
  
  require "model/accountsModel.php";
  $accounts = get_accounts($db, $_SESSION["user"]);
  // var_dump($accounts);

  require "view/indexView.php";