<?php 

function getUserByEmail(PDO $db, string $email) {
    $query = $db->prepare("SELECT * FROM User WHERE email=:email");
    $query->execute([
        'email' => $email
    ]);
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result;
}




?>