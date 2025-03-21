<?php
require_once __DIR__ . '/../modelos/Prendas.php';

class PrendasController {
    private $model;

    public function __construct() {
        $this->model = new Prendas();
    }



    public function ObtenerTodos() {
        

        $todosLosDatos = $this->model->obtenerTodos();
        echo json_encode($todosLosDatos);
    }

    public function obtenerPrenda($id) {

    
        echo json_encode($this->model->buscarPorID($id));
    
        // echo json_encode($this->model->all());
    }

    // leyendo los datos del body
    // llamammos al modelo enviar los datos.
    // devolvemos el resultado
    public function crearPrenda() {
        $data = json_decode(file_get_contents(filename: 'php://input'), true);
        $resultado = $this->model->crear($data);
        echo json_encode($resultado);

    }

    public function actualizarPrenda($id)
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $modeloPrenda = new Prendas(); 
        $resultado = $modeloPrenda->actualizar($id,$data);       
        echo json_encode(value: ["Resultado" =>   $resultado]);
    }

    public function actualizar($id)
    {
        $data = json_decode(file_get_contents("php://input"), true);

        $modeloPrenda = new Prendas();        
        echo json_encode(value: ["Resultado" =>   $modeloPrenda->update($id,$data)]);
        
    }

    public function eliminarPrenda($id) {
        echo json_encode($this->model->eliminar($id));
    }
}
        
?>