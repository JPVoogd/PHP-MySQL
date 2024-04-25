<?php
require_once 'model/database.php';

Class Years {
    public $financial_id;
    public $year;

    public function __construct($financial_id, $year) {
            $this->financial_id = $financial_id;
            $this->year = $year;
    }

    public static function get_all(){
        global $pdo;

        $query = "SELECT financial_id, year FROM financial_year";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $year = $stmt->fetch(PDO::FETCH_ASSOC);

        return new Year(
            $year['financial_id'],
            $year['year']
        );
    }
}
?>