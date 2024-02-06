<?php
include('../Models/consultarDatos.php');
include('layouts/header.php');
include('layouts/nav.php');
include('layouts/menu.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Ver Usuarios</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
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
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Id</th>
              <th>Identificación</th>
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>Edad</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $consultarDatos = ConsultarUsuario::consultarUsuario();
            foreach ($consultarDatos as $value) {
              $id = $value['id'];
              $identificacion = $value['identificacion'];
              $primer_nombre = $value['primer_nombre'];
              $segundo_nombre = $value['segundo_nombre'];
              $primer_apellido = $value['primer_apellido'];
              $segundo_apellido = $value['segundo_apellido'];
              $edad = $value['edad'];
            ?>
              <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $identificacion; ?></td>
                <td><?php echo $primer_nombre . ' ' . $segundo_nombre; ?></td>
                <td><?php echo $primer_apellido . ' ' . $segundo_apellido; ?></td>
                <td><?php echo $edad; ?></td>
                <td>
                  <a href="editarUsuario.php?id=<?php echo $id; ?>" class="btn btn-warning">Editar</a>
                  <button class="btn btn-danger">Eliminar</button>
                </td>
              </tr>
            <?php } ?>
          </tbody>
          <tfoot>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include('layouts/footer.php'); ?>