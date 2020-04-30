<?php
	$con=mysqli_connect("dvdbribir.hr","dvdbribir_ivan","K0mpl1c1r4naL0z!nka");
				
	if(!$con){
		die("Nesupjelo spajanje: " . mysqli_error());
	}
	mysqli_select_db($con,"dvdbribir_iooa2020");
	$sql = "DELETE FROM vatrogasna_oprema WHERE ID='$_GET[id]'";
	$myData = mysqli_query($con,$sql);
	
	if(mysqli_query($con,$sql)){
		header('Location: vatrogasna_oprema.php');
	}else{
		echo "Pogreska brisanja";
	}

?>