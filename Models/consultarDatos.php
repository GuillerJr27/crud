<?php

require 'conexion.php';

class ConsultarUsuario
{

    static public function consultarUsuario()
    {
        try {
            $sql = 'SELECT * FROM usuario';

            $stmt = Conexion::getConnect()->prepare($sql);
            $stmt->execute();

            // Obtener los resultados
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        } catch (PDOException $th) {
            // Manejar el error lanzando una excepción
            throw new Exception("Error al consultar usuarios: " . $th->getMessage());
        }
    }

    static public function UsuarioPorID($id)
    {
        try {
            $sql = 'SELECT * FROM usuario WHERE id = $id';

            $stmt = Conexion::getConnect()->prepare($sql);
            $stmt->execute();

            // Obtener los resultados
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        } catch (PDOException $th) {
            // Manejar el error lanzando una excepción
            throw new Exception("Error al consultar usuarios: " . $th->getMessage());
        }
    }
}