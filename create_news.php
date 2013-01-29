<?php require_once("includes/initialize.php"); ?>

<?php

if(!$session->is_logged_in()) {
	redirect_to("login.php");
}

if(isset($_POST['submit'])) {
	$caption = trim($_POST['caption']);
	$content = $_POST['content'];
	$user = User::find_by_id($session->user_id);
	$array = array("caption" => $caption, "content" => $content, "username" => $user['username']);

	if(News::create($array)) {
		Image::create_image($_FILES['image']);
		$session->message("News successfully submited");
		redirect_to("index.php");
	} else {
		$session->message("There was an error that prevented the news from being created.");
	}
} else {
	$caption = NULL;
	$content = NULL;
}
        
?>

<?php require_once("includes/header.php"); ?>  

<div class="cAlign">

	<div id="fullWidthSection">	
		
		<h4><?php echo output_message($message); ?></h4>
		
		<form action="create_news.php" class="contact_form" method="post" name="create_news" enctype="multipart/form-data">
			<ul>
				<li>
					<h2>Create News</h2>
					<span class="required_fields">* Required Fields</span>
 				</li>
  				<li>
					<label for="caption">Caption:</label>
        			<input type="text" name="caption" id="caption" value="<?php echo $caption; ?>" required/>
				</li>
				<li>
					<label for="image">Choose an image:</label>
					<input type="file" name="image">
				</li>
				<li>
 					<label for="content">Content:</label>
					<textarea name="content" id="content" rows="10" cols="40" value="<?php echo $content; ?>" required></textarea>
 				</li>
 				<li>
					<button type="submit" name="submit" class="submit">Create News</button>
				</li>
			</ul>
		</form>
		<h4><a href="javascript:history.back();">Back</a></h4>

	</div>
	
	<div class="cBoth"></div>

</div>

<?php require_once("includes/footer.php"); ?>