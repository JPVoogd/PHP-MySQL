<?php

class Accounts
{
    public static function update_account($id, $email, $password): bool
    {
        global $pdo;

        $query = "UPDATE eindopdracht.account SET email=:email, password=:password WHERE account_id=:id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}

?>