<?php
    class Database{
        private $server = "localhost";
        private $user   = "root";
        private $pwd    = "";
        private $dbname = "gamming_project";
        private $mysqli = "";
        private $getMysqli;
        private $result = array();
        private $conn = false;

        public function __construct(){
            if(!$this->conn){
                $this->mysqli = new mysqli($this->server, $this->user, $this->pwd, $this->dbname);
                $this->conn = true;

                if($this->mysqli->connect_error){
                    array_push($this->result, $this->mysqli->connect_error);
                    return false;
                }
                
            }else{
                return true;
            }
        }
       
        public function insert($table, $params = array()){
            // Ensure result is initialized as an array
            if (!isset($this->result) || !is_array($this->result)) {
                $this->result = array();
            }
        
            if ($this->table_exist($table)) {
                // Sanitize inputs and prepare for insertion
                $table_columns = implode(', ', array_keys($params));
                $table_values = array_map([$this->mysqli, 'real_escape_string'], array_values($params));
                $table_values = implode("', '", $table_values);
        
                $sql = "INSERT INTO $table ($table_columns) VALUES ('$table_values')";
        
                if ($this->mysqli->query($sql)) {
                    array_push($this->result, $this->mysqli->insert_id);
                    return true;
                } else {
                    array_push($this->result, $this->mysqli->error);
                    return false;
                }
            } else {
                return false;
            }
        }

        // update data 
        public function update($table, $params = array(), $where = null){
            if ($this->table_exist($table)) {  // Corrected from $tabel to $table
                $args = array();
                foreach ($params as $key => $value) {
                    $args[] = "$key = '$value'";
                }
                $sql = "UPDATE $table SET " . implode(', ', $args);
                if ($where != null) {
                    $sql .= " WHERE $where";
                }
                if ($this->mysqli->query($sql)) {
                    array_push($this->result, $this->mysqli->affected_rows);
                    return true;
                } else {
                    array_push($this->result, $this->mysqli->error);
                    return false;  // Return false on error
                }
            } else {
                return false;  // Return false if table does not exist
            }
        }

        // delete data
        public function delete($table, $where = null){
            if($this->table_exist($table)){

                $sql = "DELETE FROM $table";
                if($where != null){
                    $sql .= " WHERE $where";
                }
                if($this->mysqli->query($sql)){
                    array_push($this->result, $this->mysqli->affected_rows);
                    return true;
                }else{
                    array_push($this->result, $this->mysqli->error);
                }
            }else{
                return false;
            }
        }

        // fetch data
        public function select($table, $rows="*", $where=null, $order=null, $limit=null){
            if($this->table_exist($table)){
                $sql = "SELECT $rows FROM $table ";
                if($where != null){
                    $sql .= "WHERE $where ";
                }
                if($order != null){
                    $sql .= "ORDER BY $order ";
                }
                if($limit != null){
                    $sql .= "LIMIT 0, $limit";
                }
                $query = $this->mysqli->query($sql);
                if($query){
                    $this->result = $query->fetch_all(MYSQLI_ASSOC);
                    return true;
                }else{
                    array_push($this->result, $this->mysqli->error);
                    return false;
                }
            }else{
                return false;
            }
        }

        // fetch all data
        public function sql($sql){
            $query = $this->mysqli->query($sql);
            if($query){
                $this->result = $query->fetch_all(MYSQLI_ASSOC);
                return true;
            }else{
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        }

        // check table 
        private function table_exist($table){
            $sql = "SHOW TABLES FROM $this->dbname LIKE '$table' ";
            $tableinDB = $this->mysqli->query($sql);
            if($tableinDB){
                if($tableinDB->num_rows == 1){
                    return true;
                }else{
                    arrar_push($this->result, $table."does not exist in this database.");
                    return false;
                }
            }
        }

        // get Rows 
        public function getRows($table, $where=null){
            $sql = "SELECT * FROM $table ";

            if(!empty($where)){
                $sql .= "WHERE $where";
            }

            $query = $this->mysqli->query($sql);
            if($query){
                $this->result = $query->num_rows;
                return $this->result;
            }else{
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        }

        // escape strings
        public function escapeString($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $this->mysqli->real_escape_string($data);
        }

        // get Result
        public function getResult(){
            $val = $this->result;
            $this->result = array();
            return $val;
        }
        
        public function getMysqli() {
            return $this->mysqli;
        }
        // close result 
        public function __destruct(){
            if($this->conn){
                if($this->mysqli->close()){
                    $this->conn = false;
                    return true;
                }
            }else{
                return false;
            }
        }
    }

?>