<?php

function create_account(PDO $db, $user, $amount, $account_type) {
    $query = $db->prepare(
        "INSERT INTO account (amount, opening_date, account_type, user_id)
        VALUES (:amount, NOW(), :account_type, :user_id)");
    $query->execute([
        'amount' => $amount,
        // 'opening_date' => NOW(),
        'account_type' => $account_type,
        'user_id' => $user['id']
    ]);
    $result = $query->fetchall(PDO::FETCH_ASSOC);
    return $result;
}

function create_operation(PDO $db, $operation_type, $amount, $label,  $account_id) {
    $query = $db->prepare(
        "INSERT INTO operation (operation_type, amount, registered, label, account_id)
        VALUES (:operation_type, :amount, NOW(), :label, :account_id)");
    $query->execute([
        'amount' => $amount,
        'operation_type' => $operation_type,
        'label' => $label,
        'account_id' => $account_id
    ]);
    $result = $query->fetchall(PDO::FETCH_ASSOC);
    return $result;
}

?>