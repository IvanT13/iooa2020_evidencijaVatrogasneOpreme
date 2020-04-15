<?php
	$con=mysqli_connect("127.0.0.1","root","");
				
	if(!$con){
		die("Nesupjelo spajanje: " . mysqli_error());
	}
	mysqli_select_db($con,"iooa2020");
	$sql = "DELETE FROM vatrogasna_oprema WHERE ID='$_GET[id]'";
	$myData = mysqli_query($con,$sql);
	
	if(mysqli_query($con,$sql)){
		header('Location: vatrogasna_oprema.php');
	}else{
		echo "Pogreska brisanja";
	}

?>