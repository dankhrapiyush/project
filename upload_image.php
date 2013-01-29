<?php require_once("includes/initialize.php"); ?>

<?php 
if(!$session->is_logged_in()) {
	redirect_to("login.php");
}

$max_file_size = 1048576;

if(isset($_POST['submit'])) {
	$image = new Image();
	$image->caption = $_POST['caption'];
	$image->attach_file($_FILES['image']);
	if($image->save_file()) {
		$session->message("Image uploaded successfully.");
		redirect_to("list_images.php");
	} else {
		$message = join("<br>", $image->errors);
	}
}
?> 

<?php require_once("includes/header.php"); ?>  

<div class="cAlign">

	<div id="fullWidthSection">	
	
		<h4><?php echo output_message($message); ?></h4>
		
		<form action="upload_image.php" class="contact_form" method="post" name="upload_images" enctype="multipart/form-data">
			<ul>
				<li>
					<h2>Upload images</h2>
					<span class="required_fields">* Required field</span>
				</li>
				<li>
					<label for="image">Choose an image:</label>
					<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>">
					<input type="file" name="image" required>
				</li>
				<li>
					<label for="caption">Caption:</label>
					<input type="text" name="caption" value="" required>
				</li>
				<li>
					<button type="submit" name="submit" class="submit">Upload image!</button>
				</li>
			</ul>
		</form>

		<h4><a href='javascript:history.back();'>Back</a></h4>
		
	</div>
	
	<div class="cBoth"></div>

</div>

<?php require_once("includes/footer.php"); ?>