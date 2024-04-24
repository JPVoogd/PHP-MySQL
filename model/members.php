<?php
require_once 'model/database.php';

class Members
{

    public $id;
    public $name;
    public $family_name;
    public $birthday;
    public $address;
    public $membership;
    public $discount;

    private function __construct($id, $name, $family_name, $birthday, $address, $membership, $discount)
    {
        $this->id = $id;
        $this->name = $name;
        $this->family_name = $family_name;
        $this->birthday = $birthday;
        $this->address = $address;
        $this->membership = $membership;
        $this->discount = $discount;

    }

    public static function get_members(): false|array
    {
        global $pdo;

        $query = "SELECT id, name, family_name, birthday, address, membership, discount.discount FROM eindopdracht.family_member
              INNER JOIN family ON family_member.family_id = family.family_id
              LEFT JOIN discount ON family_member.discount = discount.discount_id
              INNER JOIN payments ON family_member.family_id = payments.payments_id
              INNER JOIN financial_year ON family_member.payments = financial_year.financial_id
              ORDER BY id ASC";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $members = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $members[] = new Members(
                $row['id'],
                $row['name'],
                $row['family_name'],
                $row['birthday'],
                $row['address'],
                $row['membership'],
                $row['discount'],
            );
        }

        return $members;
    }

}

?>