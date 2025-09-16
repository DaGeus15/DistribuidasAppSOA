<?php
// CORS headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// Manejo de preflight (para PUT y DELETE)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit();
}

// Obtener datos JSON si aplica
$rawInput = file_get_contents("php://input");
$input = json_decode($rawInput, true);

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        include_once '../models/select.php';
        $objetoSelect = new Select();

        if (isset($_GET['cedula']) && !empty($_GET['cedula'])) {
            $objetoSelect->selectEstudianteByCedula($_GET['cedula']);
        } else {
            $objetoSelect->selectEstudiantes();
        }
        break;

    case 'POST':
        include_once '../models/insert.php';

        if ($input && isset($input['cedula'], $input['nombre'], $input['apellido'], $input['direccion'], $input['telefono'])) {
            $result = Insert::insertarEstudiantes(
                $input['cedula'],
                $input['nombre'],
                $input['apellido'],
                $input['direccion'],
                $input['telefono']
            );
            echo json_encode(["success" => true, "data" => $result]);
        } else {
            echo json_encode(["success" => false, "error" => "Todos los campos son obligatorios"]);
        }
        break;

    case 'PUT':
        include_once '../models/update.php';

        if ($input && isset($input['cedula'], $input['nombre'], $input['apellido'], $input['direccion'], $input['telefono'])) {
            $result = Update::editarEstudiantes(
                $input['cedula'],
                $input['nombre'],
                $input['apellido'],
                $input['direccion'],
                $input['telefono']
            );
            echo json_encode(["success" => true, "data" => $result]);
        } else {
            echo json_encode(["success" => false, "error" => "Todos los campos son obligatorios"]);
        }
        break;

    case 'DELETE':
        include_once '../models/delete.php';

        if (isset($_GET['cedula'])) {
            $cedula = $_GET['cedula'];
            $result = Delete::eliminarEstudiantes($cedula);
            echo json_encode(["success" => true, "data" => $result]);
        } else {
            echo json_encode(["success" => false, "error" => "La cédula es obligatoria"]);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Método no permitido"]);
        break;
}