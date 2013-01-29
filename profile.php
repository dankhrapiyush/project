<?php require_once("includes/initialize.php"); ?>

<?php

if(!$session->is_logged_in()) {
	redirect_to("login.php");
}

if(isset($session->user_id)) {
	$user = User::find_by_id($session->user_id);
} else {
	$session->user_id = "";
}

$news = News::find_by_sql("SELECT id, caption FROM news WHERE username = '{$user['username']}'");
// $comments = Comment::find_by_sql("SELECT * FROM comments WHERE username = '{$user['username']}'");

$sql = "SELECT 
			(SELECT COUNT(*) FROM news n WHERE n.username = u.username) AS 'number_of_news', 
			(SELECT COUNT(*) FROM comments c WHERE c.username = u.username) AS 'number_of_comments'
		FROM users u
		WHERE u.username = '{$user['username']}'
		ORDER BY u.id ASC
		";
$count = User::find_by_sql($sql);

?>

<?php require_once("includes/header.php"); ?>

<div class="cAlign">

	<div id="fullWidthSection" align="center">	

		<h4><?php echo output_message($message); ?></h4>
	
		<h2>Profile</h2>
	
		<h3><?php echo User::full_name_for_current_user(); ?></h3>
		<h4><a href="edit_profile.php">Edit profile</a></h4>
		<?php if($count[0]['number_of_comments'] > 0) { ?>
			<p>Number of comments posted: <?php echo $count[0]['number_of_comments']; ?></p>
		<?php } else { ?>
			<p>User did not post any comments.</p>
		<?php } ?>
	
		<ul>
		<?php
		if(empty($news)) {
			echo "User did not submit any news.";
		} else {
			echo "<p>Number of news posted: {$count[0]['number_of_news']}</p>";
			echo "<p>News posted:</p>";
			foreach($news as $post) {
				echo "<li><h5>";
				echo "<a href='post.php?id={$post['id']}'>{$post['caption']}";
				echo "</a></h5></li>";
			}
		}
		?>
		</ul>
		
		<br>
		<h3><a href='javascript:history.back();'>Back</a></h3>

	</div>
	
	<div class="cBoth"></div>
		
</div>

<?php require_once("includes/footer.php"); ?>