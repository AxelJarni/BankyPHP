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
  include "layout/header.php";
  require "model/create.php";
  $amount = $_REQUEST['amount'];
  $account_type = $_REQUEST['account_type'];
  create_account($db, $_SESSION["user"], $amount, $account_type); 
?>

<h2>Compte crée !</h2>



<?php include "layout/footer.php"; ?>