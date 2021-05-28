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
  include "layout/header.php"; 
  $accounts = get_accounts($db, $_SESSION["user"]);
  var_dump($accounts);
?>

<h2>Vos comptes en banque</h2>
<div class="row mt-5">
  <?php foreach ($accounts as $account): ?>
  <div class='col-6 col-md-4'>
    <article class="card">
      <div class="card-header">
        <h6 class="card-subtitle my-2 text-muted">Votre numéro de compte : <?php echo $account["id"]; ?></h6>
        <h5 class="card-title"><?php echo $account["account_type"]; ?></h5>
      </div>
      <div class="card-body">
        <ul class="list-group border-bottom my-2">
          <li class="list-group-item">Détenteur du compte : <?php echo $_SESSION["user"]["firstname"] . " " . $_SESSION["user"]["lastname"]; ?></li>
          <li class="list-group-item">Solde : <?php echo $account["amount"]; ?></li>
        </ul>
        <a href="#" class="btn btn-warning">Dépot/retrait</a>
        <a href="single.php?id=<?php echo $account['id']; ?>" class="btn btn-primary">Voir</a>
      </div>
    </article>
  </div>
<?php endforeach; ?>

</div>


<?php include "layout/footer.php"; ?>