<?php
require_once __DIR__ . '/../db/database.php';

class Vista3 {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function obtenerTodos() {
        $stmt = $this->db->query("
        SELECT 
                prendasstockvendidas.id_prenda,
                prendasstockvendidas.nombre,
                prendasstockvendidas.cantidad_vendida,
                prendasstockvendidas.stock_restante
            FROM 
                prendasstockvendidas;
        ");
        return $stmt->fetchAll();
    }

}
?>