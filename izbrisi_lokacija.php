<?php
	require ('connection.php');
	$sql = "DELETE FROM lokacije WHERE ID='$_GET[id]'";
	$myData = mysqli_query($con,$sql);
	
	if(mysqli_query($con,$sql)){
		header('Location: lokacije.php');
	}else{
		echo "Pogreska brisanja";
	}

?>