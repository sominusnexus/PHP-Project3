<?php
    require_once('ITaskManager.php');
    
    class TaskManager implements ITaskManager {
        
        public $id;
        public $description;
        
        // Magic get/set methods
		public function __get($ivar) {
			return $this->$ivar;
		} 

		public function __set($ivar, $value) {
			$this->$ivar = $value;
		}
		
		// Serialize
		public function __toString() {
			$format = "<hr/>Id: %s<br/>Description: %s<br/><hr/>";

			return sprintf($format, $this->__get('id'), $this->__get('description'));
		}
		
		// Create Method
		public function create($description) {
		    
		    // Database Technology, Server, DB name, username, password
			$db = new PDO("mysql:host=localhost;dbname=project_3", "project_3", "project_3");

			// Insert a new record
			$sql = "INSERT INTO Task (`id`, `description`) VALUES (:id, :description)";

			// PDO Exception handling
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			try
            {
                $query = $db->prepare($sql);
                $query->bindParam(':id', $id);
                $query->bindParam(':description', $description);
                $query->execute();
            }
            catch(Exception $ex)
            {
                echo "{$ex->getMessage()}<br/>";
            }

            return $db->lastInsertId(); // returns the primary key  of this INSERT
		}
		
		// Read All Tasks
		public function readAll() {
			// Database Technology, Server, DB name, username, password
			$db = new PDO("mysql:host=localhost;dbname=project_3", "project_3", "project_3");

			// Read all records
			$sql = "SELECT * FROM Task";

			// PDO Exception handling
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			try
            {
                $query = $db->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_CLASS, 'TaskManager');
            }
            catch(Exception $ex)
            {
                echo "{$ex->getMessage()}<br/>";
            }

            foreach($results as $result) {
                echo $result . '<br>';
            }
            

		}
		
		// Deletes a record on given Id
		public function delete($id)
        {
            // Database tech & server & database name, user, password
            $db = new PDO("mysql:host=localhost;dbname=project_3", "project_3", "project_3");
            
            // Delete a record
            $sql = "DELETE FROM Task WHERE `id`=:id";
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            try
            {
                $query = $db->prepare($sql);
                $query->bindParam(':id', $id);
                $query->execute();
                $rowsAffected = $query->rowCount();
            }
            catch(Exception $ex)
            {
                echo "{$ex->getMessage()}<br/>";
            }
            
            return $rowsAffected; // Returns the number of rows deleted
        }
        
        // Update

		public function update($id, $description) {

			// update the record with provided id, name and email
			// Database tech & server & database name, user, password
            $db = new PDO("mysql:host=localhost;dbname=project_3", "project_3", "project_3");
            
            // Delete a record
            $sql = "UPDATE Task SET `description`=:description WHERE `id`=:id";
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            try
            {
                $query = $db->prepare($sql);
                $query->bindParam(':id', $id);
                $query->bindParam(':description', $description);
                $query->execute();
                $rowsAffected = $query->rowCount();
            }
            catch(Exception $ex)
            {
                echo "{$ex->getMessage()}<br/>";
            }
            
            return $rowsAffected; // Returns the number of rows updated
		}
		
		// Read Task by ID
		public function read($id) {
			// Database Technology, Server, DB name, username, password
			$db = new PDO("mysql:host=localhost;dbname=project_3", "project_3", "project_3");

			// Read all records
			$sql = "SELECT description FROM Task WHERE `id`=:id";

			// PDO Exception handling
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			try
            {
                $query = $db->prepare($sql);
                $query->bindParam(':id', $id);
                $query->execute();
                $results = $query->fetch(PDO::FETCH_ASSOC);
            }
            catch(Exception $ex)
            {
                echo "{$ex->getMessage()}<br/>";
            }
            
            if ($results == !null) {
            
            foreach ($results as $result) {
                echo $result;
            }
            
            } else {
                
                throw new Exception("Invalid ID Specified!");
            }
            
		}
    }
?>
