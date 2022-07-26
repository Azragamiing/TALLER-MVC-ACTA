<?php
    require_once '../autoload.php';

    $action = $_POST['action'];

    switch ($action) {
        case 'store':
            store($_POST, $redirect, $sessions, $acta_repository, $validation);
            break;
        case 'update_password':
            //updatePassword($_POST, $user_repository, $validation, $sessions, $redirect);
            break;
        default:
            echo 'Action not available';
            break;
    }

    function store($request, $redirect, $sessions, $acta_repository, $validation) {
        $alises = ['subject' => 'asunto', 'date' => 'fecha', 'responsible' => 'responsable',
            'description' => 'descripcion', 'program' => 'programa'
        ];

        $validations = $validation->validateData($request, [
            'subject'        => 'required', 
            'date'           => 'required', 
            'responsible'    => 'required',
            'description'    => 'required', 
            'program'        => 'required|numeric'
        ], $alises);

        if ($validations['status'] == 0) {
            
            $acta = $acta_repository->create($request);

            if ($acta['status'] == 1) {
                $sessions->destroy('errors');
                $sessions->setSession('success', $acta);
                $redirect->redirectTo('actas');
            }
        } else {
            $sessions->setSession('errors', $validations['messages']);
            $redirect->redirectTo('actas/store.php');
        }
    }

    function sendEmail($data, $email) {
        $content['to'] = $data['email'];
        $content['nameTo'] = $data['name'] ." ". $data['last_name'];
        $content['html'] = true;
        $content['subject'] = "Bienvenido a nuestro administrador";
        $url = " http://localhost/admin/activar.php?key={$data['hash_activation']}";
        $content['body'] = "
            <body>
                <h1>Bievenido {$content['nameTo']}</h1>
                <p>Te damos la bienvenido a nuestro administrador, para activar tu cuenta el paso final es ir a dar clic <a href='{$url}'>AQUI</a> para activar tu cuenta</p>
                <p>Gracias!!!</p>
            </body>
        ";
        $email->sendEmail($content);
    }