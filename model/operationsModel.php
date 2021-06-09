<?php 

function get_operations (PDO $db, $id) {
    $query = $db->prepare(
        "SELECT a.*, o.id AS operation_id, o.operation_type, o.amount AS operation_amount, o.label, o.registered FROM Account AS a
         LEFT JOIN Operation AS o
         ON a.id = o.account_id
         WHERE a.id = :id
         ORDER BY operation_id DESC
      ");
      $query->execute([
        "id" => $id
      ]);
    $result = $query->fetchall(PDO::FETCH_ASSOC);
    return $result;
}

function create_operation(PDO $db, $operation) {
    $query = $db->prepare(
        "INSERT INTO operation (operation_type, amount, registered, label, account_id)
        VALUES (:operation_type, :amount, NOW(), :label, :account_id)");
    $query->execute([
        "operation_type" => $operation["operation_type"],
        "amount" => $operation["amount"],
        "label" => $operation["label"],
        "account_id" => $operation["account_id"]
        ]);
    $result = $query->fetchall(PDO::FETCH_ASSOC);
    return $result;
}
?>