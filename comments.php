<?php require_once("includes/initialize.php"); ?>
<?php 

if(!$session->is_logged_in()) {
	redirect_to("index.php");
}

if(empty($_GET['id'])) {
	$session->message("No image ID was provided.");
	redirect_to("gallery.php");
}

$image = Image::find_by_id($_GET['id']);

if(!$image) {
	$session->message("The image could not be located.");
	redirect_to("gallery.php");
}

$comments = $image->comments();

?>

<?php require_once("includes/header.php"); ?>

<div class="cAlign">

	<div id="fullWidthSection">
	
		<h4 align="center"><?php echo output_message($message); ?></h4>
		
		<h2>Comments for: <?php echo $image->caption; ?></h2>
		
		<div>
		<?php foreach($comments as $comment) { ?>
			<div style="margin-bottom:2em">
				<div>
					<?php echo htmlentities($comment->user) . " wrote:"; ?>
				</div>
				<div>
					<?php echo strip_tags($comment->content, '<strong><em><p>'); ?>
				</div>
				<div>
					<?php echo datetime_to_text($comment->date); ?>
				</div>
				<div>
					<a href="delete_comment.php?id=<?php echo $comment->id; ?>">Delete</a>
				</div>
			</div>
		<?php } ?>
		<?php if(empty($comments)) { echo "No Comments."; } ?>
		</div>

	</div>
		
	<div class="cBoth"></div>

</div>

<?php require_once("includes/footer.php"); ?>