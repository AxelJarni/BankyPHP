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
  $account_id = $_POST['account_id'];
  $operation_type = $_POST['operation_type'];
  $amount = $_POST['amount'];
  $label = $_POST['label'];
  create_operation($db, $operation_type, $amount, $label,  $account_id); 
  // header( "refresh:3;url=single.php?id=$account_id" );
?>

<h2>Opération ajoutée !</h2>
<a href="single.php?id=<?php echo $account_id; ?>" class="btn btn-primary text-center">Détails du compte</a>


<?php include "layout/footer.php"; ?>