<?php
    require_once '../autoload.php';
    
    class CommitmentRepository {
        private $commitment_model;

        public function __construct() {
            $this->commitment_model = new Commitment();
        }

        public function all ($acta_id) {
            $commitments = $this->commitment_model->getByActaId($acta_id);
            return $commitments;
        }

        public function create ($data) {
            $this->commitment_model->setActa($data['acta']);
            $this->commitment_model->setDescription($data['description']);
            $this->commitment_model->setStartDate($data['start_date']);
            $this->commitment_model->setEndDate($data['end_date']);
            $this->commitment_model->setResponsible($data['responsible']);

            $commitment = $this->commitment_model->create();
            return $commitment;
        }

        public function getById($commitment_id) {
            return $this->commitment_model->getByPk($commitment_id);
        }
    }