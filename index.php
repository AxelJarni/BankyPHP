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
  // var_dump($accounts);
?>

<h2>Vos comptes en banque</h2>
<div class="row my-5">
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
        <div class="col text-center">
        <a href="single.php?id=<?php echo $account['id']; ?>" class="btn btn-primary text-center">Détails du compte</a>
        </div>
      </div>
    </article>
  </div>
  <?php endforeach; ?>

</div>

<h3> Créer un nouveau compte</h3>
<form action="insert.php" method="post" class="col-4">             
  <div class="form-group">
    <label for="amount">Montant</label>
    <input type="number"  name="amount" id="amount" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" class="form-control my-2">
  </div>
  <div class="form-group">
    <label for="account_type">Nom du compte</label>
    <input type="text" name="account_type" id="account_type" class="form-control my-2">
  </div>
  <input type="submit" class="btn btn-primary my-2" value="Submit">
</form>


<?php include "layout/footer.php"; ?>