<?php 

// Sell My Gadgets Database Script
// Before running script ensure a database has been created
// Please enter database details and then load this script via the browser

//currently does not support error reporting if the script did not work it is very likely an error in the sql statement
//also make sure the array identifiers match the table names in the tables array

echo "<h1> Creating DataBase </h1>";

class DB {
	public $host = 'localhost';
	public	$user = 'user';
	public	$pass = '';
	public	$db = 'smg';
	
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
	"users"=>"CREATE TABLE users (
								id bigint NOT NULL AUTO_INCREMENT,
								username varchar(50) NOT NULL,
								password varchar(50) NOT NULL,
								user_type int(10) NOT NULL,
								active boolean NOT NULL,
								PRIMARY KEY (id) 
							);",
	"user_type"=>"CREATE TABLE user_type (
								id int(10) NOT NULL AUTO_INCREMENT,
								type varchar(50) NOT NULL,
								PRIMARY KEY (id)
							);",
	"user_products"=>"CREATE TABLE user_products (
								user_id bigint NOT NULL,
								product_id bigint NOT NULL,
								PRIMARY KEY (user_id)
							);",
	"user_details"=>"CREATE TABLE user_details (
								user_id bigint NOT NULL,
								first_name varchar(50) NOT NULL,
								surname varchar(50) NOT NULL,
								adress_1 varchar(255) NOT NULL,
								adress_2 varchar(255),
								town_city varchar(50)NOT NULL,
								county varchar(50) NOT NULL,
								postcode varchar(10) NOT NULL,
								contact_number int(12) NOT NULL,
								contact_email varchar(100) NOT NULL,
								PRIMARY KEY (user_id)
							);",
	"site_content"=>"CREATE TABLE site_content(
								id bigint NOT NULL AUTO_INCREMENT,
								page varchar(20) NOT NULL,
								content text NOT NULL,
								active boolean NOT NULL,
								PRIMARY KEY (id)
							);",
	"products"=>"CREATE TABLE products(
								id bigint NOT NULL AUTO_INCREMENT,
								category int(3) NOT NULL,
								name varchar(255) NOT NULL,
								price decimal(5,2) NOT NULL,
								status int(3) NOT NULL,
								PRIMARY KEY (id)
							);",
	"products_status"=>"CREATE TABLE product_status(
								id int(3) NOT NULL AUTO_INCREMENT,
								status varchar(50) NOT NULL,
								PRIMARY KEY (id)
							);",	
	"product_details"=>"CREATE TABLE product_details(
								product_id bigint NOT NULL,
								primary_image bigint NOT NULL,
								description text NOT NULL,
								condition_id int(3) NOT NULL,
								delivery_id bigint NOT NULL,
								cration_date datetime NOT NULL,
								create_by bigint NOT NULL,
								modified_date datetime NOT NULL,
								modified_by bigint NOT NULL,
								PRIMARY KEY (product_id)
							);",
	"product_media"=>"CREATE TABLE product_media(
								id bigint NOT NULL AUTO_INCREMENT,
								product_id bigint NOT NULL,
								title varchar(50),
								PRIMARY KEY(id)
							);",
	"product_categories"=>"CREATE TABLE product_categories(
								id int(3) NOT NULL AUTO_INCREMENT,
								category_name varchar(20) NOT NULL,
								PRIMARY KEY (id)
							);",
	"product_condition"=>"CREATE TABLE product_condition(
								id int(3) NOT NULL AUTO_INCREMENT,
								condition_name varchar(20) NOT NULL,
								PRIMARY KEY (id)
							);",
	"product_delivery"=>"CREATE TABLE product_delivery(
								id bigint NOT NULL AUTO_INCREMENT,
								delivery_status varchar(20) NOT NULL,
								delivery_date datetime NOT NULL,
								delivery_cost decimal(4,2) NOT NULL,
								PRIMARY KEY (id)
							);"
	);
	
//store correct table names
$tables = array(
"users",
"user_type",
"user_products",
"user_details",
"site_content",
"products",
"products_status",
"product_details",
"product_media",
"product_categories",
"product_condition",
"product_delivery"
	 );

//fetch all tables in the database to check if they already exsist if they dont exsist create them.
$result = $SQL->doQuery("SHOW TABLES IN `". $SQL->db ."`");

while ($row = $result->fetch_row()) {
    $rows[$i] = $row[0];
	$i++;
}

foreach ($tables as $table){	
    if (in_array($table, $rows, TRUE)) {
		//table already exists do not create
		echo $table . " Table already exists <br>";
    } else {
		//table does not exist, create table
		$SQL->doQuery($Querys[$table]);
		echo $table . " Table Created<br>";
	}
}