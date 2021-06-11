<?php 
require_once "model/entity/operation.php";

class OperationsManager {
    public function get_operations (PDO $db, $id) {
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
        foreach($result as $key => $operation){
            $result[$key] = new Operation($operation);
            // var_dump(new Operation($operation));
            // var_dump($result);
            } 
        return $result;
        // var_dump($result);
    }

    public function create_operation(PDO $db, $operation) {
        $query = $db->prepare(
            "INSERT INTO operation (operation_type, amount, registered, label, account_id)
            VALUES (:operation_type, :amount, NOW(), :label, :account_id)"
            );
        $query->execute([
            "operation_type" => $operation["operation_type"],
            "amount" => $operation["amount"],
            "label" => $operation["label"],
            "account_id" => $operation["account_id"]
            ]);
        $result = $query->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }    

    public function deleteOperations($db, $account_id) {
        $query = $db->prepare(
            "DELETE FROM Operation
            WHERE account_id = :account_id"
            );
        $result = $query->execute([
            "account_id" => $account_id
        ]);
        return $result;
    }

    public function addOperationNewAcc($db, $amount, $accountID) {
        $query = $db->prepare(
            "INSERT INTO Operation(operation_type, amount, registered, label, account_id)
            VALUES (:operation_type, :amount, NOW(), :label, :account_id)"
            );
        $result = $query->execute([
            "operation_type" => "credit",
            "amount" => $amount,
            "label" => "Ouverture de compte",
            "account_id" => $accountID
        ]);
        return $result;
    }
}

?>