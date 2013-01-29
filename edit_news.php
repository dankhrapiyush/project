<?php require_once("includes/initialize.php"); ?>

<?php 

if(!$session->is_logged_in()) {
	redirect_to("index.php");
}

$id = get_id();

$sql = "SELECT 
			n.id, 
			n.caption, 
			CONCAT(u.first_name, ' ', u.last_name) AS 'full_name', 
			u.mail, n.date, 
			COUNT(c.news_id) AS 'number_of_comments' 
		FROM news n
		LEFT JOIN comments c ON c.news_id = n.id 
		LEFT JOIN users u ON u.username = n.username
		GROUP BY n.id
		ORDER BY n.id DESC
		";
$news = News::find_by_sql($sql);

if($id > 0) {
	$news = News::find_by_id($id);
}

if(!$news) {
	$session->message("News does not exist.");
	redirect_to("edit_news.php");
} elseif(isset($_GET['id']) && empty($_GET['id'])) {
	$session->message("News does not exist.");
	redirect_to("edit_news.php");
}

if(isset($_POST['submit'])) {
	// $caption = trim($_POST['caption']);
	// $content = $_POST['content'];
	// $array = array("id" => $id, "caption" => $caption, "content" => $content);

	if(News::update(post_array($_POST, $id))) {
		$session->message("News successfully edited");
		redirect_to("edit_news.php");
	} else {
		$session->message("There was an error that prevented the news from being edited.");
	}
}

?>

<?php require_once("includes/header.php"); ?>

<div class="cAlign">

	<div id="fullWidthSection">	
		
		<h4 align="center"><?php echo output_message($message); ?></h4>
		
		<h2 align="center">Edit News</h2>

		<?php if(!isset($_GET['id'])) { ?>
		<table>
			<tr>
				<td>Caption</td>
				<td>User</td>
				<td>Date</td>
				<td>Comments</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<?php foreach($news as $post) { ?>
			<tr>
				<td><a href="post.php?id=<?php echo $post['id']; ?>"><?php echo $post['caption']; ?></a></td>
				<td><a href="mailto:<?php echo $post['mail']; ?>"><?php echo $post['full_name'] ?></a></td>
				<td><?php echo datetime_to_text($post['date']); ?></td>
				<td><?php echo $post['number_of_comments']; ?></td>
				<td><a href="edit_news.php?id=<?php echo $post['id']; ?>">Edit</a></td>
				<td><a href="delete_news.php?id=<?php echo $post['id']; ?>" onClick="return confirm('Are you sure you want to delete this news?')">Delete</a></td>
			</tr>
			<?php } ?>
		</table>
		<br>		
		<h4><a href="admin.php">Back</a></h4>
		<?php } else { ?>
			<form action="edit_news.php?id=<?php echo $id; ?>" class="contact_form" method="post">
				<ul>
					<li>
						<h2><?php echo $news['caption']; ?></h2>
					</li>
					<li>
						<label for="caption">Caption:</label>
						<input type="text" name="caption" id="caption" value="<?php echo $news['caption']; ?>">
					</li>
					<li>
						<label for="content">Content:</label>
						<textarea name="content" id="content" rows="10" cols="40"><?php echo $news['content']; ?></textarea>
					</li>
					<li>
						<button type="submit" name="submit" class="submit">Edit News</button>
					</li>
				</ul>
				<h4><a href='javascript:history.back();'>Back</a></h4>
			</form>
		<?php } ?>
		
	</div>
	
	<div class="cBoth"></div>
	
</div>

<?php require_once("includes/footer.php"); ?>