<?php 
  session_start();
  if(!isset($_SESSION["user"])) {
      header("Location:login.php");
      exit;
  }
  header( "refresh:3;url=index.php" );
  try {
    $db = new PDO('mysql:host=localhost;dbname=banque_php', 'root', '');
  } 
  catch (Exception $e) {
    echo $e->getMessage();
    exit;
  }
  include "layout/header.php";
  require "model/create.php";
  $amount = $_POST['amount'];
  $account_type = $_POST['account_type'];
  create_account($db, $_SESSION["user"], $amount, $account_type); 
?>

<h2>Compte crée !</h2>



<?php include "layout/footer.php"; ?>