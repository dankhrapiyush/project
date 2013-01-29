<?php

require_once("initialize.php");

class Comment extends DatabaseObject {
	
	protected static $table_name = "comments";
	
	protected static $database_fields = array('id', 'news_id', 'content', 'user', 'date');
	
	public $id;
	public $news_id;
	public $content;
	public $user;
	public $date;

}

?>