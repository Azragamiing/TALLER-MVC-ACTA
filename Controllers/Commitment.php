<?php
    require_once '../autoload.php';

    $action = $_POST['action'];

    switch ($action) {
        case 'store':
            store($_POST, $redirect, $sessions, $commitment_repository, $validation);
            break;
        case 'update_password':
            //updatePassword($_POST, $user_repository, $validation, $sessions, $redirect);
            break;
        default:
            echo 'Action not available';
            break;
    }

    function store($request, $redirect, $sessions, $commitment_repository, $validation) {
        $alises = ['start_date' => 'fecha inicial', 'end_date' => 'fecha final', 'responsible' => 'responsable',
            'description' => 'descripcion'
        ];

        $validations = $validation->validateData($request, [
            'start_date'     => 'required', 
            'end_date'       => 'required', 
            'responsible'    => 'required',
            'description'    => 'required'
        ], $alises);

        if ($validations['status'] == 0) {
            
            $commitment = $commitment_repository->create($request);

            if ($commitment['status'] == 1) {
                $sessions->destroy('errors');
                $sessions->setSession('success', $commitment);
                $redirect->redirectTo('commitments/index.php?acta='.$request['acta']);
            }
        } else {
            $sessions->setSession('errors', $validations['messages']);
            $redirect->redirectTo('commitments/store.php?acta='.$request['acta']);
        }
    }