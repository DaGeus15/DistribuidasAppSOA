<?php
include_once 'conexion.php'; // incluir el archivo de conexion a la base de datos
class Select
{
    public function selectEstudiantes()
    {
        //crear una instancia de la clase de conexion a la BD
        $objetoBase =  new Conexion();
        $conexion = $objetoBase->conectar();
        $sqlSelect = "SELECT * FROM `estudiantes`";

        //preparar la consulta, ejecutarla y obtener el resultado
        $sentencia = $conexion->prepare($sqlSelect);
        $sentencia->execute();
        $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        $data = json_encode($resultado);

        print_r($data);

        //verificar si hay resultados
        // if ($resultado) {
        //     echo "Se encontraron resultados:<br><hr>";
        //     //si hay resultados, mostrarlos
        //     foreach ($resultado as $fila) {
        //         echo "Cedula: " . $fila['cedula'] . "<br>";
        //         echo "Nombre: " . $fila['nombre'] . "<br>";
        //         echo "Apellido: " . $fila['apellido'] . "<br>";
        //         echo "Direccion: " . $fila['direccion'] . "<br>";
        //         echo "Correo: " . $fila['telefono'] . "<br>";
        //         echo "--------------------------------------------<br>";
        //     }
        // } else {
        //     //si no hay resultados, mostrar un mensaje
        //     echo "No se encontraron resultados.";
        // }

    }

    public function selectEstudianteByCedula($cedula)
    {
        $objetoBase =  new Conexion();
        $conexion = $objetoBase->conectar();
        $sqlSelect = "SELECT * FROM `estudiantes` WHERE cedula = '$cedula'";

        //preparar la consulta, ejecutarla y obtener el resultado
        $sentencia = $conexion->prepare($sqlSelect);
        $sentencia->execute();
        $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        $data = json_encode($resultado);

        print_r($data);
    }
}
