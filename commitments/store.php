<?php 
  require_once '../autoload.php';
  include('../partials/header.php');
  $acta_id = array_key_exists("acta", $_GET) ? $_GET['acta'] : 0;
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
    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Crear Compromiso</h5>
              <!-- Multi Columns Form -->
              <form class="row g-3" action="../Controllers/Commitment.php" method="post">
                <input type="hidden" name="action" value="store">
                <input type="hidden" name="acta" value="<?php echo $acta_id; ?>">

                <div class="col-md-12">
                  <label for="inputEmail5" class="form-label">Descripcion</label>
                  <textarea name="description" class="form-control" rows="3"></textarea>
                  <?php echo (array_key_exists("errors", $_SESSION) && array_key_exists("description", $_SESSION['errors'])) ? 
                  "<p class='invalid-feedback'>{$_SESSION['errors']['description']}</p>" : '' ?>
                </div>


                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Fecha Inicial</label>
                  <input type="date" class="form-control" name="start_date">
                  <?php echo (array_key_exists("errors", $_SESSION) && array_key_exists("start_date", $_SESSION['errors'])) ? 
                  "<p class='invalid-feedback'>{$_SESSION['errors']['start_date']}</p>" : '' ?>
                </div>

                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Fecha Final</label>
                  <input type="date" class="form-control" name="end_date">
                  <?php echo (array_key_exists("errors", $_SESSION) && array_key_exists("end_date", $_SESSION['errors'])) ? 
                  "<p class='invalid-feedback'>{$_SESSION['errors']['end_date']}</p>" : '' ?>
                </div>

                <div class="col-md-12">
                  <label for="inputPassword5" class="form-label">Responsable</label>
                  <input type="text" class="form-control" name="responsible">
                  <?php echo (array_key_exists("errors", $_SESSION) && array_key_exists("responsible", $_SESSION['errors'])) ? 
                  "<p class='invalid-feedback'>{$_SESSION['errors']['responsible']}</p>" : '' ?>
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Registrar</button>
                  <a href="<?php echo "index.php?acta=".$acta_id ?>" type="button" class="btn btn btn-secondary">Cancelar</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>
<?php include('../partials/footer.php'); ?>