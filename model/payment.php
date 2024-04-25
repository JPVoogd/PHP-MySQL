<?php
require_once 'model/database.php';

class Payment
{

    public $payments_id;
    public $user_id;
    public $amount;
    public $financial_year;

    public function __construct($payments_id, $user_id, $amount, $financial_year)
    {
        $this->payments_id = $payments_id;
        $this->user_id = $user_id;
        $this->amount = $amount;
        $this->financial_year = $financial_year;
    }

    public static function get_payments($family_member_id, $financial_year): array|false
    {
        global $pdo;

        $query = "SELECT payments_id, user_id, amount, year FROM payments
              LEFT JOIN family_member ON family_member.id = payments.payments_id
              INNER JOIN financial_year ON financial_year.financial_id = payments.financial_year
              WHERE payments.user_id = :family_member_id
              AND financial_year.year = :financial_year";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':family_member_id', $family_member_id);
        $stmt->bindParam(':financial_year', $financial_year);
        $stmt->execute();

        $payments = [];
        while ($payment = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $payments[] = new Payment(
                $payment['payments_id'],
                $payment['user_id'],
                $payment['amount'],
                $payment['year'],
            );
        }


        return $payments;
    }
}