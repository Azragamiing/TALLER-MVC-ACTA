<?php 
  require_once '../autoload.php';
  include('../partials/header.php');
  $primery_key = array_key_exists("id", $_GET) ? $_GET['id'] : 0;
  $user = $user_repository->getByPk($primery_key);
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
              <h5 class="card-title"><?php echo ($primery_key == 0) ? 'Crear Acta' : 'Actualizar Acta'; ?></h5>
              <!-- Multi Columns Form -->
              <form class="row g-3" action="../Controllers/Acta.php" method="post">
                <input type="hidden" name="action" value="store">

                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Dependencia/Programa</label>
                  <select class="form-select" name="program">
                    <option value="" selected>Seleccione una opcion</option>
                    <option value="1">Administración y Administración Pública</option>
                    <option value="2">Ciencias Biológicas</option>
                    <option value="3">Ciencias Políticas</option>
                    <option value="4">Ciencias Sociales y Humanidades</option>
                    <option value="5">Deportes y Educación Física</option>
                    <option value="6">Derecho y Leyes</option>
                    <option value="7">Educación y Pedagogía</option>
                    <option value="8">Física y Química</option>
                    <option value="9">Historia y Geografía</option>
                    <option value="10">Idiomas</option>
                    <option value="11">Informática e Información</option>
                    <option value="12">Ingeniería y Tecnología</option>
                    <option value="13">Lengua y Literatura</option>
                    <option value="14">Matemática, Economía y Finanzas</option>
                    <option value="15">Salud y Medicina</option>
                    <option value="16">Veterinaria</option>
                  </select>

                  <?php echo (array_key_exists("errors", $_SESSION) && array_key_exists("program", $_SESSION['errors'])) ? 
                  "<p class='invalid-feedback'>{$_SESSION['errors']['program']}</p>" : '' ?>
                </div>

                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Asunto</label>
                  <input type="text" class="form-control" name="subject">
                  <?php echo (array_key_exists("errors", $_SESSION) && array_key_exists("subject", $_SESSION['errors'])) ? 
                  "<p class='invalid-feedback'>{$_SESSION['errors']['subject']}</p>" : '' ?>
                </div>
                
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Fecha</label>
                  <input type="date" class="form-control" name="date">
                  <?php echo (array_key_exists("errors", $_SESSION) && array_key_exists("date", $_SESSION['errors'])) ? 
                  "<p class='invalid-feedback'>{$_SESSION['errors']['date']}</p>" : '' ?>
                </div>

                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Responsable</label>
                  <input type="text" class="form-control" name="responsible">
                  <?php echo (array_key_exists("errors", $_SESSION) && array_key_exists("responsible", $_SESSION['errors'])) ? 
                  "<p class='invalid-feedback'>{$_SESSION['errors']['responsible']}</p>" : '' ?>
                </div>
                
                <div class="col-md-12">
                  <label for="inputEmail5" class="form-label">Descripcion</label>
                  <textarea name="description" class="form-control" rows="3"></textarea>
                  <?php echo (array_key_exists("errors", $_SESSION) && array_key_exists("description", $_SESSION['errors'])) ? 
                  "<p class='invalid-feedback'>{$_SESSION['errors']['description']}</p>" : '' ?>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary"><?php echo ($primery_key == 0) ? 'Registrar' : 'Actualizar'?></button>
                  <a href="index.php" type="button" class="btn btn btn-secondary">Cancelar</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>
<?php include('../partials/footer.php'); ?>