<?php 
  require_once '../autoload.php';
  include('../partials/header.php');
  $acta_id = $_GET['acta'];

  $commitments = $commitment_repository->all($acta_id);
?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Compromisos</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Compromisos</li>
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
              <a href="../actas/index.php" type="button" class="btn btn-primary mt-3">Volver</a>
              <a href="<?php echo "store.php?acta=".$acta_id ?>"type="button" class="btn btn-primary mt-3">Crear</a>
              <!-- Default Table -->
              <?php if (sizeof($commitments['commitments']) > 0) { ?>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Fecha Inicio</th>
                    <th scope="col">Fecha Final</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  foreach ($commitments['commitments'] as $commitment) {
                    $editRoute = "commitment.php?id=".$commitment->id."&acta=".$acta_id;
                ?>
                  <tr>
                    <th><?php echo $commitment->id; ?></th>
                    <td><?php echo substr($commitment->description, 0, 100)."..."; ?></td>
                    <td><?php echo $commitment->start_date; ?></td>
                    <td><?php echo $commitment->end_date; ?></td>
                    <td width="20px">
                      <a href="<?php echo $editRoute; ?>">
                        Ver datos
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

  </main>
<?php include('../partials/footer.php'); ?>