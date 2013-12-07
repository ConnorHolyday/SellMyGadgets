<?php 

// Sell My Gadgets Database Script
// Before running script ensure a database has been created
// Please enter database details and then load this script via the browser

echo "<h1> Creating DataBase </h1>";

class DB {
	public $host = 'localhost';
	public	$user = 'user';
	public	$pass = '';
	public	$db = 'sellmygadgets';
	
	//construct the connection
	public function __construct() {		
		$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);	
		if ($this->conn->connect_errno){
			echo "Failed To Connect to MySQLi: " . $conn->connect_error;
		}		
	}
	
	//Run a mysqli query with the entered string
	public function doQuery($qry) {
		$res = $this->conn->query($qry);
		return $res;		
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

$SQL = new DB;
$i = 0;

//store querys in array with pointer as table name!!
$Querys = array (
	"Product_Cache"=>"CREATE TABLE Product_Cache (
  								ID int(11) NOT NULL AUTO_INCREMENT,
  								Cat_ID int(11) NOT NULL,
  								Name varchar(255) NOT NULL,
  								Price int(11) NOT NULL,
  								Active tinyint(1) NOT NULL,
  								PRIMARY KEY (ID)
							);",
	"Product_Cat"=>"CREATE TABLE Product_Cat (
  								ID int(11) NOT NULL AUTO_INCREMENT,
  								Category int(11) NOT NULL,
  								PRIMARY KEY (ID)
							);",
	"Product_Details"=>"CREATE TABLE Product_Details (
  								ID int(11) NOT NULL AUTO_INCREMENT,
  								Cache_ID int(11) NOT NULL,
  								Description longtext NOT NULL,
  								Condition_ID int(11) NOT NULL,
  								Delivery_Date date NOT NULL,
  								Delivery_Cost int(11) NOT NULL,
  								PRIMARY KEY (ID),
  								UNIQUE KEY ID (ID)
							);",
	"Product_Images"=>"CREATE TABLE Product_Images (
  								ID int(11) NOT NULL AUTO_INCREMENT,
  								Source varchar(255) NOT NULL,
  								Alt varchar(255) NOT NULL,
  								Product_ID int(11) NOT NULL,
  								PRIMARY KEY (ID)
							);",
	"Site_Content"=>"CREATE TABLE Site_Content (
  								ID int(11) NOT NULL AUTO_INCREMENT,
  								PRIMARY KEY (ID)
							);",
	"UserDetails"=>"CREATE TABLE UserDetails (
  								ID int(11) NOT NULL AUTO_INCREMENT,
  								User_ID int(11) NOT NULL,
  								Address_Line1 varchar(255) NOT NULL,
  								Address_Line2 varchar(255) NOT NULL,
  								Area_Code varchar(255) NOT NULL,
  								Phone int(11) NOT NULL,
  								Email varchar(255) NOT NULL,
  								DOB date NOT NULL,
  								Mobile int(11) NOT NULL,
  								User_Type int(10) NOT NULL,
  								Active tinyint(1) NOT NULL,
  								PRIMARY KEY (ID)
							);",
	"User_Products"=>"CREATE TABLE User_Products (
  								ID int(11) NOT NULL AUTO_INCREMENT,
  								User_ID int(11) NOT NULL,
  								Product_ID int(11) NOT NULL,
  								PRIMARY KEY (ID)
							);",
	"User_Type"=>"CREATE TABLE User_Type (
  								ID int(11) NOT NULL AUTO_INCREMENT,
  								User_Level varchar(255) NOT NULL,
  								PRIMARY KEY (ID)
							);",
	"Users"=>"CREATE TABLE Users (
  								ID int(255) NOT NULL AUTO_INCREMENT,
  								Name varchar(255) NOT NULL,
  								Password varchar(255) NOT NULL,
  								Active tinyint(1) NOT NULL,
  								PRIMARY KEY (ID)
							);"
);

//store correct table names
$tables = array(
"Product_Cache",
"Product_Cat",
"Product_Details",
"Product_Images",
"Site_Content",
"UserDetails",
"User_Products",
"User_Type",
"Users"
	 );

$result = $SQL->doQuery("SHOW TABLES IN `". $SQL->db ."`");

while ($row = $result->fetch_row()) {
    $rows[$i] = $row[0];
	$i++;
}

foreach ($tables as $table){	
//echo "Table " . $table . " Contains this many rows : " . $SQL->numRows("SELECT * FROM " . $table) . "<br>";

    if (in_array($table, $rows, TRUE)) {
		//table already exists do not create
		echo $table . " Table already exists <br>";
    } else {
		//table does not exist, create table
		$SQL->doQuery($Querys[$table]);
		echo $table . " Table Created<br>";
	}
	
}




