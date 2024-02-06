<?php

require 'conexion.php';

class RegistroUsuarioModel
{
    static public function mdlRegistrarUsuario($identificacion, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $edad)
    {
        $sql = 'INSERT INTO usuario (identificacion, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, edad) 
        VALUES(:identificacion, :primerNombre, :segundoNombre, :primerApellido, :segundoApellido, :edad)';

        try {
            $stmt = Conexion::getConnect()->prepare($sql);

            $stmt->bindParam(':identificacion', $identificacion, PDO::PARAM_STR);
            $stmt->bindParam(':primerNombre', $primerNombre, PDO::PARAM_STR);
            $stmt->bindParam(':segundoNombre', $segundoNombre, PDO::PARAM_STR);
            $stmt->bindParam(':primerApellido', $primerApellido, PDO::PARAM_STR);
            $stmt->bindParam(':segundoApellido', $segundoApellido, PDO::PARAM_STR);
            $stmt->bindParam(':edad', $edad, PDO::PARAM_STR);

            $stmt->execute();

            // Devolver true si la inserción fue exitosa
            return $stmt->rowCount() > 0;
            
        } catch (PDOException $e) {
            // Manejar el error de ejecución de la consulta
            echo 'Error al ejecutar la consulta: ' . $e->getMessage();
            // Devolver false en caso de error
            return false;
        } finally {
            // Opcional: Cerrar la conexión explícitamente
            // Conexion::getConnect()->close();
        }
    }
}