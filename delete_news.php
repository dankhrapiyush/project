<?php require_once("includes/initialize.php"); ?>

<?php 

if(!$session->is_logged_in()) {
	redirect_to("index.php");
}

if(empty($_GET['id'])) {
	$session->message("No news ID was provided.");
	redirect_to("edit_news.php");
}

$news = News::find_by_id($_GET['id']);

if($news && News::delete()) {
	Image::delete_image($news['id']);
	$session->message("The news were deleted.");
	redirect_to("edit_news.php");
} else {
	$session->message("The news could not be deleted.");
	redirect_to("edit_news.php");
}

?>

<?php if(isset($database)) { $database->close_connection(); } ?>