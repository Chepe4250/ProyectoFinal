<?php
require_once __DIR__ . '/../modelos/Vista2.php';

class Vista2Controller {
    private $model;

    public function __construct() {
        $this->model = new Vista2();
    }



    public function ObtenerTodos() {
        

        $todosLosDatos = $this->model->obtenerTodos();
        echo json_encode($todosLosDatos);
    }

}
        
?>