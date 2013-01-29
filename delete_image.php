<?php require_once("includes/initialize.php"); ?>

<?php

if(!$session->is_logged_in()) {
	redirect_to("index.php");
}

if(empty($_GET['id'])) {
	$session->message("No image ID was provided.");
	redirect_to("index.php");
}

$image = Image::find_by_id($_GET['id']);

if($image && $image->destroy()) {
	$session->message("The image {$image->filename} was deleted.");
	redirect_to("list_images.php");
} else {
	$session->message("The image could not be deleted.");
	redirect_to("index.php");
}

?>

<?php if(isset($database)) { $database->close_connection(); } ?>