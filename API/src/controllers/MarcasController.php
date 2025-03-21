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

    // leyendo los datos del body
    // llamammos al modelo enviar los datos.
    // devolvemos el resultado
    public function crearMarca() {
        $data = json_decode(file_get_contents(filename: 'php://input'), true);
        $resultado = $this->model->crear($data);
        echo json_encode($resultado);

    }

    public function actualizarMarca($id)
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $modeloMarca = new Marcas(); 
        $resultado = $modeloMarca->actualizar($id,$data);       
        echo json_encode(value: ["Resultado" =>   $resultado]);
    }

    public function actualizar($id)
    {
        $data = json_decode(file_get_contents("php://input"), true);

        $modeloMarca = new Marcas();        
        echo json_encode(value: ["Resultado" =>   $modeloMarca->update($id,$data)]);
        
    }

    public function eliminarMarca($id) {
        echo json_encode($this->model->eliminar($id));
    }
}
        
?>