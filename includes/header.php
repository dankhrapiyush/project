<?php require_once("includes/initialize.php"); ?>

<?php 

if(isset($session->user_id)) {
	$user = User::find_by_id($session->user_id); 
} else {
	$session->user_id = "";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold' rel='stylesheet'>
	<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>

	<link rel="shortcut icon" href="css/images/logo.ico"> 

	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/master.css">
	<link rel="stylesheet" href="css/form.css" type="text/css" media="all">

	<link rel="stylesheet" href="javascripts/lightbox/lightbox.css" type="text/css" media="screen" />
	<script type="text/javascript" src="javascripts/lightbox/prototype.js"></script>
	<script type="text/javascript" src="javascripts/lightbox/scriptaculous.js?load=effects,builder"></script>
	<script type="text/javascript" src="javascripts/lightbox/lightbox.js"></script>

	<script type="text/javascript" src="javascripts/twitter/twitter.js"></script>
<!-- <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>		 -->

    <title>
		<?php
		$url = current_url();

		switch($url) {
			case "Post":
				$title = News::news_caption($id);
				echo $title . " -- Project";
				break;
			case "Edit News":
				$title = News::news_caption($id);
				if(isset($_GET['id'])) {
					echo $title . " -- {$url} -- Project";
				} else {
					echo $url . " -- Project";
				}
				break;
			case "Admin":
				echo "Administrator Panel -- Project";
				break;
			case "Index";
				echo "Project";
				break;
			default:
				echo $url . " -- Project";
		}	
		?>
	</title>

</head>

<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="container">

	<div id="topHeader" class="cAlign">
		
		<a href="index.php" id="logoFigure"><img src="css/images/basicsLogo.png" alt="Project"></a>
		
		<ul id="nav">
			<li><a href="index.php">Index</a></li>
			<li><a href="about_us.php">About Us</a></li>
			<li><a href="gallery.php">Gallery</a></li>
			<li><a href="game.php">Game</a></li>                   
			<li><a href="contact_us.php">Contacts Us</a></li>
		</ul>
		
		<div class="cBoth">
		</div>
		
	</div>

	<div id="categoriesSection">

		<div class="cAlign">
			<ul>
				<?php
				if(!$session->is_logged_in()) {
					echo "<li><a href=\"login.php\">Login</a></li>";
					echo "<li><a href=\"register.php\">Register</a></li>";
				} else {
					echo "<li><a>Welcome <b>" . User::full_name_for_current_user() . "</b></a></li>";
					echo "<li><a href=\"create_news.php\">Create News</a></li>";
					if($user['privileges'] == "admin") {
						echo "<li><a href=\"admin.php\">Administrator panel</a></li>";
					}
					echo "<li><a href=\"profile.php\">Profile</a></li>";
					echo "<li><a href=\"logout.php\">Logout</a></li>";
				} 
				?>
			</ul>
			
			<div class="cBoth"></div>

		</div>

	</div>