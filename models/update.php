<?php
include_once 'conexion.php';
class Update
{
    public static function editarEstudiantes($cedula, $nombre, $apellido, $direccion, $telefono)
    {
        $objetoUpdate = new Conexion();
        $conexion = $objetoUpdate->conectar();
        
        $checkSql = "SELECT cedula FROM estudiantes WHERE cedula = ? FOR UPDATE";

        try {
            $conexion->beginTransaction();

            // Verificar existencia del estudiante
            $check = $conexion->prepare($checkSql);
            $check->bindParam(1, $cedula);
            $check->execute();

            if ($check->rowCount() === 0) {
                $conexion->rollBack();
                return ["success" => false, "error" => "Estudiante no encontrado."];
            }

            $sqlUpdate = "UPDATE estudiantes SET nombre = ?, apellido = ?, direccion = ?, telefono = ? WHERE cedula = ?";
            $result = $conexion->prepare($sqlUpdate);
            $result->bindParam(1, $nombre);
            $result->bindParam(2, $apellido);
            $result->bindParam(3, $direccion);
            $result->bindParam(4, $telefono);
            $result->bindParam(5, $cedula);

            if ($result->execute()) {
                $conexion->commit();
                return ["success" => true, "message" => "Usuario editado exitosamente."];
            } else {
                $conexion->rollBack();
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
