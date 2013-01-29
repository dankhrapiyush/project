<?php

require_once("initialize.php");

class DatabaseObject {

	public static function find_by_sql($sql = "") {
		$result = mysql_query($sql);
		$rows = array();
		while ($row = mysql_fetch_assoc($result)) {
			$rows[] = $row;
		};
		return $rows; 
	}

	public static function find_all() {
		return self::find_by_sql("SELECT * FROM " . static::$table_name);
	}
	
	public static function find_by_id($id = 0) {
		$row = static::find_by_sql("SELECT * FROM " . static::$table_name . " WHERE id = {$id} LIMIT 1");
		return array_shift($row);
	}
	
	public static function count($column = "", $value = "") {
		if($column != "" && $value != "") {
			$sql = "SELECT COUNT(*) FROM " . static::$table_name . " WHERE {$column} = '{$value}'";
		} else {
			$sql = "SELECT COUNT(*) FROM " . static::$table_name;
		}
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		return array_shift($row);
	}

	public static function create($array) {
		$date = strftime("%Y-%m-%d %H:%M:%S", time());
		$sql = "INSERT INTO " . static::$table_name . " (";
		$sql .= join(", ", array_keys($array));
		$sql .= ", date) VALUES ('";
		$sql .= join("', '", array_values($array));
		$sql .= "', '{$date}')";
		$result = mysql_query($sql);
		return true;
	}

	public static function update($array) {
		foreach($array as $key => $value) {
			$attributes[] = "{$key} = '{$value}'";
		}
		array_shift($attributes);
		$sql = "UPDATE " . static::$table_name . " SET ";
		$sql .= join(", ", $attributes);
		$sql .= " WHERE id = '{$array['id']}'";
		$result = mysql_query($sql);
		return true;
	}

	public static function delete() {
		$sql = "DELETE FROM " . static::$table_name;
		$sql .= " WHERE id = " . $_GET['id'];
		$sql .= " LIMIT 1";
		$result = mysql_query($sql);
		return (mysql_affected_rows() == 1) ? true : false;
	}

	public static function next_available_id() {
		$query = mysql_query("SHOW TABLE STATUS WHERE name='" . static::$table_name . "'");
		$result = mysql_fetch_array($query);		
		$id = $result['Auto_increment'];
		return $id;
	}
	
}

?>