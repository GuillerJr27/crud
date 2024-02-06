<?php

include '../Config/config.php';

class Conexion
{
    private static $conn;

    static public function getConnect()
    {
        if (!isset(self::$conn) || self::$conn === null) {
            $connect = 'pgsql:host=' . DB_HOST . ';port=5432;dbname=' . DB_NAME . ';';

            try {
                self::$conn = new PDO($connect, DB_USER, DB_PASS);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                // Manejar el error de conexión de manera más descriptiva
                die('ERROR: No se pudo conectar a la base de datos. Detalles del error: ' . $e->getMessage());
            }
        }

        return self::$conn;
    }
}