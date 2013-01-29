<?php require_once("includes/initialize.php"); ?>

<?php 

if(empty($_GET['id'])) {
	$session->message("No image ID was provided.");
	redirect_to("gallery.php");
}

$image = Image::find_by_id($_GET['id']);

if(!$image) {
	$session->message("The image could not be located.");
	redirect_to("gallery.php");
}

if(isset($_POST['submit'])) {
	$author = trim($_POST['author']);
	$body = trim($_POST['body']);
	
	$new_comment = Comment::make($image->id, $author, $body);
	
	if($new_comment && $new_comment->save()) {
		$session->message("Comment successfully submited");
		redirect_to("img.php?id={$image->id}");
	} else {
		$session->message("There was an error that prevented the comment from being saved.");
	}
} else {
	$author = "";
	$body = "";
}

$comments = $image->comments();

?>

<?php require_once("includes/header.php"); ?>

<div class="cAlign">

	<div id="fullWidthSection">
	
		<h4 align="center"><?php echo output_message($message); ?></h4>
	
		<h2><a href="gallery.php">&laquo; Back</a></h2>
	
		<div align="center">
		
			<img src="<?php echo $image->image_path(); ?>">
			<p><?php echo $image->caption; ?></p>
		
		</div>
		
		<hr>
		
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
			</div>
		<?php } ?>
		<?php if(empty($comments)) { echo "No Comments."; } ?>
		</div>
		
		<?php if($session->is_logged_in()) { ?>
		
			<form action="img.php?id=<?php echo $image->id; ?>" class="contact_form" method="post" name="contact" id="contact">
				<ul>
					<li>
						<h2>New Comment</h2>
					</li>
					<li>		
		    			<label for=author>Name:</label>
		        		<input type="text" name="author" id="author" value="<?php echo $author; ?>" required/>
		        	</li>
		        	<li>
				    	<label for="body">Comment</label>
						<textarea name="body" id="body" rows="7" cols="35" value="<?php echo $body; ?>" required></textarea>
				    </li>
					<li>
				        <button type="submit" name="submit" class="submit">Submit Comment</button>
					</li>
				</ul>
		    </form>
		    
		  <?php } ?>
	
	</div>

	<div class="cBoth"></div>

</div>

<?php require_once("includes/footer.php"); ?>