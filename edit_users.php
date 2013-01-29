<?php require_once("includes/initialize.php"); ?>

<?php

if(!$session->is_logged_in()) {
	redirect_to("index.php");
}

$id = get_id();

$sql = "SELECT 
			u.id, 
			CONCAT(u.first_name, ' ', u.last_name) AS 'full_name', 
			u.mail, 
			u.privileges, 
			u.date, 
			u.activated, 
			(SELECT COUNT(*) FROM news n WHERE n.username = u.username) AS 'total_news', 
			(SELECT COUNT(*) FROM comments c WHERE c.username = u.username) AS 'total_comments'
		FROM users u
		ORDER BY u.id ASC";

$users = User::find_by_sql($sql);

if($id > 0) {
	$users = User::find_by_id($id);
}

if(!$users) {
	$session->message("User does not exist.");
	redirect_to("edit_users.php");
} elseif(isset($_GET['id']) && empty($_GET['id'])) {
	$session->message("User does not exist.");
	redirect_to("edit_users.php");
}

if(isset($_POST['submit'])) {
	if(User::update(post_array($_POST, $id))) {
		$session->message("User successfully edited");
		redirect_to("edit_users.php");
	} else {
		$session->message("There was an error that prevented the user from being edited.");
	}
}
?>

<?php require_once("includes/header.php"); ?>

<div class="cAlign">

	<div id="fullWidthSection">
		
		<h4 align="center"><?php echo output_message($message); ?></h4>

		<h2 align="center">Edit Users</h2>

		<?php if(!isset($_GET['id'])) { ?>
		<table id="users">
			<tr>
				<td>Name</td>
				<td>E-mail</td>
				<td>Privileges</td>
				<td>Registred on</td>
				<td>Activated</td>
				<td>News posted</td>
				<td>Comments posted</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<?php			
			foreach($users as $user) {		
				echo "<tr>";
				echo "<td>{$user['full_name']}</td>";
				echo "<td><a href='mailto:" . $user['mail'] . "'>{$user['mail']}</a></td>";
				echo "<td>{$user['privileges']}</td>";
				echo "<td>" . date_for_news($user['date']) . "</td>";
				if($user['activated'] == 1) {
					echo "<td>Yes</td>";
				} else {
					echo "<td>No</td>";
				}
				echo "<td>{$user['total_news']}</td>";	
				echo "<td>{$user['total_comments']}</td>";
				echo "<td><a href='edit_users.php?id={$user['id']}'>Edit</a></td>";
				echo "<td><a href='delete_users.php?id={$user['id']}'>Delete</a></td>";
				echo "</tr>";
			}
			?>
		</table>
		<br>
		<h4><a href="admin.php">Back</a></h4>
		<?php } else { ?>
			<form action="edit_users.php?id=<?php echo $id; ?>" class="contact_form" method="post">
				<ul>
					<li>
						<h2><?php echo $users['first_name']; ?></h2>
					</li>
					<li>
						<label for="first_name">First name:</label>
						<input type="text" name="first_name" id="first_name" value="<?php echo $users['first_name']; ?>">
					</li>
					<li>
						<label for="last_name">Last name:</label>
						<input type="text" name="last_name" id="last_name" value="<?php echo $users['last_name']; ?>">
					</li>
					<li>
						<label for="mail">Mail:</label>
						<input type="text" name="mail" id="mail" value="<?php echo $users['mail']; ?>">
					</li>
					<li>
						<label for="privileges">Privileges:</label>
						<select name="privileges">
						<?php 
						switch($users['privileges']) {
							case "admin":
								echo "<option value='admin' selected>Administrator</option>";
								echo "<option value='moderator'>Moderator</option>";
								echo "<option value='user'>User</option>";
								break;
							case "moderator":
								echo "<option value='admin'>Administrator</option>";
								echo "<option value='moderator' selected>Moderator</option>";
								echo "<option value='user'>User</option>";
								break;
							case "user";
								echo "<option value='admin'>Administrator</option>";
								echo "<option value='moderator'>Moderator</option>";
								echo "<option value='user' selected>User</option>";
								break;
						}
						?>
						</select>
					</li>
					<li>
						<label for="activated">Activated:</label>
						<select name="activated">
						<?php 
						switch($users['activated']) {
							case "1":
								echo "<option value='1' selected>Yes</option>";
								echo "<option value='0'>No</option>";
								break;
							case "0":
								echo "<option value='1'>Yes</option>";
								echo "<option value='0' selected>No</option>";
								break;
						}
						?>
						</select>
					</li>
					<li>
						<label for="date">Date of registration:</label>
						<input type="text" name="date" id="date" value="<?php echo $users['date']; ?>">
					</li>
					<li>
						<button type="submit" name="submit" class="submit">Edit User</button>
					</li>
				</ul>
				<h4><a href='javascript:history.back();'>Back</a></h4>
			</form>
		<?php } ?>
	</div>
	
	<div class="cBoth"></div>
		
</div>


<?php require_once("includes/footer.php"); ?>