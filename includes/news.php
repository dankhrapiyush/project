<?php

require_once("initialize.php");

class News extends DatabaseObject {
	
	protected static $table_name = "news";
	
	protected static $database_fields = array('id', 'caption', 'content', 'user', 'date');
	
	public $id;
	public $caption;
	public $content;
	public $user;
	public $date;
	
	public static function news_caption($id = "") {
		if(isset($_GET['id'])) {
			$id = $_GET['id'];
			$sql = "SELECT caption FROM news WHERE id = '{$id}'";
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			return array_shift($row);
		}
	}
	
}

?>