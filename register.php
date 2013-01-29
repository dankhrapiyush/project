<?php require_once("includes/initialize.php"); ?>

<?php

if($session->is_logged_in()) {
	redirect_to("index.php");
}

if(isset($_POST['submit'])) {
	$username = trim($_POST['username']);
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	$coded_password = sha1($password);
	$first_name = trim($_POST['first_name']);
	$last_name = trim($_POST['last_name']);
	$mail = trim($_POST['mail']);
	$array = array("username" => $username, "password" => $coded_password, "first_name" => $first_name, "last_name" => $last_name, "mail" => $mail);

	if($password == $confirm_password) {
		User::create($array);
		$session->message("You have successfully registred.");
		redirect_to("index.php");
	} else {
		$session->message("Password and Confirm password do not match.");
	}
} else {
	$username = NULL;
	$password = NULL;
	$confirm_password = NULL;
	$first_name = NULL;
	$last_name = NULL;
	$mail = NULL;
}

?>

<?php require_once("includes/header.php"); ?>

<div class="cAlign">

	<div id="fullWidthSection">

		<h4 align="center"><?php echo output_message($message); ?></h4>
		
		<form action="register.php" class="contact_form" method="post" name="register" id="register">
			<ul>
				<li>
					<h2>Registration</h2>
					<span class="required_fields">* Required fields</span>
				</li>
				<li>
					<label for="username">Username:</label> 
					<input type="text" name="username" id="username" value="<?php echo $username; ?>" required>
				</li>
				<li>
					<label for="password">Password:</label>
					<input type="password" name="password" id="password" value="<?php echo $password; ?>" required>
				</li>
				<li>
					<label for="confirm_password">Confirm Password:</label>
					<input type="password" name="confirm_password" id="confirm_password" required>
				</li>
				<li>
					<label for="first_name">First Name:</label>
					<input type="text" name="first_name" id="first_name" value="<?php echo $first_name; ?>" required>
				</li>
				<li>
					<label for="last_name">Last Name:</label>
					<input type="text" name="last_name" id="last_name" value="<?php echo $last_name; ?>" required>
				</li>
				<li>
					<label for="e-mail">E-mail:</label>
					<input type="email" name="mail" id="mail" value="<?php echo $mail; ?>" required>
				</li>
				<li>
					<button type="submit" name="submit" class="submit">Complete Registration</button>
				</li>
			</ul>
	    </form>

		<h4><a href='javascript:history.back();'>Back</a></h4>

	</div>
	
	<div class="cBoth"></div>

</div>

<?php require_once("includes/footer.php"); ?>