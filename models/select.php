<?php
include_once 'conexion.php'; // incluir el archivo de conexion a la base de datos
class Select
{
    public function selectEstudiantes()
    {
        $objetoBase =  new Conexion();
        $conexion = $objetoBase->conectar();
        $sqlSelect = "SELECT * FROM `estudiantes`";

        $sentencia = $conexion->prepare($sqlSelect);
        $sentencia->execute();
        $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultado;
    }

    public function selectEstudianteByCedula($cedula)
    {
        $objetoBase =  new Conexion();
        $conexion = $objetoBase->conectar();
        $sqlSelect = "SELECT * FROM `estudiantes` WHERE cedula = :cedula";

        $sentencia = $conexion->prepare($sqlSelect);
        $sentencia->bindParam(':cedula', $cedula, PDO::PARAM_STR);
        $sentencia->execute();
        $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultado;
    }
}