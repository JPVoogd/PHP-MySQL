<?php
require_once 'model/database.php';

class Member
{

    public $id;
    public $name;
    public $family_name;
    public $birthday;
    public $address;
    public $membership;
    public $discount;
    public $role;

    public function __construct($id, $name, $family_name, $birthday, $address, $membership, $discount, $role)
    {
        $this->id = $id;
        $this->name = $name;
        $this->family_name = $family_name;
        $this->birthday = $birthday;
        $this->address = $address;
        $this->membership = $membership;
        $this->discount = $discount;
        $this->role = $role;
    }

    public static function get_by_id($id): Member
    {
        global $pdo;

        $query = "SELECT id, name, family_name, birthday, address, membership, discount.discount, role FROM eindopdracht.family_member
              INNER JOIN family ON family_member.family_id = family.family_id
              LEFT JOIN discount ON family_member.discount = discount.discount_id
            LEFT JOIN account ON family_member.account_id = account.account_id
              INNER JOIN payments ON family_member.family_id = payments.payments_id
              INNER JOIN financial_year ON family_member.payments = financial_year.financial_id
              WHERE family_member.id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $member = $stmt->fetch(PDO::FETCH_ASSOC);

        return new Member(
            $member['id'],
            $member['name'],
            $member['family_name'],
            $member['birthday'],
            $member['address'],
            $member['membership'],
            $member['discount'],
            $member['role'],
        );
    }

    public static function update_member($id, $name, $birthday): bool
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

    public static function delete_member($id): bool
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