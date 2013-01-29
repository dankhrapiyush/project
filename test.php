<?php require_once("includes/initialize.php"); ?>

<?php

$sql = "SELECT * 
		FROM users
		";
$result = mysql_query($sql);



// while($data = mysql_fetch_assoc($result)) {
// 	echo $data['username'] . "<br>";
// }



if($data = mysql_fetch_assoc($result)) {
	do {
		echo $data['username'] . "<br>";
	} while($data = mysql_fetch_assoc($result));
}

?>

<?php require_once("includes/header.php"); ?>


<?php require_once("includes/footer.php"); ?>