<?php 
  require_once '../autoload.php';
  include('../partials/header.php');
  $commitment_id = $_GET['id'];
  $acta = $_GET['acta'];
  $commitment = $commitment_repository->getById($commitment_id);
?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Compromiso</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Compromisos</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                <h1>Informacion de Compromiso</h1>
                <p><strong>ID: </strong> <?php echo $commitment['commitment']['id']; ?> </p>
                <p><strong>FECHA INICIAL: </strong> <?php echo $commitment['commitment']['start_date']; ?> </p>
                <p><strong>FECHA FINA: </strong> <?php echo $commitment['commitment']['end_date']; ?> </p>
                <p><strong>DESCRIPCION: </strong> <?php echo $commitment['commitment']['description']; ?> </p>
                <p><strong>RESPONSABLE: </strong> <?php echo $commitment['commitment']['responsible']; ?> </p>
                <a href="<?php echo "index.php?acta=".$acta ?>" type="button" class="btn btn-primary mt-3">Volver</a>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>
<?php include('../partials/footer.php'); ?>