<?php require_once("includes/initialize.php"); ?>

<?php 

if(!$session->is_logged_in()) {
	redirect_to("index.php");
}

$id = get_id();

$sql = "SELECT 
			c.id, 
			c.content, 
			CONCAT(u.first_name, ' ', u.last_name) AS 'full_name', 
			u.mail, 
			c.date
		FROM comments c
		LEFT JOIN users u ON u.username = c.username
		ORDER BY c.id DESC
		";

$comments = Comment::find_by_sql($sql);

if($id > 0) {
	$comments = Comment::find_by_id($id);
}

if(!$comments) {
	$session->message("Comment does not exist.");
	redirect_to("edit_comments.php");
} elseif(isset($_GET['id']) && empty($_GET['id'])) {
	$session->message("Comment does not exist.");
	redirect_to("edit_comments.php");
}

if(isset($_POST['submit'])) {
	// $content = $_POST['content'];
	// $array = array("id" => $id, "content" => $content);

	if(Comment::update(post_array($_POST, $id))) {
		$session->message("Comment successfully edited");
		redirect_to("edit_comments.php");
	} else {
		$session->message("There was an error that prevented the comment from being edited.");
	}
}

?>

<?php require_once("includes/header.php"); ?>

<div class="cAlign">

	<div id="fullWidthSection">	
		
		<h4 align="center"><?php echo output_message($message); ?></h4>
		
		<h2 align="center">Edit Comments</h2>
		
		<?php if(!isset($_GET['id'])) { ?>
		<table>
			<tr>
				<td>Content</td>
				<td>User</td>
				<td>Date</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<?php foreach($comments as $comment) { ?>
			<tr>
				<td><?php echo $comment['content']; ?></td>
				<td><a href="mailto:<?php echo $comment['mail']; ?>"><?php echo $comment['full_name']; ?></a></td>
				<td><?php echo datetime_to_text($comment['date']); ?></td>
				<td><a href="edit_comments.php?id=<?php echo $comment['id']; ?>">Edit</a></td>
				<td><a href="delete_comments.php?id=<?php echo $comment['id']; ?>" onClick="return confirm('Are you sure you want to delete this comment?')">Delete</a></td>
			</tr>
			<?php } ?>
		</table>
		<br>
		<h4><a href="admin.php">Back</a></h4>
		<?php } else { ?>
			<form action="edit_comments.php?id=<?php echo $id; ?>" class="contact_form" method="post">
				<ul>
					<li>
						<h2>Comment</h2>
					</li>
					<li>
						<label for="content">Content:</label>
						<textarea name="content" id="content" rows="10" cols="40"><?php echo $comments['content']; ?></textarea>
					</li>
					<li>
						<button type="submit" name="submit" class="submit">Edit Comment</button>
					</li>
				</ul>
				<h4><a href='javascript:history.back();'>Back</a></h4>
			</form>
		<?php } ?>
		
	</div>
	
	<div class="cBoth"></div>
	
</div>

<?php require_once("includes/footer.php"); ?>