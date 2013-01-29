<?php require_once("includes/initialize.php"); ?>

<?php

$numbers = array(1, 2, 4, 8, 16, 32, 64);

echo var_dump($numbers);


if(isset($_POST['submit'])) {
	$result = array();
	array_push($result, $_POST['number']);
	echo array_sum($result) . "<br>";
	echo var_dump($result);
} else {
	$_POST['number'] = "";
}

?>

<?php require_once("includes/header.php"); ?>


<form action="test.php" method="POST">
	<table>
		<tr>
			<?php
			foreach($numbers as $number) { ?>
				<td><img src='test/slika<?php echo $number; ?>.gif'></td>
				<td>
				<input type="radio" name="number" value="<?php $number; ?>"  /> YES
				<input type="radio" name="number" value="0"  /> NO 
				</td>
			<?php } ?>
		</tr>			
	</table>

	<br>
	
	<button type="submit" name="submit">Submit</button>
</form>




<?php require_once("includes/footer.php"); ?>