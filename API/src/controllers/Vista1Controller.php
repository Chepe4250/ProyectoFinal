<?php
require_once __DIR__ . '/../modelos/Vista1.php';

class Vista1Controller {
    private $model;

    public function __construct() {
        $this->model = new Vista1();
    }



    public function ObtenerTodos() {
        

        $todosLosDatos = $this->model->obtenerTodos();
        echo json_encode($todosLosDatos);
    }

}
        
?>