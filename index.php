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
  $accounts = get_accounts($db, $_SESSION["user"]);
  // var_dump($accounts);

  require "view/indexView.php";