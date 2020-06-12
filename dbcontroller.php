<?php
class DBController {
	private $host = 'bqejlphwelhmqmqkgixg-mysql.services.clever-cloud.com';
	private $user = 'uf1l6xcn5mhhk7sm';
	private $password = 'S3YIznA9DyhJzOcS6JIm';
	private $database = 'bqejlphwelhmqmqkgixg';
	private $conn;
	
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
?>