<?php 
  require_once '../autoload.php';
  include('../partials/header.php');
  $acta_id = $_GET['id'];
  $acta = $acta_repository->getById($acta_id);
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

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                <h1>Informacion de Acta</h1>
                <p><strong>ID: </strong> <?php echo $acta['acta']['id']; ?> </p>
                <p><strong>ASUNTO: </strong> <?php echo $acta['acta']['subject']; ?> </p>
                <p><strong>FECHA: </strong> <?php echo $acta['acta']['date']; ?> </p>
                <p><strong>DESCRIPCION: </strong> <?php echo $acta['acta']['description']; ?> </p>
                <p><strong>RESPONSABLE: </strong> <?php echo $acta['acta']['responsible']; ?> </p>
                <a href="index.php" type="button" class="btn btn-primary mt-3">Volver</a>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>
<?php include('../partials/footer.php'); ?>