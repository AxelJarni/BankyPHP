<?php
    require "model/user.php";

    require "model/connection.php";
    $db = DataBase::getDB();

    // Si les champ nom et mot de passe ont été remplis
    if(isset($_POST["email"]) && isset($_POST["password"])) {
        $user = User::getUserByEmail($db, $_POST["email"]);
        // Si la base de données à renvoyé un utilisateur avec ce mail
        if($user) {
            // On vérifie le mot de passe
            if(password_verify($_POST["password"], $user["password"])){
                 // On démarre une session et on stocke l'utilisateur dedans avant de l'envoyer sur index
                session_start();
                $_SESSION["user"] = $user;
                header("Location:index.php");
                // var_dump("CA PASSE");
                exit;
            }
            // var_dump("CA PASSE2");
        }
        $error_message = "Identifiants invalides";
        // var_dump($_POST["email"]);
        // var_dump($user["email"]);
        // var_dump($_POST["password"]);
        // var_dump($user["password"]);
    }

require "view/loginView.php";