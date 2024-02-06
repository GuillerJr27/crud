<?php
//include '../Models/consultarDatos.php';
include '../Controllers/registrarController.php';
include '../Views/layouts/header.php';
?>

<?php
if (isset($_POST['id'])) {
    $idUSer = $_POST['id'];
} else {
    $idUSer = $_GET['id'];
}
?>




<?php include '../Views/layouts/nav.php'; ?>

<?php include '../Views/layouts/menu.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Usuarios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Registro de Usuarios</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Title</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">

                <?php
                $editarUsuario = ConsultarUsuario::UsuarioPorID($idUser);

                foreach ($editarUsuario as $value) {
                    $identificacion = $value['identificacion'];
                    $primer_nombre = $value['primer_nombre'];
                    $segundo_nombre = $value['segundo_nombre'];
                    $primer_apellido = $value['primer_apellido'];
                    $segundo_apellido = $value['segundo_apellido'];
                    $edad = $value['edad'];
                }
                ?>
                <form class="row g-3" action="" method="post">
                    <div class="col-6">
                        <label class=" form-label">Identificación:</label>
                        <input class="form-control" type="text" name="identificacionEdit"
                            value="<?php echo $identificacion; ?>">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Primer Nombre:</label>
                        <input class="form-control" type="text"
                            name="primerNombreEdit">value="<?php echo $primer_nombre; ?>"
                    </div>
                    <div class="col-6">
                        <label class="form-label">Segundo Nombre:</label>
                        <input class="form-control" type="text" name="segundoNombreEdit"
                            value="<?php echo $segundo_nombre; ?>">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Primer Apellido:</label>
                        <input class="form-control" type="text" name="primerApellidoEdit"
                            value="<?php echo $primer_apellido; ?>">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Segundo Apellido:</label>
                        <input class="form-control" type="text" name="segundoApellidoEdit"
                            value="<?php echo $segundo_apellido; ?>">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Edad:</label>
                        <input class="form-control" type="text" name="edadEdit" value="<?php echo $edad; ?>">
                    </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="col-3">
                    <button class="btn btn-primary" type="submit">
                        Actualizar
                    </button>
                </div>
            </div>

            <?php

            $registrar = new RegistrarController();
            $registrar->ctrRegistrarUsuario();

            ?>
            </form>
            <!-- /.card-footer-->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include '../Views/layouts/footer.php'; ?>