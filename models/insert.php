<?php
include_once 'conexion.php';
class Insert
{
    public static function insertarEstudiantes($cedula, $nombre, $apellido, $direccion, $telefono)
    {
        $objetoSelect = new Conexion();
        $conexion = $objetoSelect->conectar();

        $sqlInsert = "INSERT INTO estudiantes VALUES ('$cedula', '$nombre', '$apellido', '$direccion', '$telefono')";

        try {
            $result = $conexion->prepare($sqlInsert);
            if ($result->execute()) {
                // Devolver un JSON indicando éxito
                return ["success" => true, "message" => "Usuario guardado exitosamente."];
            } else {
                //Devolver un JSON indicando error
                return ["success" => false, "error" => "Error al guardar el usuario."];
            }
        } catch (PDOException $e) {
            // Manejar errores de la base de datos
            return ["success" => false, "error" => $e->getMessage()];
        }
    }
}
