<?php // database conection script;
class DB {	
	
	//construct the connection
	public function __construct() {		
		$this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);	
		if ($this->conn->connect_errno){
			echo "Failed To Connect to MySQLi: " . $conn->connect_error;
		}
	}
	
	//Run a mysqli query with the entered string
	public function doQuery($qry) {
		$res = $this->conn->query($qry);
		return $res;		
	}
	
	//used to insert multiple querys does not out put hence no return statement
	public function doQueryX(){
		$querys = func_get_args();
		
		foreach($qurys as $qry) {
			$this->conn->quey($qry);		
		}	
	}
	
	//count rows in query
	public function numRows($qry) {
		$rows = $this->doQuery($qry);
		$row_cnt = $rows->num_rows;
		return $row_cnt;
	}
	
	//close connection to SQLi
	public function __destruct() {
		$this->conn->close();
	}
	
}

?>

