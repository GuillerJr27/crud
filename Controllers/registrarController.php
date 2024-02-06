<?php

require '../Models/registrarUsuarioModel.php';

class RegistrarController
{
    static public function ctrRegistrarUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Verificar que el formulario se envió con el método POST

            if (isset($_POST['identificacion'])) {
                // Recoger datos del formulario
                $identificacion = $_POST['identificacion'];
                $primerNombre = $_POST['primerNombre'];
                $segundoNombre = $_POST['segundoNombre'];
                $primerApellido = $_POST['primerApellido'];
                $segundoApellido = $_POST['segundoApellido'];
                $edad = $_POST['edad'];

                // Llamar al método del modelo
                $resultado = RegistroUsuarioModel::mdlRegistrarUsuario($identificacion, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $edad);

                if ($resultado) {
                    echo 'Registro insertado correctamente.';
                } else {
                    echo 'Error al insertar el registro.';
                }
            }
        }
    }
}