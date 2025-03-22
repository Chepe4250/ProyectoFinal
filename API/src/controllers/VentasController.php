<?php
require_once __DIR__ . '/../modelos/Ventas.php';

class VentasController {
    private $model;

    public function __construct() {
        $this->model = new Ventas();
    }



    public function ObtenerTodos() {
        

        $todosLosDatos = $this->model->obtenerTodos();
        echo json_encode($todosLosDatos);
    }

    public function obtenerVenta($id) {

    
        echo json_encode($this->model->buscarPorID($id));
    
        // echo json_encode($this->model->all());
    }

    // leyendo los datos del body
    // llamammos al modelo enviar los datos.
    // devolvemos el resultado
    public function crearVenta() {
        $data = json_decode(file_get_contents(filename: 'php://input'), true);
        $resultado = $this->model->crear($data);
        echo json_encode($resultado);

    }

    public function actualizarVenta($id)
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $modeloVenta = new Ventas(); 
        $resultado = $modeloVenta->actualizar($id,$data);       
        echo json_encode(value: ["Resultado" =>   $resultado]);
    }

    public function actualizar($id)
    {
        $data = json_decode(file_get_contents("php://input"), true);

        $modeloVenta = new Ventas();        
        echo json_encode(value: ["Resultado" =>   $modeloVenta->update($id,$data)]);
        
    }

    public function eliminarVenta($id) {
        echo json_encode($this->model->eliminar($id));
    }
}
        
?>