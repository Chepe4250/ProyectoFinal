<?php
require_once __DIR__ . '/../db/database.php';

class Ventas {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function obtenerTodos() {
        $stmt = $this->db->query("
        SELECT 
                ventas.id_venta, 
                ventas.id_prenda,
                ventas.cantidad,
                ventas.fecha, 
                ventas.total
            FROM 
                Ventas;
        ");
        return $stmt->fetchAll();
    }

    public function buscarPorID($id) {
        $stmt = $this->db->prepare("SELECT * FROM Ventas WHERE id_venta = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }


    public function crear($data)
    {
        $stmt = $this->db->prepare("INSERT INTO Ventas (id_prenda, cantidad, fecha, total) VALUES (?, ?, ?, ?)");
        $stmt->execute([$data['id_prenda'], $data['cantidad'], $data['fecha'], $data['total']]);
        return ['id' => $this->db->lastInsertId()];   
    }


    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO Ventas (id_prenda, cantidad, fecha, total) VALUES (?, ?, ?, ?)");
        $stmt->execute([$data['id_prenda'], $data['cantidad'], $data['fecha'], $data['total']]);
        return ['el id nuevo es' => $this->db->lastInsertId()];
    }


    public function actualizar($id, $data){

        // crear funcion
        // crear sql consulta
        //return algo
        $stmt = $this->db->prepare("UPDATE Ventas SET id_prenda = ?, cantidad = ?, fecha = ?, total = ? WHERE id_venta = ?");
        $stmt->execute([$data['id_prenda'], $data['cantidad'], $data['fecha'], $data['total'],  $id]);
        return ['success' => true];
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE Ventas SET id_prenda = ?, cantidad = ?, fecha = ?, total = ? WHERE id_venta = ?");
        $stmt->execute([$data['id_prenda'], $data['cantidad'], $data['fecha'], $data['total'],  $id]);
        return ['success' => true];
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM Ventas WHERE id_venta = ?");
        $stmt->execute([$id]);
        return ['success' => true];
    }


    public function eliminar($id){
        try 
        {
            $stmt = $this->db->prepare("DELETE FROM Ventas WHERE id_venta = ?");
            $stmt->execute([$id]);
            return ['Eliminado' => true];

        } catch(Exception $e)
        {
            echo $e;
            // escribir en un log
            return ['Eliminado' => false];
        }

    }
}
?>