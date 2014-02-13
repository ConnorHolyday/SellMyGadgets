<?php // database conection script;
	class Database {

		//construct the connection
		public function __construct() {
			$this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if ($this->conn->connect_errno){
				echo "Failed To Connect to MySQLi: " . $conn->connect_error;
			}
		}

		//Run a mysqli query with the entered string
		public function execute_query($qry) {
			return $this->conn->query($qry);
		}

		// Execute query and return assoc array
		public function execute_assoc_query($qry) {
			$result = $this->conn->query($qry);
			return $result->fetch_assoc();
		}

		// Return ID of newly inserted item
		public function insert_return_id($qry) {
			$this->conn->query($qry);
			return $this->conn->insert_id;
		}

		//used to insert multiple querys does not out put hence no return statement
		public function execute_multi_query(){
			$querys = func_get_args();

			foreach($queries as $qry) {
				$this->conn->quey($qry);
			}
		}

		//count rows in query
		public function count_rows($qry) {
			$rows = $this->doQuery($qry);
			return $rows->num_rows;
		}

		//close connection to SQLi
		public function __destruct() {
			$this->conn->close();
		}

		public function prepare_select($fields, $table, $where) {
			return 'SELECT ' . $fields . ' FROM ' . $table . ' WHERE ' . $where . ';';
		}

		public function prepare_insert($table, $fields, $values) {
			return 'INSERT INTO ' . $table . ' (' . $fields . ') VALUES (' . $values . ');';
		}

		public function prepare_delete($table, $where) {
			return 'DELETE FROM ' . $table . ' WHERE ' . $where . ';';
		}

		public function prepare_update($table, $set, $where) {
			return 'UPDATE ' . $table . ' SET ' . $set . ' WHERE ' . $where . ';';
		}

	}