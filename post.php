<?php require_once("includes/initialize.php"); ?>

<?php 

$id = get_id();

$news = News::find_by_id($id);

if(!$news) {
	$session->message("News does not exist.");
	redirect_to("index.php");
} elseif(isset($_GET['id']) && empty($_GET['id'])) {
	$session->message("News does not exist.");
	redirect_to("index.php");
}

$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$per_page = 3;
$total_count = Comment::count("news_id", $id);

$pagination = new Pagination($page, $per_page, $total_count);

$sql_news = "SELECT 
				n.id, 
				n.caption, 
				n.content, 
				n.date, 
				CONCAT(u.first_name, ' ', u.last_name) AS 'full_name', 
				u.mail, 
				i.filename 
		    FROM news n  
		    JOIN users u ON u.username = n.username  
		    LEFT JOIN images i ON i.news_id = n.id 
		    WHERE n.id = {$id} 
		   ";
$sql_comments = "SELECT 
					CONCAT(u.first_name, ' ', u.last_name) AS 'full_name', 
					u.mail, 
					c.content, 
					c.date 
				 FROM comments c 
				 JOIN users u ON u.username = c.username
				 WHERE c.news_id = {$id} 
				 ORDER BY c.id DESC
				 ";
$sql_comments .= " LIMIT " . $per_page;
$sql_comments .= " OFFSET " . $pagination->offset();

$news = News::find_by_sql($sql_news);
$comments = Comment::find_by_sql($sql_comments);

if(isset($_GET['page']) &&  ($_GET['page'] > $pagination->total_pages())) {
	redirect_to("post.php?id={$id}");
}

if(isset($_POST['submit'])) {
	$content = $_POST['content'];
	$user = User::find_by_id($session->user_id);
	$array = array("news_id" => $id, "content" => $content, "username" => $user['username']);

	if(Comment::create($array)) {
		$session->message("Comment successfully submited");
		redirect_to("post.php?id={$id}");
	} else {
		$session->message("There was an error that prevented the comment from being submited.");
	}
} else {
	$content = NULL;
}

?>

<?php require_once("includes/header.php"); ?>

<div class="cAlign">

	<div id="mainContentSection">
	
		<div id="article">
	
			<h4 align="center"><?php echo output_message($message); ?></h4>

			<?php
			foreach(News::find_by_sql($sql_news) as $news) {
				echo "<p class='articleMeta'>";
				echo "Published by:<br>";		
				echo "<a href='mailto:" . $news['mail'] . "'>" . $news['full_name'] . "</a><br>";
				echo "Date: <br>";
				echo date_for_news($news['date']) . "<br>";
				echo "<div class='articleBody'>";
				echo "<h2>{$news['caption']}</h2>";
				if($news['filename'] == NULL) {
					echo "<p><a href='images/default.jpg' rel='lightbox[galerija]'><img src='images/default.jpg' width='400'></a></p>";
				} else {
					echo "<p><a href='images/{$news['filename']}' rel='lightbox[galerija]' title='{$news['caption']}'><img src='images/{$news['filename']}' title='{$news['caption']}' alt='{$news['caption']}' width='400'></a></p>";
				}		
				echo "<p align='justify'>" . nl2br($news['content']) . "</p>";
			}
			?>

			<a name="fb_share" type=button title="Test" share_url="<?php echo currentPageURL()?>">Share</a>
			<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo currentPageURL(); ?>" data-text="<?php echo $news['caption'] . " " . currentPageURL(); ?>" data-count="none" data-via="BishopAsh">Tweet</a>
			RSS

			</div>

		</div>	
			
		<?php
		if($session->is_logged_in()) {
			echo "<h4 id='commentsHeader'><a href='#form'>Leave a comment</a></p></h4>";
		} else {
			echo "<h4 id='commentsHeader'><a href='login.php?redirect=post{$_GET['id']}'>Login to leave a comment</a></p></h4>";
		}
		if(empty($comments)) {
			echo "<h4 id='commentsHeader'>No comments</h4>";	
		} else {
		?>
			<a id="comments"></a>
			<h4 id="commentsHeader"><?php echo $total_count; ?> <?php if($total_count == 1) { echo "comment"; } else { echo "comments"; } ?> for &quot;<?php echo $news['caption']; ?>&quot;</h4>	
			<ul id="articleCommentList">
			<?php 
			foreach(Comment::find_by_sql($sql_comments) as $comment) {
				echo "<li>";
				echo "<div class='commentBody'>";
				echo "<p><a href='mailto:" . $comment['mail'] . "'>" . $comment['full_name'] . "</a></p><br>";
				echo "<p align='justify'>" . nl2br($comment['content']) . "</p><br>";
				echo "<p>" . datetime_to_text($comment['date']) . "</p>";	
				echo "</div";
				echo "</li>";
			}
	 	?>
			</ul>
		<?php } ?>
		
		<ul id="pagination">
		<?php
		if($pagination->total_pages() > 1) {
			if($pagination->has_previous_page()) {
				echo "<li><a href=\"post.php?id={$id}&page=";
				echo $pagination->previous_page();
				echo "#comments\">&laquo Previous</a></li>";
			}
			for($i = 1; $i <= $pagination->total_pages(); $i++) {
				if($i == $page) {
				echo "<li><a id=\"currentPage\">{$i}</a></li>";
				} else {
					echo " <li><a href=\"post.php?id={$id}&page={$i}#comments\">{$i}</a></li> ";
				}
			}
			if($pagination->has_next_page()) {
				echo "<li><a href=\"post.php?id={$id}&page=";
				echo $pagination->next_page();
				echo "#comments\">Next &raquo</a></li>";
			}
		}
		?>
		</ul>
		
		<?php if($session->is_logged_in()) { ?>
		<a id="form"></a>
		<form action="post.php?id=<?php echo $id; ?>" class="contact_form" method="post" name="comment_form" id="contact">
			<ul>
				<li>
					<h2>New Comment</h2>
				</li>
	        	<li>
			    	<label for="content">Comment</label>
					<textarea name="content" id="content" rows="7" cols="35" value="<?php echo $content; ?>" required></textarea>
			    </li>
				<li>
			        <button type="submit" name="submit" class="submit">Submit Comment</button>
				</li>
			</ul>
	    </form>
	    <?php } ?>
	
	</div>
	
	<div class="cBoth"></div>
	
</div>

<?php require_once("includes/footer.php"); ?>