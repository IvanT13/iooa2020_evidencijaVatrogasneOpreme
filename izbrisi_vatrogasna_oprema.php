<?php
	require ('connection.php');
	$sql = "DELETE FROM vatrogasna_oprema WHERE ID='$_GET[id]'";
	$myData = mysqli_query($con,$sql);
	
	if(mysqli_query($con,$sql)){
		header('Location: vatrogasna_oprema.php');
	}else{
		echo "Pogreska brisanja";
	}

?>