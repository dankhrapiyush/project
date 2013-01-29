<?php require_once("includes/initialize.php"); ?>

<?php

if($session->is_logged_in()) {
	redirect_to("index.php");
}

if(isset($_POST['submit'])) {
	$username = trim($_POST['username']);
	$password = sha1(trim($_POST['password']));
	
	$found_user = User::authenticate($username, $password);
	
	if($username == $found_user['username'] && $password == $found_user['password'] ) {
		if($found_user['activated'] != 0) {
			$session->login($found_user);
			log_actions("Login", "{$found_user['username']} logged in.");
			$id = trim(str_replace('post', ' ', $_GET['redirect']));
			switch($_GET['redirect']) {
				case 'post' . $id:
					redirect_to("post.php?id={$id}#form");
					break;
				default:
					redirect_to("index.php");
			}
		} else {
			$session->message("Your account is not activated yet. Check your mail for activation link.");
		}
	} else {
		$session->message("Username or password were not correct. Please try again.");
	}
} else {
	$username = NULL;
	$password = NULL;
}

?>
	
<?php require_once("includes/header.php"); ?>

	<div class="cAlign">
	
		<div id="fullWidthSection">

			<h2 align="center"><?php echo output_message($message); ?></h2>


			<?php
			if(isset($_GET['logout']) && $_GET['logout'] == 1) {
				echo "<h2 align='center'>You have successfully logged out.</h2>";
			}
			?>
			
			<form action="login.php<?php if(isset($_GET['redirect'])) { echo "?" . $_SERVER['QUERY_STRING']; }?>" class="contact_form" method="POST" enctype="multipart/form-data" name="login" id="login">
				<ul>
					<li>
						<h2>Login</h2>
						<span class="required_fields">* Required fields</span>
					</li>
					<li>		
		    			<label for="username">Username:</label>
		        		<input type="text" name="username" id="username" value="<?php htmlentities($username); ?>" required/>
		        	</li>
		        	<li>
				    	<label for="password">Password:</label>
				        <input type="password" name="password" id="password" value="<?php htmlentities($password); ?>" required />
					</li>
					<li>
				        <button type="submit" name="submit" class="submit">Login</button>
					</li>
				</ul>
		    </form>
			    
			<h4><a href='javascript:history.back();'>Back</a></h4>

	</div>
	
	<div class="cBoth"></div>

</div>

<?php require_once("includes/footer.php"); ?>