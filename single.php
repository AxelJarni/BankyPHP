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


$account_id = $_GET["id"];
var_dump($account_id);
$operations = get_operations($db, $account_id);
var_dump($operations);
?>

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
                <td><?php echo $operation["label"]; ?></td>
                <td><?php echo $operation["registered"]; ?></td>
                <td><?php echo $operation["operation_type"]; ?></td>
                <td><?php echo $operation["amount"]; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

<h5>Ajouter une nouvelle opération</h5>
<form action="insertoperation.php" method="post">     
    <p>
        <label for="operation_type">Type d'opération</label>
        <select size="2"  name="operation_type" id="operation_type" required="required" >
                <option value='credit'>Crédit</option>
                <option value='debit'>Débit</option>
        </select>
    </p>        
    <p>
        <label for="amount">Montant</label>
        <input type="number"  name="amount" id="amount" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" required="required" >
    </p>
    <p>
        <label for="label">Libellé de l'opération</label>
        <input type="text" name="label" id="label" required="required">
    </p>
    <input type="hidden" id="account_id" name="account_id" value="<?php echo $_GET['id'] ?>">
    <input type="submit" value="Submit">
</form>

<?php include "layout/footer.php"; ?>