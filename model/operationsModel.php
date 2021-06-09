<?php 

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