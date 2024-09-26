<?php
	class Database {
		private $host = 'localhost';
		private $db_name = 'registration';
		private $username = 'root';
		private $password = '';
		private $conn;

		// Establish the connection
		public function connect() {
			$this->conn = null;
			
			// Attempt to establish a connection
			try {
				$this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

				// Check connection
				if ($this->conn->connect_error) {
					throw new Exception('Connection failed: ' . $this->conn->connect_error);
				}
			} catch (Exception $e) {
				echo 'Error: ' . $e->getMessage();
			}

			return $this->conn;
		}
		public function select($table, $where = null) {
			$sql = 'SELECT * FROM '.$table;
			if($where != null)
				$sql .= ' WHERE '.$where;
			$result = $this->conn->query($sql);
			if($result) {
				return $result;

			} else {
				return false;
			}
			
		}
		public function insert($table, $values){
			$insert = 'INSERT INTO '.$table.'(amount,buyer,receipt_id,items,buyer_email,buyer_ip,note,city,phone,entry_at,entry_by)';
			for ($i = 0; $i < count($values); $i++) {
				$values[$i] = mysqli_real_escape_string($this->conn, $values[$i]);
				if (is_string($values[$i])) {
					$values[$i] = '"'.$values[$i].'"';
				}
			}
			$values = implode(',', $values);
			$insert .= ' VALUES ('.$values.')';
			$result = mysqli_query($this->conn, $insert);
			if ($result) {
				return true;
			} else {
				return false;
			}
		}
	}

?>
