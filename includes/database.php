<?php

require_once("initialize.php");

class MySQLDatabase {
	
	private $connection;
	public $last_query;
	private $magic_quotes_active;
	private $real_escape_string_exists;
		
	function __construct() {	
		$this->open_connection();
		$this->magic_quotes_active = get_magic_quotes_gpc();
		$this->real_escape_string_exists = function_exists("mysql_real_escape_string");
	}
	
	public function open_connection() {
		$this->connection = mysql_connect("localhost", "root", "mysql");
		if(!$this->connection) {
			die("Database connection failed: " . mysql_error());
		} else {
			$db_select = mysql_select_db("project", $this->connection);
			if(!$db_select) {
				die("Database selection failed: " . mysql_error());
			}
		}
	}
	
	public function close_connection() {
		if (isset($this->conection)) {
			mysql_close($this->connection);
			unset($this->connection);
		}
	}

	// public function escape_value($value) {
	// 	if($this->real_escape_string_exists) {
	// 		if( $this->magic_quotes_active) {
	// 			$value = stripslashes($value);
	// 		}
	// 		$value = mysql_real_escape_string($value);
	// 	} else {
	// 		if(!$this->magic_quotes_active) {
	// 			$value = addslashes($value);
	// 		}
	// 	}
	// 	return $value;
	// }
	
}

$database = new MySQLDatabase();

?>