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

function create_account(PDO $db, $user, $amount, $account_type) {
    $query = $db->prepare(
        "INSERT INTO account (amount, opening_date, account_type, user_id)
        VALUES (:amount, NOW(), :account_type, :user_id)");
    $query->execute([
        'amount' => $amount,
        'account_type' => $account_type,
        'user_id' => $user['id']
    ]);
    $result = $query->fetchall(PDO::FETCH_ASSOC);
    return $result;
}
?>