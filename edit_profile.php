<?php require_once("includes/initialize.php"); ?>

<?php

if(!$session->is_logged_in()) {
	redirect_to("login.php");
}

if(isset($session->user_id)) {
	$id = $session->user_id;
	$user = User::find_by_id($session->user_id);
} else {
	$session->user_id = "";
}

if(isset($_POST['submit'])) {
	$password = sha1($_POST['password']);
	$repeated_password = sha1($_POST['repeated_password']);
	$array = array("id" => $id, "password" => $password);

	if($password == $repeated_password && (!empty($repeated_password))) {
		if(User::update($array)) {
			$session->message("Password successfully changed.");
			redirect_to("profile.php");
		}
	}
} else {
	$password = NULL;
}

?>

<?php require_once($uredivanje_profila = "includes/header.php"); ?>

<div class="cAlign">

	<div id="fullWidthSection">
	
		<h4><?php echo output_message($message); ?></h4>
	
		<form action="edit_profile.php" class="contact_form" method="post">
			<ul>
				<li>
					<h2>Edit profile</h2>
				</li>
	 			<li>
					<label for="name">Name:</label>
					<input type="text" name="name" id="name" readonly="readonly" value="<?php echo User::full_name_for_current_user(); ?>">
				</li>
				<li>
					<label for="password">New password:</label>
					<input type="password" name="password" required>
				</li>
				<li>
					<label for="repeated_password">Repeat new password:</label>
					<input type="password" name="repeated_password" required>
				</li>
				<li>
					<label for="mail">E-mail:</label>
					<input type="mail" name="mail" readonly="readonly" value="<?php echo $user['mail']; ?>">
				</li>			
				<li>
					<label for="date">Registration date:</label>
					<input type="text" name="date" readonly="readonly" value="<?php echo datetime_to_text($user['date']); ?>">
				</li>	
				<li>
					<button type="submit" name="submit" class="submit">Update profile</button>
				</li>
			</ul>
		</form>
		<h4><a href="edit_profile.php">Back</a></h4>
		
	</div>

	<div class="cBoth"></div>

</div>

<?php require_once("includes/footer.php"); ?>