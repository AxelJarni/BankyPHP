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
  require "model/accountsModel.php";

  $account = get_only_account($db, $_POST["account_id"], $_SESSION["user"]);
  // header( "refresh:3;url=single.php?id=$account_id" );

  if($_POST["operation_type"] === "debit") {
    $account["amount"] = floatval($account["amount"]) - floatval($_POST["amount"]);
    $_POST["amount"] = "-" . $_POST["amount"];
  }
  else {
    $account["amount"] = floatval($account["amount"]) + floatval($_POST["amount"]);
  }
  create_operation($db, $_POST);
  update_account_amount($db, $account);
  

require "view/insertOperationView.php";