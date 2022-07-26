<?php
    session_start();
    define("URL_PATH", $_SESSION['URL_APP']);
    require('vendor/autoload.php');
    
    require_once 'Utils/validation.php';
    require_once 'Utils/session.php';
    require_once 'Utils/redirect.php';
    require_once 'Utils/email.php';
    require_once 'Libs/Conexion.php';
    require_once 'Models/User.php';
    require_once 'Models/Acta.php';
    require_once 'Models/Commitment.php';
    require_once 'Repository/User.php';
    require_once 'Repository/Acta.php';
    require_once 'Repository/Commitment.php';

    $sessions = new Sesssion();
    $redirect = new Redirect();
    $email = new Email();

    $validation = new Validation();
    $user_repository = new UserRepository();
    $acta_repository = new ActaRepository();
    $commitment_repository = new CommitmentRepository();