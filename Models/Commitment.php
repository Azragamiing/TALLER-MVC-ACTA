<?php
    require_once '../autoload.php';
    
    class Commitment {
        private $acta_id;
        private $description;
        private $start_date;
        private $end_date;
        private $responsible;
        private $DataBase;

        public function __construct() {
            $this->acta_id = "";
            $this->description = "";
            $this->start_date = "";
            $this->end_date = "";
            $this->responsible = "";

            $connection = new Conexion();
            $this->DataBase = $connection->get_conexion();
		}

        /* --------------------------------- SET ----------------------------------- */
        public function setActa($acta_id) { $this->acta_id = $acta_id; }
        public function setDescription($description) { $this->description = $description; }
        public function setStartDate($start_date) { $this->start_date = $start_date; }
        public function setEndDate($end_date) { $this->end_date = $end_date; }        
        public function setResponsible($responsible) { $this->responsible = $responsible; }

        /* --------------------------------- GET ----------------------------------- */
        public function getActa() { return $this->acta_id; }
        public function getDescription() { return $this->description; }
        public function getStartDate() { return $this->start_date; }
        public function getEndDate() { return $this->end_date; }
        public function getResponsible() { return $this->responsible; }

        /* --------------------------------- METHODS FOR USER TABLE ----------------------------------- */
        public function getAll(){
            try {
		    	$sql = "SELECT * FROM commitments";
		    	$query = $this->DataBase->prepare($sql);
		    	$query->execute();
		    	$data = $query->fetchAll(PDO::FETCH_CLASS);
		    	$response = ['status' => 1, 'commitments' => $data];
	    	} catch (Exception $e) {
	    		$response = ['status' => 0, 'error' => $e];
	    	}
            return $response;
        }

        public function getByPk($pk){
	    	try {
	    		$sql = "SELECT * FROM commitments WHERE id=?";
	    		$query = $this->DataBase->prepare($sql);
	    		$data = [$pk];
	    		$query->execute($data);
	    		$commitment = $query->fetch(PDO::FETCH_ASSOC);
	    		$response = ['status' => 1, 'commitment' => $commitment];
	    	} catch (Exception $e) {
				$response = ['status' => 0, 'error' => $e];	    		
	    	}

	    	return $response;
	    }

        public function create() {
            try {
	    		$sql = "INSERT INTO commitments (acta_id, description, start_date, end_date, responsible) VALUES (?,?,?,?,?)";
                $query = $this->DataBase->prepare($sql);
	    		$data = [
                    $this->getActa(), $this->getDescription(), $this->getStartDate(), $this->getEndDate(), 
                    $this->getResponsible()
                ];
	    		$query->execute($data);
	    		$response = ['status' => 1, 'message' => "Compromiso creado correctamente"];
	    	} catch (Exception $e) {
	    		$response = ['status' => 0, 'error' => $e];	   
	    	}
	    	return $response;
        }

        public function update($id) {
            try {
	    		$sql = "UPDATE commitments SET acta_id=?, description=?, start_date=?, end_date=?, responsible=? WHERE id=?";
                $query = $this->DataBase->prepare($sql);

	    		$data = [
                    $this->getActa(), $this->getDescription(), $this->getStartDate(), $this->getEndDate(), 
                    $this->getResponsible(), $id
                ];

	    		$query->execute($data);
	    		$response = ['status' => 1, 'message' => "Commpromiso actualizado correctamente"];
	    	} catch (Exception $e) {
	    		$response = ['status' => 0, 'error' => $e];	   
	    	}
	    	return $response;
        }

        public function getByActaId($acta_id){
	    	try {
	    		$sql = "SELECT * FROM commitments WHERE acta_id=?";
	    		$query = $this->DataBase->prepare($sql);
	    		$data = [$acta_id];
	    		$query->execute($data);
	    		$commitments = $query->fetchAll(PDO::FETCH_CLASS);
	    		$response = ['status' => 1, 'commitments' => $commitments];
	    	} catch (Exception $e) {
				$response = ['status' => 0, 'error' => $e];	    		
	    	}

	    	return $response;
	    }
    }