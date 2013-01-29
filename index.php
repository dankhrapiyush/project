<?php require_once("includes/initialize.php"); ?>

<?php

$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$per_page = 4;
$total_count = News::count();

$pagination = new Pagination($page, $per_page, $total_count);

$sql = "SELECT 
			n.id, 
			n.caption, 
			n.content, 
			n.date, 
			CONCAT(u.first_name, ' ', u.last_name) AS 'name', 
			u.mail, 
			i.filename 
		FROM news n 
		JOIN users u ON u.username = n.username 
		LEFT JOIN images i ON i.news_id = n.id 
		ORDER BY n.id DESC 
		";
$sql .=	"LIMIT " . $per_page;
$sql .= " OFFSET " . $pagination->offset();

if(isset($_GET['page']) &&  ($_GET['page'] > $pagination->total_pages())) {
	redirect_to("index.php");
}

?>

<?php require_once("includes/header.php"); ?>

<div class="cAlign">

	<div id="mainContentSection">
		
		<h4 align="center"><?php echo output_message($message); ?></h4>

		<ul id="articles">	
 		<?php
 		foreach(News::find_by_sql($sql) as $news) {
			echo "<li>";
			echo "<p class='articleMeta'>";
			echo "Published by:<br>";
			echo "<a href='mailto:" . $news['mail'] . "'>" . $news['name'] . "</a><br>";
			echo "Date: <br>";
			echo date_for_news($news['date']) . "<br></p>";
			echo "<div class='articleBody'>";
			echo "<h2><a href=\"post.php?id=" . $news['id'] . "\">" . $news['caption'] . "</a></h2>";
			if($news['filename'] == NULL) {
				echo "<p><img src='images/default.jpg' width='150'></p>";
			} else {
				echo "<p><img src='images/{$news['filename']}' width='150'></p>";
			}		
			echo "<p>" . nl2br(substr($news['content'], 0, 200)) . "...</p>";
			echo "<p><a href=\"post.php?id={$news['id']}\">More</a></p>";
			echo "</div>";
			echo "</li>";
		}
		?>
		</ul>

		<ul id="pagination">
		<?php
		if($pagination->total_pages() > 1) {
			if($pagination->has_previous_page()) {
				echo "<li><a href=\"index.php?page=" . $pagination->previous_page() . "\">Previous</a></li>";
			}
			for($i = 1; $i <= $pagination->total_pages(); $i++) {
				if($i == $page) {
					echo "<li><a id=\"currentPage\">{$i}</a></li>";
				} else {
					echo " <li><a href=\"index.php?page={$i}\">{$i}</a></li> ";
				}
			}
			if($pagination->has_next_page()) {
				echo "<li><a href=\"index.php?page=" . $pagination->next_page() . "\">Next</a></li>";
			}
		}
		?>
		</ul>

	</div>
	
	<div class="cBoth"></div>

</div>

<?php require_once("includes/footer.php"); ?>