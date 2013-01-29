<?php require_once("includes/initialize.php"); ?>

<?php

if(!$session->is_logged_in()) {
	redirect_to("login.php");
}

$sql = "SELECT 
	       	i.id, 
			i.filename,
			CONCAT(u.first_name, ' ', u.last_name) AS 'full_name', 
			u.mail, 
	   		i.type, 
	   		i.size
		FROM images i
		JOIN users u ON u.username = i.username
		";
$news = News::find_by_sql($sql);

// TO BE CONTINUED....

?>

<?php require_once("includes/header.php"); ?>

<div class="cAlign">

	<div id="fullWidthSection">	
				
			<h4 align="center"><?php echo output_message($message); ?></h4>
			
			<h2>Edit Images</h2>
			
			<table>
				<tr>
					<th>Image</th>
					<th>Filename</th>
					<th>Type</th>
					<th>Size</th>
					<th>User</th>
					<th>Date</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
				</tr>
				<?php foreach($images as $image) { ?>
				<tr>
					<td><img src="<?php echo $image->image_path(); ?>" width="50"></td>
					<td><?php echo $image->filename; ?></td>
					<td><?php echo $image->type; ?></td>
					<td><?php echo $image->image_size() ?></td>
					<td><?php echo $image->user; ?></td>
					<td><?php echo datetime_to_text($image->date); ?></td>
					<td><a href="edit_images.php?id=<?php echo $image->id; ?>">Edit</a></td>
					<td><a href="delete_image.php?id=<?php echo $image->id; ?>">Delete</a></td>
				</tr>
				<?php } ?>
			</table>
			<br>
			
			<ul id="pagination">
			<?php 
			if($pagination->total_pages() > 1) { 	
				if($pagination->has_previous_page()) {
					echo "<li><a href=\"list_images.php?page=";
					echo $pagination->previous_page();
					echo "\">&laquo Previous</a></li>";
				}
				for($i = 1; $i <= $pagination->total_pages(); $i++) {
					if($i == $page) {
						echo "<li><a id=\"currentPage\">{$i}</a></li>";
					} else {
						echo " <li><a href=\"list_images.php?page={$i}\">{$i}</a></li> ";
					}
				}
				if($pagination->has_next_page()) {
					echo "<li><a href=\"list_images.php?page=";
					echo $pagination->next_page();
					echo "\">Next &raquo</a></li>";
				}
			} 
			?>
			</ul>
			
			<br>
			<br>			
			<h4><a href="upload_image.php">Upload Image</a></h4>
					
		<h4><a href="index.php">Back</a></h4>
	
	</div>
	
	<div class="cBoth"></div>

</div>

<?php require_once("includes/footer.php"); ?>