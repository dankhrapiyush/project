<?php require_once("includes/initialize.php"); ?>

<?php 

if(isset($_POST['submit'])) {
	
} else {
	$name = "";
	$mail = "";
	$content = "";
}


?>

<?php require_once("includes/header.php"); ?>

<div class="cAlign">

	<div id="fullWidthSection">

		<h2>Contact Us</h2>

		<p align="justify">
		Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat voluptas nulla pariatur.
		<br>
		<br>
		Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
		<br>
		<br>
		Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat voluptas nulla pariatur.
		</p>
		
		<form action="contact_us.php" class="contact_form" method="post" name="contact" id="contact">
			<ul>
				<li>
					<h2>Send E-Mail</h2>
				</li>
				<li>		
	    			<label for=first_name>Name:</label>
	        		<input type="text" name="first_name" id="first_name" value="<?php echo $name; ?>" required/>
	        	</li>
	        	<li>
			    	<label for="mail">E-Mail:</label>
			        <input type="email" name="mail" id="mail" value="<?php echo $mail; ?>" required />
				</li>
				<li>
 					<label for="content">Content:</label>
					<textarea name="content" id="content" rows="10" cols="40" value="<?php echo $content; ?>" required></textarea>
 				</li>
				<li>
			        <button type="submit" name="submit" class="submit">Send</button>
				</li>
			</ul>
	    </form>

	</div>
	
	<div class="cBoth"></div>
		
</div>

<?php require_once("includes/footer.php"); ?>