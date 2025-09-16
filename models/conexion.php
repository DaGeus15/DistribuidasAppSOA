<?php
class Conexion
{
    public function conectar()
    {
        // Database connection configuration
        define('DB_HOST', '192.168.1.2');
        define('DB_USER', 'remote_user');
        define('DB_PASS', 'remote123');
        define('DB_NAME', 'soa');

        //:: -> significa que voy a llamar a un metodo estatico de ese objeto
        $opciones = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'];
        try {
            $conexion = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, $opciones);
            return $conexion;
        } catch (PDOException $e) {
            die("Eror en la conexion: " . $e->getMessage());
        }
    }
}