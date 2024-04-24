<?php
require_once 'model/database.php';

class Members
{

    public function get_members(): false|array
    {
        global $pdo;

        $query = "SELECT * FROM eindopdracht.family_member
              INNER JOIN family ON family_member.family_id = family.family_id
              LEFT JOIN discount ON family_member.discount = discount.discount_id
              INNER JOIN payments ON family_member.family_id = payments.payments_id
              INNER JOIN financial_year ON family_member.payments = financial_year.financial_id
              ORDER BY id ASC";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function get_member($id): false|array
    {
        global $pdo;

        $query = "SELECT * FROM eindopdracht.family_member
              INNER JOIN family ON family_member.family_id = family.family_id
              LEFT JOIN discount ON family_member.discount = discount.discount_id
              INNER JOIN payments ON family_member.family_id = payments.payments_id
              INNER JOIN financial_year ON family_member.payments = financial_year.financial_id
              WHERE family_member.id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll();

        
    }

    public function update_member($id, $name, $birthday): bool
    {
        global $pdo;

        $query = "UPDATE eindopdracht.family_member SET name=:name, birthday=:birthday WHERE id=:id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':birthday', $birthday);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

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

    public function delete_member($id): bool
    {
        global $pdo;

        $query = "DELETE FROM eindopdracht.family_member WHERE id=:id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

}

?>