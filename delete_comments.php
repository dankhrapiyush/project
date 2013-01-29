<?php require_once("includes/initialize.php"); ?>

<?php

if(!$session->is_logged_in()) {
	redirect_to("index.php");
}

if(empty($_GET['id'])) {
	$session->message("No comment ID was provided.");
	redirect_to("edit_comments.php");
}

$comment = Comment::find_by_id($_GET['id']);

if($comment && $comment->delete()) {
	$session->message("The comment was deleted.");
	redirect_to("edit_comments.php");
} else { 
	$session->message("The comment could not be deleted.");
	redirect_to("edit_comments.php.php");
}

?>

<?php if(isset($database)) { $database->close_connection(); } ?>