<?php
include_once 'conexion.php';
class Delete
{
    public static function eliminarEstudiantes($cedula)
    {
        try {
            $objeto = new Conexion();
            $conexion = $objeto->conectar();

            $sql = "DELETE FROM estudiantes WHERE cedula = :cedula";
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(':cedula', $cedula, PDO::PARAM_STR);

            // $sentencia -> execute();
            if ($sentencia->execute()) {
                return [
                    "success" => true,
                    "message" => "Estudiante eliminado correctamente"
                ];
            } else {
                return [
                    "success" => false,
                    "error" => "Error al eliminar el estudiante"
                ];
            }
        } catch (PDOException $e) {
            return [
                "success" => false,
                "error" => "Error en la base de datos: " . $e->getMessage()
            ];
        }
    }
}
