<?php
    require "model/userModel.php";

    try {
        $db = new PDO('mysql:host=localhost;dbname=banque_php', 'root', '');
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }

    // Si les champ nom et mot de passe ont été remplis
    if(isset($_POST["email"]) && isset($_POST["password"])) {
        $user = getUserByEmail($db, $_POST["email"]);
        // Si la base de données à renvoyé un utilisateur avec ce mail
        if($user) {
            // On vérifie le mot de passe
            if(password_verify($_POST["password"], $user["password"])){
                 // On démarre une session et on stocke l'utilisateur dedans avant de l'envoyer sur index
                session_start();
                $_SESSION["user"] = $user;
                header("Location:index.php");
                var_dump("CA PASSE");
                exit;
            }
            var_dump("CA PASSE2");
        }
        $error_message = "Identifiants invalides";
        var_dump($_POST["email"]);
        var_dump($user["email"]);
        var_dump($_POST["password"]);
        var_dump($user["password"]);
    }
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