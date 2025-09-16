<?php
include_once 'conexion.php';
class Update
{
    public static function editarEstudiantes($cedula, $nombre, $apellido, $direccion, $telefono)
    {
        $objetoUpdate = new Conexion();
        $conexion = $objetoUpdate->conectar();
        $sqlUpdate = "UPDATE estudiantes SET nombre = ?, apellido = ?, direccion = ?, telefono = ? WHERE cedula = ?";
        $result = $conexion->prepare($sqlUpdate);
        $result->bindParam(1, $nombre);
        $result->bindParam(2, $apellido);
        $result->bindParam(3, $direccion);
        $result->bindParam(4, $telefono);
        $result->bindParam(5, $cedula);

        try {
            if ($result->execute()) {
                // Devolver un JSON indicando éxito
                return ["success" => true, "message" => "Usuario editado exitosamente."];
            } else {
                // Devolver un JSON indicando error
                return ["success" => false, "error" => "Error al editar el usuario."];
            }
        } catch (PDOException $e) {
            return [
                "success" => false,
                "error" => "Error en la base de datos: " . $e->getMessage()
            ];
        }
    }
}
