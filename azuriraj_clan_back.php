<?php
    $con = mysqli_connect('127.0.0.1','root',''); //spajanje na server

    if(!$con){
		echo "Neuspjelo spajanje na bazu";
    }
    
    if(!mysqli_select_db($con,'iooa2020')){ //spajanje na bazu
		echo "Baza podataka nije izabrana";
    }
    
    //fill varijable
    $id = $_GET['id'];
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $oib = $_POST['oib'];
   
    //sql upit za punjenje tablice
    $sql = "UPDATE clanovi SET ime='$ime', prezime='$prezime', oib='$oib' WHERE ID = '$id'";

    //Uspješno . neuspješno punjenje
    if(!mysqli_query($con,$sql)){
        echo "Podaci nisu uneseni u bazu podataka";
        
    }
    else{
        header('Location: clanovi.php');
    }
?>