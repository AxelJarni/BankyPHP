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
  $account_id = '2';
  $operation_type = $_REQUEST['operation_type'];
  $amount = $_REQUEST['amount'];
  $label = $_REQUEST['label'];
  create_operation($db, $operation_type, $amount, $label,  $account_id); 
?>

<h2>Compte crée !</h2>



<?php include "layout/footer.php"; ?>