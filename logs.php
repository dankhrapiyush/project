<?php require_once("includes/initialize.php"); ?>

<?php

if(!$session->is_logged_in()) {
	redirect_to("index.php");
}

$file = "logs/log.txt";
$message = "";

if(isset($_GET['delete']) && $_GET['delete'] == "true") {
	if(file_exists($file)) {
		unlink($file);
		$message = "Log file has been deleted.";
		redirect_to("logs.php");
	}
}

?>

<?php require_once("includes/header.php"); ?>

<div class="cAlign">

	<div id="fullWidthSection">
	
		<h2 align="center">Logs</h2>
		
		<div align="center">
		
			<p>	<?php if($message != "") { echo $message . "<br><br>"; } ?>
			
			<?php 
				if(file_exists($file) && is_readable($file)) {
					$content = file_get_contents($file);
					echo nl2br($content);
				} else {
					echo "Log file does not exist.";
				}
			?>
			</p>
			<br>
			<h4><a href="logs.php?delete=true">Delete Logs</a></h4>
			
		</div>
		
		<h4><a href="index.php">Back</a></h4>
		
	</div>
	
	<div class="cBoth"></div>
		
</div>

<?php require_once("includes/footer.php"); ?>