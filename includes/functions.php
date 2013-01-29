<?php

	function redirect_to($location = NULL) {
		if($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}

	function output_message($message = "") {
		if(!empty($message)) {
			return "<p>{$message}</p>";
		} else {
			return "";
		}
	}

	function __autoload($class_name) {
		$class_name = strtolower($class_name);
		$path = "includes/{$class_name}.php";
		if(file_exists($path)) {
			require_once($path);
		} else {
			die("The file {$class_name}.php could not be found.");
		}
	}
	
	function log_actions($action, $message = "") {
		$file = "logs/log.txt";
		$time =  date("d.m.Y. H:i", time());
		$content = file_get_contents($file);
		if($handle = fopen($file, "w")) {
			rewind($handle);
			fwrite($handle, "{$time} | {$action}: {$message}\r\n\r\n{$content}");
			fclose($handle);
		} else {
			echo "Could not open file for writing.";
		}
	}

	function post_array($array, $id) {
		unset($array['submit']);
		$new_array = array("id" => $id);
		$new_array = $new_array + $array;
		return $new_array;
	}

	function get_id() { 
		if(isset($_GET['id'])) {
			return $id = $_GET['id'];
		} else {
			return $id = "";
		}
	}

	function bla() {
		if(!$users) {
			$session->message("User does not exist.");
			redirect_to("edit_users.php");
		} elseif(isset($_GET['id']) && empty($_GET['id'])) {
			$session->message("User does not exist.");
			redirect_to("edit_users.php");
		}
	}
	
	function datetime_to_text($datetime = "") {
		$unixdatetime = strtotime($datetime);
		return strftime("%B %d, %Y at %H:%M", $unixdatetime);
	}
	
	function date_for_news($datetime = "") {
		$unixdatetime = strtotime($datetime);
		return strftime("%B %d, %Y", $unixdatetime);
	}
	
	function currentPageURL() {
		$pageURL = 'http';
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}

	function current_url() {
		$file_name = $_SERVER['SCRIPT_NAME']; 
		$file_name = str_replace('/project/',' ', $file_name);
		$file_name = str_replace('.php', ' ', $file_name);
		$file_name = str_replace('_',' ', $file_name);
		return ucwords(trim($file_name));
	}

// --------------------- convertovi i pizdarije ------------------------------------

	function strip($start, $end, $total){
		$total = stristr($total,$start);
		$f2 = stristr($total,$end);
		return substr($total,strlen($start),-strlen($f2));
	}
	
	function strip2($start,$end,$total){
		$total = stristr($total,$start);
		$f2 = stristr($total,$end);
		return substr($total,0,(strlen($total)-(strlen($f2) - strlen($end))));
	}
	

	// Converta youtube link u embeded link
	function convert_embed($content) {
		$small_string = strip("http://www.youtube.com/watch?v="," ",$content);
		$full_string = strip2("http://www.youtube.com/watch?v=", " ", $content);
		$url = "<iframe width=\"560\" height=\"315\" src=\"http://www.youtube.com/embed/{$small_string}\" frameborder=\"0\" allowfullscreen></iframe>";
		$full_content = str_replace($full_string, $url, $content);
		return trim($full_content);
	}
	
	function convert_to_url($content) {
		$full_string = strip2("http://", " ", $content);
		$url = "<a href='{$full_string}' target='_blank'>{$full_string}</a>";
		$full_content = str_replace($full_string, $url, $content);
		return trim($full_content);
	}
	

	// Converta youtube link u embeded link
	function convert($content) {
		$search = "youtube.com";
		$pos = strpos($content, $search);
		if($pos === false) {
			$full_string = strip2("http://", " ", $content);
			$url = "<a href='{$full_string}' target='_blank'>{$full_string}</a>";
			$full_content = str_replace($full_string, $url, $content);
			return trim($full_content);
		} else {
			$small_string = strip("http://www.youtube.com/watch?v="," ",$content);
			$full_string = strip2("http://www.youtube.com/watch?v=", " ", $content);
			$url = "<iframe width='560' height='315' src='http://www.youtube.com/embed/{$small_string}' frameborder='0' allowfullscreen></iframe>";
			$full_content = str_replace($full_string, $url, $content);
			return trim($full_content);
		}
	}

// --------------------------------------------------------------------------------
	
?>