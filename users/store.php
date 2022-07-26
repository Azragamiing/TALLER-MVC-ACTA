<?php 
  require_once '../autoload.php';
  include('../partials/header.php');
  $primery_key = array_key_exists("id", $_GET) ? $_GET['id'] : 0;
  $user = $user_repository->getByPk($primery_key);
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
    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php echo ($primery_key == 0) ? 'Crear Usuario' : 'Actualizar Usuario'; ?></h5>
              <!-- Multi Columns Form -->
              <form class="row g-3" action="../Controllers/User.php" method="post">
                <input type="hidden" name="action" value="store">
                <input type="hidden" name="id" value="<?php echo $primery_key; ?>">
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Identificacion</label>
                  <input type="text" class="form-control" name="identification" value="<?php echo ($primery_key != 0) ? $user['user']['identification'] : ''; ?>">
                  <?php echo (array_key_exists("errors", $_SESSION) && array_key_exists("identification", $_SESSION['errors'])) ? 
                  "<p class='invalid-feedback'>{$_SESSION['errors']['identification']}</p>" : '' ?>
                </div>
                
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Nombres</label>
                  <input type="text" class="form-control" name="name" value="<?php echo ($primery_key != 0) ? $user['user']['name'] : ''; ?>">
                  <?php echo (array_key_exists("errors", $_SESSION) && array_key_exists("name", $_SESSION['errors'])) ? 
                  "<p class='invalid-feedback'>{$_SESSION['errors']['name']}</p>" : '' ?>
                </div>
                
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Apellidos</label>
                  <input type="text" class="form-control" name="last_name" value="<?php echo ($primery_key != 0) ? $user['user']['last_name'] : ''; ?>">
                  <?php echo (array_key_exists("errors", $_SESSION) && array_key_exists("last_name", $_SESSION['errors'])) ? 
                  "<p class='invalid-feedback'>{$_SESSION['errors']['last_name']}</p>" : '' ?>
                </div>
                
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Correo Electronico</label>
                  <input type="email" class="form-control" name="email" value="<?php echo ($primery_key != 0) ? $user['user']['email'] : ''; ?>">
                  <?php echo (array_key_exists("errors", $_SESSION) && array_key_exists("email", $_SESSION['errors'])) ? 
                  "<p class='invalid-feedback'>{$_SESSION['errors']['email']}</p>" : '' ?>
                </div>

                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Tipo Usuario</label>
                  <select class="form-select" name="type">
                    <option value="" selected>Seleccione una opcion</option>
                    <option value="1">Administrador</option>
                    <option value="2">Profesor</option>
                  </select>

                  <?php echo (array_key_exists("errors", $_SESSION) && array_key_exists("type", $_SESSION['errors'])) ? 
                  "<p class='invalid-feedback'>{$_SESSION['errors']['type']}</p>" : '' ?>
                </div>
                
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Usuario</label>
                  <input type="text" class="form-control" name="username" value="<?php echo ($primery_key != 0) ? $user['user']['username'] : ''; ?>">
                  <?php echo (array_key_exists("errors", $_SESSION) && array_key_exists("username", $_SESSION['errors'])) ? 
                  "<p class='invalid-feedback'>{$_SESSION['errors']['username']}</p>" : '' ?>
                </div>

                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Contraseña</label>
                  <input type="password" class="form-control" name="password">
                  <?php echo (array_key_exists("errors", $_SESSION) && array_key_exists("password", $_SESSION['errors'])) ? 
                  "<p class='invalid-feedback'>{$_SESSION['errors']['password']}</p>" : '' ?>
                </div>
                
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Dependencia/Programa</label>
                  <select class="form-select" name="dep_prog">
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

                  <?php echo (array_key_exists("errors", $_SESSION) && array_key_exists("dep_prog", $_SESSION['errors'])) ? 
                  "<p class='invalid-feedback'>{$_SESSION['errors']['dep_prog']}</p>" : '' ?>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary"><?php echo ($primery_key == 0) ? 'Registrar' : 'Actualizar'?></button>
                  <a href="index.php" type="button" class="btn btn btn-secondary">Cancelar</a>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>
        </div>
      </div>
    </section>

  </main>
<?php include('../partials/footer.php'); ?>