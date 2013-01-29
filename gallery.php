<?php require_once("includes/initialize.php"); ?>

<?php 

// $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
// $per_page = 5;
// $total_count = Image::count();

// $pagination = new Pagination($page, $per_page, $total_count);

// $sql = "SELECT * FROM images ";
// $sql .= "ORDER BY id ASC ";
// $sql .= "LIMIT " . $per_page;
// $sql .= " OFFSET " . $pagination->offset();
// $images = Image::find_by_sql($sql);

// if(isset($_GET['page']) &&  ($_GET['page'] > $pagination->total_pages())) {
// 	redirect_to("gallery.php");
// }

?>

<?php require_once("includes/header.php"); ?>

<div class="cAlign">

	<div id="fullWidthSection" align="center">

		<h4><?php echo output_message($message); ?></h4>
	
		<div align="center">
	
			<h2>Gallery</h2>
					
			<h1><b><u>UNDER CONSTRUCTION</u></b></h1>
			<?php header('Refresh: 5; URL=index.php'); ?>


			<?php
			// echo "<table>"; 
			// foreach($images as $image) {
			// 	echo "<td>";
			// 	echo "<a href='images/{$image->filename}' rel='lightbox[galerija]'><img class='borderImg' src='images/{$image->filename}' width='150'></a>";
			// 	echo "</td>";
			// }
			// echo "</table>";
			?>		
						
			<?php 
// 			$column = 4;
// 			$base = "images";		
// 			$x = 0;
// 			$handle = opendir($base);
			
// 			while(($file = readdir($handle)) !== FALSE) {
// 				if($file != "." && $file != "..") {
// 					echo "<table id='galerija' style='display:inline-table;'><tr><td><a href='$base/$file' rel='lightbox[galerija]' title='$file'><img class='borderImg' src='$base/$file' width='150px' height='100px'></a></td></tr></table>";	
// 					$x++;
// 					if($x == $column) {
// 						echo "</br>";
// 						$x = 0;
// 					}
// 				}
// 			}
// 			closedir($handle);
			?>
			
			<br>
			
			<ul id="pagination">
			<?php
			// if($pagination->total_pages() > 1) {
			// 	if($pagination->has_previous_page()) {
			// 		echo "<li><a href=\"gallery.php?page=";
			// 		echo $pagination->previous_page();
			// 		echo "\">&laquo Previous</a></li>";
			// 	}
			// 	for($i = 1; $i <= $pagination->total_pages(); $i++) {
			// 		if($i == $page) {
			// 		echo "<li><a id=\"currentPage\">{$i}</a></li>";
			// 		} else {
			// 			echo " <li><a href=\"gallery.php?page={$i}\">{$i}</a></li> ";
			// 		}
			// 	}
			// 	if($pagination->has_next_page()) {
			// 		echo "<li><a href=\"gallery.php?page=";
			// 		echo $pagination->next_page();
			// 		echo "\">Next &raquo</a></li>";
			// 	}
			// }
			?>
			</ul>
			
		</div>
		
		<?php

// 			error_reporting(0);

// 			$column = 4;

// 			$base = "images";
// 			$thumbs = "thumbs";

// 			$get_album = $_GET['album'];	 	
				
// 			$x = 0;
// 			echo "<b>$get_album</b></p>";
// 			$handle = opendir($base."/".$get_album);
// 			while(($file = readdir($handle)) !== FALSE) {
// 				if($file != "." && $file != ".." && strstr($file, "thumb_")) {
// 					$ime = trim($file, 'thumb_');
// 					echo "<table id='galerija' style='display:inline-table;'><tr><td><a href='$base/$ime' rel='lightbox[galerija]' title='$ime'><img class='borderImg' src='$base/$file' width='150px' height='100px'></a></td></tr></table>";	
// 					$x++;
// 					if($x == $column) {
// 						echo "</br>";
// 						$x = 0;
// 					}
// 				}
// 			}
// 			closedir($handle);
			
// 			echo "<h4><a href='javascript:history.back();'>Back</a></h4>";
		?>

	</div>
	
	<div class="cBoth"></div>

</div>

<?php require_once("includes/footer.php"); ?>