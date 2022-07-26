<?php
    require_once '../autoload.php';

    class Acta {
        private $program_id;
        private $subject;
        private $date;
        private $description;
        private $responsible;
        private $DataBase;

        public function __construct() {
            $this->program_id = "";
            $this->subject = "";
            $this->date = "";
            $this->description = "";
            $this->responsible = "";
            $connection = new Conexion();
            $this->DataBase = $connection->get_conexion();
		}

        /* --------------------------------- SET ----------------------------------- */
        public function setProgram($program_id) { $this->program_id = $program_id; }
        public function setSubject($subject) { $this->subject = $subject; }
        public function setDate($date) { $this->date = $date; }
        public function setDescription($description) { $this->description = $description; }
        public function setResponsible($responsible) { $this->responsible = $responsible; }

        /* --------------------------------- GET ----------------------------------- */
        public function getProgram() { return $this->program_id; }
        public function getSubject() { return $this->subject; }
        public function getDate() { return $this->date; }
        public function getDescription() { return $this->description; }
        public function getResponsible() { return $this->responsible; }

        /* --------------------------------- METHODS FOR USER TABLE ----------------------------------- */
        public function getAll(){
            try {
		    	$sql = "SELECT * FROM actas";
		    	$query = $this->DataBase->prepare($sql);
		    	$query->execute();
		    	$data = $query->fetchAll(PDO::FETCH_CLASS);
		    	$response = ['status' => 1, 'actas' => $data];
	    	} catch (Exception $e) {
	    		$response = ['status' => 0, 'error' => $e];
	    	}
            return $response;
        }

        public function getByPk($pk){
	    	try {
	    		$sql = "SELECT * FROM actas WHERE id=?";
	    		$query = $this->DataBase->prepare($sql);
	    		$data = [$pk];
	    		$query->execute($data);
	    		$acta = $query->fetch(PDO::FETCH_ASSOC);
	    		$response = ['status' => 1, 'acta' => $acta];
	    	} catch (Exception $e) {
				$response = ['status' => 0, 'error' => $e];	    		
	    	}

	    	return $response;
	    }

        public function create() {
            try {
	    		$sql = "INSERT INTO actas (program_id, subject, date, description, responsible) VALUES (?,?,?,?,?)";
                $query = $this->DataBase->prepare($sql);
	    		$data = [
                    $this->getProgram(), $this->getSubject(), $this->getDate(), $this->getDescription(), 
                    $this->getResponsible()
                ];
	    		$query->execute($data);
	    		$response = ['status' => 1, 'message' => "Acta creada correctamente"];
	    	} catch (Exception $e) {
	    		$response = ['status' => 0, 'error' => $e];	   
	    	}
	    	return $response;
        }

        public function update($id) {
            try {
	    		$sql = "UPDATE actas SET program_id=?, subject=?, date=?, description=?, responsible=? WHERE id=?";
                $query = $this->DataBase->prepare($sql);

	    		$data = [
                    $this->getProgram(), $this->getSubject(), $this->getDate(), $this->getDescription(), 
                    $this->getResponsible(), $id
                ];

	    		$query->execute($data);
	    		$response = ['status' => 1, 'message' => "Acta actualizada correctamente"];
	    	} catch (Exception $e) {
	    		$response = ['status' => 0, 'error' => $e];	   
	    	}
	    	return $response;
        }
    }