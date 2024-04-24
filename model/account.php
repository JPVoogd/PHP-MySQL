<?php
class Accounts {
    public function update_account($id, $username, $password): bool
    {
        global $pdo;

        $query = "UPDATE eindopdracht.account SET email=:username, password=:password WHERE account_id=:id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}

?>