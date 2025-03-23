<?php
require_once __DIR__ . '/../db/database.php';

class Vista2 {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function obtenerTodos() {
        $stmt = $this->db->query("
        SELECT 
                marcasmasvendidas.nombre,
                marcasmasvendidas.total_vendido
            FROM 
                marcasmasvendidas;
        ");
        return $stmt->fetchAll();
    }

}
?>