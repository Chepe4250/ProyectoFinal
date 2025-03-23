<?php
require_once __DIR__ . '/../modelos/Vista3.php';

class Vista3Controller {
    private $model;

    public function __construct() {
        $this->model = new Vista3();
    }



    public function ObtenerTodos() {
        

        $todosLosDatos = $this->model->obtenerTodos();
        echo json_encode($todosLosDatos);
    }

}
        
?>