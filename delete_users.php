<?php require_once("includes/initialize.php"); ?>

<?php 

if(!$session->is_logged_in()) {
	redirect_to("index.php");
}

if(empty($_GET['id'])) {
	$session->message("No user ID was provided.");
	redirect_to("list_of_users.php");
}

$user = User::find_by_id($_GET['id']);

if($user && User::delete()) {
	$session->message("The user was deleted.");
	redirect_to("list_of_users.php");
} else {
	$session->message("The user could not be deleted.");
	redirect_to("list_of_users.php");
}

?>

<?php if(isset($database)) { $database->close_connection(); } ?>