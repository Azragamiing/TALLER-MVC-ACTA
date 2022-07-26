<?php
  session_start();
  if (!array_key_exists('islogin', $_SESSION)) {
    header("Location:  {$_SESSION['URL_APP']}");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
  <!-- Favicons -->
  <link href="<?php echo URL_PATH."/assets/img/favicon.png" ?>"rel="icon">
  <link href="<?php echo URL_PATH."/assets/img/apple-touch-icon.png" ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo URL_PATH."/assets/vendor/bootstrap/css/bootstrap.min.css" ?>" rel="stylesheet">
  <link href="<?php echo URL_PATH."/assets/vendor/bootstrap-icons/bootstrap-icons.css" ?>" rel="stylesheet">
  <link href="<?php echo URL_PATH."/assets/vendor/boxicons/css/boxicons.min.css" ?>" rel="stylesheet">
  <link href="<?php echo URL_PATH."/assets/vendor/quill/quill.snow.css" ?>" rel="stylesheet">
  <link href="<?php echo URL_PATH."/assets/vendor/quill/quill.bubble.css" ?>" rel="stylesheet">
  <link href="<?php echo URL_PATH."/assets/vendor/remixicon/remixicon.css" ?>" rel="stylesheet">
  <link href="<?php echo URL_PATH."/assets/vendor/simple-datatables/style.css" ?>" rel="stylesheet">
  <link href="<?php echo URL_PATH."/assets/css/style.css" ?>" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="../dashboard.php" class="logo d-flex align-items-center">
        <img src="<?php echo URL_PATH."/assets/img/logo.png" ?>" alt="">
        <span class="d-none d-lg-block">Administrador</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/800px-User_icon_2.svg.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['user_logged']['name']; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['user_logged']['name']; ?></h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Mi Perfil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Configuraciones</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Ayuda?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <form action="../Controllers/Auth.php" method="post" id="logout_form">
                <input type="hidden" name="action" value="logout">
                  <a class="dropdown-item d-flex align-items-center" href="#"
                    onclick="document.getElementById('logout_form').submit()">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Salir</span>
                  </a>
                
              </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item collapsed">
        <a class="nav-link" href="../dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      
      <li class="nav-item">
        <a class="nav-link collapsed" href="../users">
          <i class="bi bi-person"></i>
          <span>Usuarios</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="../actas">
          <i class="bi bi-book-half"></i>
          <span>Actas</span>
        </a>
      </li>
      <!-- End User Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->