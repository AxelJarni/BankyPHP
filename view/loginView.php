<?php
include "layout/header.php";

?>

<h2>Accéder à votre espace</h2>
<form action="" method="post" class="w-75 mx-auto my-5">
    <?php if(isset($error_message)): ?>
        <div class="alert alert-danger">
            <?php echo $error_message; ?>
        </div>
    <?php endif; ?>
    <div>
        <label for="email" class="form-label">Votre Mail :</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>
    <div>
        <label for="password" class="form-label">Votre mot de passe</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>
    <div class="my-5 text-center">
        <input type="submit" name="connexion" class="btn btn-warning text-white w-25" value="Connexion">
    </div>
</form>
</div>

<?php
    include "layout/footer.php";
?>