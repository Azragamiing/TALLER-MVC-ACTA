<?php
  require_once '../autoload.php';
  include('../partials/header.php');
  $users = $user_repository->all();
?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Usuarios</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Usuarios</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <?php
    echo (array_key_exists("success", $_SESSION) && array_key_exists("message", $_SESSION['success'])) ? 
    "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      {$_SESSION['success']['message']}
      <button id='closet_alert' type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>" : '';
    unset($_SESSION['success']);
    ?>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <a href="store.php" type="button" class="btn btn-primary mt-3">Crear</a>
              <!-- Default Table -->
              <?php if (sizeof($users['users']) > 0) { ?>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Identificacion</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Correo electronico</th>
                    <th scope="col">Estado</th>
                    <th colspan="2">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  foreach ($users['users'] as $user) {
                    $deleteRoute = "store.php?id=".$user->id;
                    $editRoute = "store.php?id=".$user->id;
                ?>
                  <tr>
                    <th><?php echo $user->identification; ?></th>
                    <td><?php echo $user->name; ?></td>
                    <td><?php echo $user->last_name; ?></td>
                    <td><?php echo $user->email; ?></td>
                    <td><?php echo $user->status; ?></td>
                    <td width="5px">
                      <a href="<?php echo $editRoute; ?>">
                        <i class="bi bi-pencil-fill" data-toggle="tooltip" title="Editar usuario"></i>
                      </a>
                    </td>
                    <td width="5px">
                      <a href="<?php echo $editRoute; ?>">
                        <i class="bi bi-trash-fill" data-toggle="tooltip" title="Eliminar usuario"></i>
                      </a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
              <?php } else {  echo "<h2>No existen Registros</h2>"; } ?>
              <!-- End Default Table Example -->
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

<?php include('../partials/footer.php'); ?>