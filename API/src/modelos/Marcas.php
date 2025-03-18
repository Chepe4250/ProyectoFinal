<?php
require_once __DIR__ . '/../db/database.php';

class Marcas {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function obtenerTodos() {
        $stmt = $this->db->query("
        SELECT 
                id_marca, 
                nombre,
                pais_origen
            FROM 
                Marcas;
        ");
        return $stmt->fetchAll();
    }

    public function buscarPorID($id) {
        $stmt = $this->db->prepare("SELECT * FROM Marcas WHERE id_marca = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }


    public function crear($data)
    {
        $stmt = $this->db->prepare("INSERT INTO Marcas (nombre, pais_origen) VALUES (?, ?)");
        $stmt->execute([$data['nombre'], $data['pais_origen']]);
        return ['id' => $this->db->lastInsertId()];   
    }


    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO Marcas (nombre, pais_origen) VALUES (?, ?)");
        $stmt->execute([$data['nombre'], $data['pais_origen']]);
        return ['el id nuevo es' => $this->db->lastInsertId()];
    }


    public function actualizar($id, $data){

        // crear funcion
        // crear sql consulta
        //return algo
        $stmt = $this->db->prepare("UPDATE Marcas SET nombre = ?, pais_origen = ?");
        $stmt->execute([$data['nombre'], $data['pais_origen'],  $id]);
        return ['success' => true];
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE Marcas SET nombre = ?, pais_origen = ?");
        $stmt->execute([$data['nombre'], $data['pais_origen'],  $id]);
        return ['success' => true];
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM Marcas WHERE id_marca = ?");
        $stmt->execute([$id]);
        return ['success' => true];
    }


    public function eliminar($id){
        try 
        {
            $stmt = $this->db->prepare("DELETE FROM Marcas WHERE id_marca = ?");
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