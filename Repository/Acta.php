<?php
    require_once '../autoload.php';
    
    class ActaRepository {
        private $acta_model;

        public function __construct() {
            $this->acta_model = new Acta();    
        }

        public function all () {
            $actas = $this->acta_model->getAll();
            return $actas;
        }

        public function create ($data) {
            $this->acta_model->setProgram($data['program']);
            $this->acta_model->setSubject($data['subject']);
            $this->acta_model->setDate($data['date']);
            $this->acta_model->setDescription($data['description']);
            $this->acta_model->setResponsible($data['responsible']);

            $acta = $this->acta_model->create();
            return $acta;
        }

        public function getById($acta_id) {
            return $this->acta_model->getByPk($acta_id);
        }
    }