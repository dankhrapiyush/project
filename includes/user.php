<?php

require_once("initialize.php");

class User extends DatabaseObject {
	
	protected static $table_name = "users";
	
	protected static $database_fields = array('id', 'username', 'password', 'first_name', 'last_name', 'mail', 'privileges', 'date', 'random', 'activated');

	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;
	public $mail;
	public $privileges;
	public $date;
	public $random;
	public $activated;
	
	public static function authenticate($username, $password) {
		$sql = "SELECT *  
				FROM users 
				WHERE username = '{$username}' AND password = '{$password}' 
				LIMIT 1
				";
		$result = self::find_by_sql($sql);
		return array_shift($result);
	}

	// full name u sql-u
	public static function full_name_for_current_user() {
		$sql = "SELECT CONCAT(first_name, ' ',last_name) AS 'full_name'
		 		FROM users 
		 		WHERE id = " . $_SESSION['user_id'];
		$sql .= " LIMIT 1";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		return array_shift($row);
	}

}

?>