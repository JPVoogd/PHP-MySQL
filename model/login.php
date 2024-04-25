<?php
class User {

    public $id;
    public $username;
    public $password;
    public $role;

    public function __construct($id, $username, $password, $role) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }

    public static function user_login($email){
        global $pdo;

        $query = "SELECT account_id, email, password, role FROM account WHERE email=':email'";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt-> execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return new User(
            $user['account_id'];
            $user['email'];
            $user['password'];
            $user['role'];
        );
    }
}

?>