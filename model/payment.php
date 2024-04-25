<?php
require_once 'model/database.php';

class Payment
{

    public $payment_id;
    public $user_id;
    public $amount;
    public $name;
    public $financial_year;
    public $discount;

    public function __construct($payment_id, $user_id, $name, $amount, $financial_year, $discount)
    {
        $this->payment_id = $payment_id;
        $this->user_id = $user_id;
        $this->name = $name;
        $this->amount = $amount;
        $this->financial_year = $financial_year;
        $this->discount = $discount;
    }

    public static function get_financial_years(): false|array
    {
        global $pdo;

        $query = "SELECT financial_id, year FROM financial_year";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function get_payments($family_member_id, $financial_year): array|false
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

//        global $pdo;
//
//        $query = "SELECT payments_id, user_id, name, amount, financial_year, discount FROM payments
//              LEFT JOIN family_member ON family_member.id = payments.payments_id
//              INNER JOIN financial_year ON financial_year.financial_id = payments.financial_year
//              WHERE payments.user_id = :family_member_id
//              AND financial_year.year = :financial_year";
//        $stmt = $pdo->prepare($query);
//        $stmt->bindParam(':family_member_id', $family_member_id);
//        $stmt->bindParam(':financial_year', $financial_year);
//        $stmt->execute();
//        $payment = $stmt->fetch(PDO::FETCH_ASSOC);
//
//        return new Payment(
//            $payment['payments_id'],
//            $payment['user_id'],
//            $payment['name'],
//            $payment['amount'],
//            $payment['financial_year'],
//            $payment['discount'],
//        );
    }
}