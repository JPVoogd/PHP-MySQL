<?php
require_once 'model/database.php';

class Payment
{
    public function get_financial_years(): false|array
    {
        global $pdo;

        $query = "SELECT * FROM financial_year";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function get_payments($family_member_id, $financial_year): false|array
    {
        global $pdo;

        $query = "SELECT * FROM payments
              LEFT JOIN family_member ON family_member.id = payments.payments_id
              INNER JOIN financial_year ON financial_year.financial_id = payments.financial_year
              WHERE payments.user_id = :family_member_id
              AND financial_year.year = :financial_year";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':family_member_id', $family_member_id);
        $stmt->bindParam(':financial_year', $financial_year);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}