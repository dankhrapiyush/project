<?php require_once("includes/initialize.php"); ?>

<?php 
if(!$session->is_logged_in()) {
	redirect_to("index.php");
}
?>  

<?php require_once("includes/header.php"); ?>

<div class="cAlign">

	<div id="fullWidthSection" align="center">	

		<h2>Administrator panel</h2>

		<ul>
			<li><h3><a href="edit_news.php">Edit news</a></h3></li>
			<li><h3><a href="edit_comments.php">Edit comments</a></h3></li>
			<li><h3><a href="edit_images.php">Edit images</a></h3></li>
			<li><h3><a href="edit_users.php">Edit users</a></h3></li>
			<li><h3><a href="logs.php">Logs</a></h3></li>
			<li><h3><a href="logout.php">Logout</a></h3></li>
		</ul>

	</div>
	
	<div class="cBoth"></div>
		
</div>

<?php require_once("includes/footer.php"); ?>