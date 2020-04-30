<?php
    $con = mysqli_connect("dvdbribir.hr","dvdbribir_ivan","K0mpl1c1r4naL0z!nka"); //spajanje na server

    if(!$con){
		echo "Neuspjelo spajanje na bazu";
    }
    
    if(!mysqli_select_db($con,'dvdbribir_iooa2020')){ //spajanje na bazu
		echo "Baza podataka nije izabrana";
    }

    //fill varijable
    $id = $_GET['id'];
    $lokacija = $_POST['lokacija'];
   
    //sql upit za punjenje tablice
    $sql = "UPDATE lokacije SET naziv_lokacije = '$lokacija' WHERE ID = '$id'";

    //Uspješno . neuspješno punjenje
    if(!mysqli_query($con,$sql)){
        echo "Podaci nisu uneseni u bazu podataka";
        
    }
    else{
        header('Location: lokacije.php');
    }
?>