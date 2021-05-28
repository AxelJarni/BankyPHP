<?php

function get_accounts(PDO $db, $user) {
    $query = $db->prepare(
        "SELECT account.id, account.amount, account.account_type 
        FROM account 
        WHERE user_id=:user_id");
    $query->execute([
        'user_id' => $user['id']
    ]);
    $result = $query->fetchall(PDO::FETCH_ASSOC);
    return $result;
}


?>