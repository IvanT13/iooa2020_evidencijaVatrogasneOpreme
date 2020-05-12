<?php
	require ('connection.php');
	$sql = "DELETE FROM clanovi WHERE ID='$_GET[id]'";
	$myData = mysqli_query($con,$sql);
	
	if(mysqli_query($con,$sql)){
		header('Location: clanovi.php');
	}else{
		echo "Pogreska brisanja";
	}

?>