<?php

require_once("initialize.php");

class Image extends DatabaseObject {
	
	protected static $table_name = "images";
	
	protected static $database_fields = array('id', 'news_id', 'filename', 'type', 'size', 'caption', 'user', 'date');
	
	public $id;
	public $news_id;
	public $filename;
	public $type;
	public $size;
	public $caption;
	public $user;
	public $date;
	
	private $temp_path;
	protected $upload_dir = "images";
	public static $errors = array();
	
	protected $upload_errors = array(
			UPLOAD_ERR_OK 			=> "No errors.",
			UPLOAD_ERR_INI_SIZE		=> "Larger than upload_max_filesize.",
			UPLOAD_ERR_FORM_SIZE 	=> "Larger than form MAX_FILE_SIZE",
			UPLOAD_ERR_PARTIAL		=> "Partial upload.",
			UPLOAD_ERR_NO_FILE		=> "No file.",
			UPLOAD_ERR_NO_TMP_DIR	=> "No temporary directory.",
			UPLOAD_ERR_CANT_WRITE	=> "Can't write to disk.",
			UPLOAD_ERR_EXTENSION	=> "Wrong extension of file."
	);

	public static function create_image($file) {
		global $session;
		$upload_dir = "images";
		$tmp_path = $file['tmp_name'];
		$filename = $file['name'];
		$target_path = $upload_dir . "/" . $filename;
		$type = $file['type'];
		$size = $file['size'];
		$user = User::find_by_id($session->user_id);
		$query = mysql_query("SHOW TABLE STATUS WHERE name='news'");
		$result = mysql_fetch_array($query);		
		$news_id = $result['Auto_increment'] - 1;
		$username = $user['username'];
		$date = strftime("%Y-%m-%d %H:%M:%S", time());

		$image = array("news_id" => $news_id, "filename" => $filename, "type" => $type, "size" => $size, "username" => $username, "date" => $date);

		// if(empty($filename) || empty($temp_path)) {
		// 	self::$errors[] = "The file location was not available.";
		// 	return false;
		// }
		if(file_exists($target_path)) {
			self::$errors[] = "The file {$filename} already exists.";
			return false;
		}
		if(move_uploaded_file($tmp_path, $target_path)) {
			$sql = "INSERT INTO " . self::$table_name;
			$sql .= " (news_id, filename, type, size, username, date) ";
			$sql .= "VALUES ('{$news_id}', '{$filename}', '{$type}', '{$size}', '{$username}', '{$date}')";
			$result = mysql_query($sql);
			return true;
		}
	}

	public static function delete_image($id = 0) {
		$row = array_shift(static::find_by_sql("SELECT * FROM " . static::$table_name . " WHERE news_id = {$id} LIMIT 1"));
		$image_path = "images/" . $row['filename'];
		if(unlink($image_path)) {
			$sql = "DELETE FROM " . static::$table_name;
			$sql .= " WHERE news_id = " . $id;
			$sql .= " LIMIT 1";
			$result = mysql_query($sql);
			return (mysql_affected_rows() == 1) ? true : false;
		} else {
			return false;
		}
	}

	public function image_size() {
		if($this->size < 1024) {
			return $this->size . " bytes";
		} elseif($this->size < 1048576){
			return round($this->size / 1024) . " KB";
		} else {
			return round($this->size / 1048576, 1) . " MB";
		}
	}

}

?>