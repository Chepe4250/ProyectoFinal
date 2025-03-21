<?php
// http://localhost/libreria/api/v1/public/index.php/libros
// http://localhost/Des_Plat/ProyectoFinal/api/public/index.php/marca
require_once 'controllers/MarcasController.php';
// Obtener el método de la solicitud
$method = $_SERVER['REQUEST_METHOD'];

// Obtener la ruta solicitada y quitar 'public' si es necesario
$requestUri = trim(str_replace('/ProyectoFinal/api/public', '', $_SERVER['REQUEST_URI']), '/');

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
            // http://localhost/libreria/api/v1/public/index.php/libro?id=5
            // http://localhost/libreria/api/v1/public/index.php/libro
            // http://localhost/ProyectoFinal/api/public/index.php/marca
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



