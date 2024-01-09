<?php
include_once 'config.php';

class DataBaseConection {
    private $db;
    private static $instance;

    private function __construct() {
        $this->db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new DataBaseConection();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->db;
    }
}
?>
