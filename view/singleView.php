<?php
include "layout/header.php";
if(!isset($error)):
?>

<div class="mb-5">
    <button onclick="location.href='index.php'" class="btn btn-warning">Retourner à l'accueil</button>
</div>
<h3>Votre compte en détail : </h3>
    <div class="row my-3">
      <div>
        <table class="table table-striped table-dark">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Libellé de l'opération</th>
              <th scope="col">Date d'effet</th>
              <th scope="col">Type</th>
              <th scope="col">Montant</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($operations as $operation) : ?>
              <tr>
                <td><?php echo $operation->getLabel(); ?></td>
                <td><?php echo $operation->getRegistered(); ?></td>
                <td><?php echo $operation->getOperation_type(); ?></td>
                <td><?php echo $operation->getOperation_amount(); ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div>
      <form method="POST" action="deleteaccount.php">
        <input type="hidden" name="account_id" value="<?php echo $_GET['id']; ?>">
        <input type="submit" name="deleteaccount" value="Supprimer le compte" class="btn btn-danger">
      </form>
    </div>

<h3>Ajouter une nouvelle opération</h3>
<form action="insertoperation.php" method="post" class="col-4">     
  <div class="form-group">
      <label for="operation_type">Type d'opération</label>
      <select  name="operation_type" id="operation_type" required="required" class="form-control custom-select my-2">
        <option value='credit'>Crédit</option>
        <option value='debit'>Débit</option>
      </select>
  </div>        
  <div class="form-group">
      <label for="amount">Montant</label>
      <input type="number"  name="amount" id="amount" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" required="required" class="form-control my-2">
  </div>
  <div class="form-group">
      <label for="label">Libellé de l'opération</label>
      <input type="text" name="label" id="label" required="required" class="form-control my-2">
  </div>
  <input type="hidden" id="account_id" name="account_id" value="<?php echo $_GET['id'] ?>">
  <input type="submit" value="Submit" class="btn btn-primary my-2">
</form>

<?php else: ?>
  <div class="alert alert-danger">
    <p><?php echo $error ?></p>
  </div>
<?php endif; ?>

<?php include "layout/footer.php"; ?>