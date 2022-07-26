<?php 
  require_once '../autoload.php';
  $actas = $acta_repository->all();

  include('../partials/header.php');
?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Actas</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Actas</li>
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
              <?php if (sizeof($actas['actas']) > 0) { ?>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Asunto</th>
                    <th colspan="6">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  foreach ($actas['actas'] as $acta) {
                    $deleteRoute = "acta.php?id=".$acta->id;
                    $editRoute = "../commitments/index.php?acta=".$acta->id;
                ?>
                  <tr>
                    <th><?php echo $acta->id; ?></th>
                    <td><?php echo $acta->subject; ?></td>
                    <td width="20px">
                      <a href="<?php echo $deleteRoute; ?>">
                        Ver datos
                      </a>
                    </td>
                    <td width="20px">
                      <a href="<?php echo $editRoute; ?>">
                        Ver compromisos
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