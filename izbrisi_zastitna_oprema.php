<?php
	require ('connection.php');
	$sql = "DELETE FROM zastitna_oprema WHERE ID='$_GET[id]'";
	$myData = mysqli_query($con,$sql);
	
	if(mysqli_query($con,$sql)){
		header('Location: zastitna_oprema.php');
	}else{
		echo "Pogreska brisanja";
	}

?>