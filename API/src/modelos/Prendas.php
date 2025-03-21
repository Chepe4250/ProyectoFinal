<?php
require_once __DIR__ . '/../db/database.php';

class Prendas {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function obtenerTodos() {
        $stmt = $this->db->query("
        SELECT 
                prendas.id_prenda, 
                prendas.nombre,
                prendas.tipo,
                prendas.talla, 
                prendas.precio, 
                prendas.stock, 
                prendas.id_marca
            FROM 
                Prendas;
        ");
        return $stmt->fetchAll();
    }

    public function buscarPorID($id) {
        $stmt = $this->db->prepare("SELECT * FROM Prendas WHERE id_prenda = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }


    public function crear($data)
    {
        $stmt = $this->db->prepare("INSERT INTO Prendas (nombre, tipo, talla, precio, stock, id_marca) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$data['nombre'], $data['tipo'], $data['talla'], $data['precio'], $data['stock'], $data['id_marca']]);
        return ['id' => $this->db->lastInsertId()];   
    }


    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO Prendas (nombre, tipo, talla, precio, stock, id_marca) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$data['nombre'], $data['tipo'], $data['talla'], $data['precio'], $data['stock'], $data['id_marca']]);
        return ['el id nuevo es' => $this->db->lastInsertId()];
    }


    public function actualizar($id, $data){

        // crear funcion
        // crear sql consulta
        //return algo
        $stmt = $this->db->prepare("UPDATE Prendas SET nombre = ?, tipo = ?, talla = ?, precio = ?, stock = ?, id_marca = ? WHERE id_prenda = ?");
        $stmt->execute([$data['nombre'], $data['tipo'], $data['talla'], $data['precio'], $data['stock'], $data['id_marca'],  $id]);
        return ['success' => true];
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE Prendas SET nombre = ?, tipo = ?, talla = ?, precio = ?, stock = ?, id_marca = ? WHERE id_prenda = ?");
        $stmt->execute([$data['nombre'], $data['tipo'], $data['talla'], $data['precio'], $data['stock'], $data['id_marca'],  $id]);
        return ['success' => true];
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM Prendas WHERE id_prenda = ?");
        $stmt->execute([$id]);
        return ['success' => true];
    }


    public function eliminar($id){
        try 
        {
            $stmt = $this->db->prepare("DELETE FROM Prendas WHERE id_prenda = ?");
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