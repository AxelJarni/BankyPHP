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

function get_operations (PDO $db, $account_id) {
    $query = $db->prepare(
        "SELECT * 
        FROM operation 
        WHERE account_id=:account_id");
    $query->execute([
        'account_id' => $account_id
    ]);
    $result = $query->fetchall(PDO::FETCH_ASSOC);
    return $result;
}
?>