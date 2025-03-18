<?php
require_once __DIR__ . '/../modelos/Marcas.php';

class MarcasController {
    private $model;

    public function __construct() {
        $this->model = new Marcas();
    }



    public function ObtenerTodos() {
        

        $todosLosDatos = $this->model->obtenerTodos();
        echo json_encode($todosLosDatos);
    }


    public function obtenerMarca($id) {

    
        echo json_encode($this->model->buscarPorID($id));
    
        // echo json_encode($this->model->all());
    }

    public function crearMarca() {
        $data = json_decode(file_get_contents('php://input'), true);


       // var_dump($data);
        echo json_encode($this->model->crear($data));
    }
}
        
?>