<?php
include "layout/header.php";

?>

<h2>Opération ajoutée !</h2>
<a href="single.php?id=<?php echo $_POST["account_id"]; ?>" class="btn btn-primary text-center">Détails du compte</a>


<?php include "layout/footer.php"; ?>