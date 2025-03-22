<?php
require_once __DIR__ . '/../db/database.php';

class Vista1 {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function obtenerTodos() {
        $stmt = $this->db->query("
        SELECT 
                marcasconventas.nombre
            FROM 
                marcasconventas;
        ");
        return $stmt->fetchAll();
    }

}
?>