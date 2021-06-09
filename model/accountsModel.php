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

function get_single_account($db, $id) {
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
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }
  
function get_only_account($db, $id, $user) {
    $query = $db->prepare(
      "SELECT id, amount FROM Account
       WHERE id = :id
       AND user_id = :user_id"
     );
    $query->execute([
      "id" => $id,
      "user_id" => $user["id"]
    ]);
    return $query->fetch(PDO::FETCH_ASSOC);
  }

function update_account_amount($db, $account) {
    $query = $db->prepare(
      "UPDATE Account
      SET amount = :amount
      WHERE id = :id"
    );
    $result = $query->execute([
      "amount" => $account["amount"],
      "id" => $account["id"]
    ]);
    return $result;
  }
?>