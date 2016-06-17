<?php
	echo '<script> alert() </script>';

	$dbc = mysqli_connect('localhost', 'root', '', 'do_me');
	$categoryInput = $_GET["categoryInput"]; 
	$titleInput = $_GET["titleInput"];
	$dateInput = $_GET["dateInput"];
	$contentInput = $_GET["contentInput"];

	$query = "INSERT INTO `do_me`.`note` (`title`, `content`, `category_id`, `date`) VALUES ('$titleInput', '$contentInput', '$categoryInput', '$dateInput');";
	mysqli_query($dbc, $query);


	//check if status needs to be updated

	mysqli_close($dbc);
    

?>