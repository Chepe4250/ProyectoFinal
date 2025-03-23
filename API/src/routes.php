<?php
// http://localhost/Des_Plat/ProyectoFinal/api/public/index.php
require_once 'controllers/MarcasController.php';
require_once 'controllers/PrendasController.php';
require_once 'controllers/VentasController.php';
require_once 'controllers/Vista1Controller.php';
require_once 'controllers/Vista2Controller.php';
require_once 'controllers/Vista3Controller.php';
// Obtener el método de la solicitud
$method = $_SERVER['REQUEST_METHOD'];

// Obtener la ruta solicitada y quitar 'public' si es necesario
$requestUri = trim(str_replace('/Des_Plat/ProyectoFinal/api/public', '', $_SERVER['REQUEST_URI']), '/');

// Separar la ruta en segmentos
// Quitar los parámetros de la URL para que no interfieran con la ruta
$requestUriWithoutQuery = strtok($requestUri, '?');
$segments = explode('/', $requestUriWithoutQuery);
///var_dump($segments);

//var_dump( $_SERVER['QUERY_STRING']);

// Obtener parámetros de la URL (si los hay)
$queryString = $_SERVER['QUERY_STRING'] ?? '';
parse_str($queryString, $queryParams); // CONVIERTE LOS QUERY STRING EN UN ARRAY.
$id = $queryParams['id'] ?? null;

//var_dump($id);

if (isset($segments[1]) && $segments[1] == "marca") {

    switch ($method) {
        case 'GET':
            // ejemplo de endpoint postman.
            // http://localhost/Des_Plat/ProyectoFinal/api/public/index.php/marca
            // http://localhost/Des_Plat/ProyectoFinal/api/public/index.php/marca?id=5
            if ($id != null) {

                $marca = new  MarcasController();
                $marca->obtenerMarca($id);
            } 
            else{
            
                $marca = new  MarcasController();
                $marca->ObtenerTodos();
            }  
            break;

        case 'POST':
            $marca = new  MarcasController();
            $marca->crearMarca();
            // echo json_encode(value: ['Alert' => 'llamando al POST en libro']);
            break;

        case 'PUT':
            $marca = new  MarcasController();
            $marca->actualizarMarca($id);
            break;
    
        case 'DELETE':
            $marca = new  MarcasController();
            $marca->eliminarMarca(id: $id);
            break;

        default:
            // Método no permitido
            header('HTTP/1.1 405 Method Not Allowed');
            echo json_encode(['error' => 'Método no permitido']);
            break;
    }
}

if (isset($segments[1]) && $segments[1] == "prenda") {

    switch ($method) {
        case 'GET':
            // ejemplo de endpoint postman.
            // http://localhost/Des_Plat/ProyectoFinal/api/public/index.php/prenda
            // http://localhost/Des_Plat/ProyectoFinal/api/public/index.php/prenda?id=5
            if ($id != null) {

                $prenda = new  PrendasController();
                $prenda->obtenerPrenda($id);
            } 
            else{
            
                $prenda = new  PrendasController();
                $prenda->ObtenerTodos();
            }  
            break;

        case 'POST':
            $prenda = new  PrendasController();
            $prenda->crearPrenda();
            // echo json_encode(value: ['Alert' => 'llamando al POST en libro']);
            break;

        case 'PUT':
            $prenda = new  PrendasController();
            $prenda->actualizarPrenda($id);
            break;
    
        case 'DELETE':
            $prenda = new  PrendasController();
            $prenda->eliminarPrenda(id: $id);
            break;

        default:
            // Método no permitido
            header('HTTP/1.1 405 Method Not Allowed');
            echo json_encode(['error' => 'Método no permitido']);
            break;
    }
}

if (isset($segments[1]) && $segments[1] == "venta") {

    switch ($method) {
        case 'GET':
            // ejemplo de endpoint postman.
            // http://localhost/Des_Plat/ProyectoFinal/api/public/index.php/venta
            // http://localhost/Des_Plat/ProyectoFinal/api/public/index.php/venta?id=5
            if ($id != null) {

                $venta = new  VentasController();
                $venta->obtenerVenta($id);
            } 
            else{
            
                $venta = new  VentasController();
                $venta->ObtenerTodos();
            }  
            break;

        case 'POST':
            $venta = new  VentasController();
            $venta->crearVenta();
            // echo json_encode(value: ['Alert' => 'llamando al POST en libro']);
            break;

        case 'PUT':
            $venta = new  VentasController();
            $venta->actualizarVenta($id);
            break;
    
        case 'DELETE':
            $venta = new  VentasController();
            $venta->eliminarVenta(id: $id);
            break;

        default:
            // Método no permitido
            header('HTTP/1.1 405 Method Not Allowed');
            echo json_encode(['error' => 'Método no permitido']);
            break;
    }
}

if (isset($segments[1]) && $segments[1] == "vista1") {

    switch ($method) {
        case 'GET':
            // ejemplo de endpoint postman.
            // http://localhost/Des_Plat/ProyectoFinal/api/public/index.php/vista1
            $vista1 = new  Vista1Controller();
            $vista1->ObtenerTodos();
            break;

        default:
            // Método no permitido
            header('HTTP/1.1 405 Method Not Allowed');
            echo json_encode(['error' => 'Método no permitido']);
            break;
    }
}

if (isset($segments[1]) && $segments[1] == "vista2") {

    switch ($method) {
        case 'GET':
            // ejemplo de endpoint postman.
            // http://localhost/Des_Plat/ProyectoFinal/api/public/index.php/vista2
            $vista2 = new  Vista2Controller();
            $vista2->ObtenerTodos();
            break;

        default:
            // Método no permitido
            header('HTTP/1.1 405 Method Not Allowed');
            echo json_encode(['error' => 'Método no permitido']);
            break;
    }
}

if (isset($segments[1]) && $segments[1] == "vista3") {

    switch ($method) {
        case 'GET':
            // ejemplo de endpoint postman.
            // http://localhost/Des_Plat/ProyectoFinal/api/public/index.php/vista3
            $vista3 = new  Vista3Controller();
            $vista3->ObtenerTodos();
            break;

        default:
            // Método no permitido
            header('HTTP/1.1 405 Method Not Allowed');
            echo json_encode(['error' => 'Método no permitido']);
            break;
    }
}

