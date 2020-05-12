<?php
    //test
    /*
    $con = mysqli_connect("localhost","root",""); //spajanje na server

    if(!$con){
		echo "Neuspjelo spajanje na bazu";
    }
    
    if(!mysqli_select_db($con,'iooa2020')){ //spajanje na bazu
		echo "Baza podataka nije izabrana";
    }
    */
    //produkcija
    $con = mysqli_connect("dvdbribir.hr","dvdbribir_ivan","K0mpl1c1r4naL0z!nka"); //spajanje na server

    if(!$con){
		echo "Neuspjelo spajanje na bazu";
    }
    
    if(!mysqli_select_db($con,'dvdbribir_iooa2020')){ //spajanje na bazu
		echo "Baza podataka nije izabrana";
    }
?>