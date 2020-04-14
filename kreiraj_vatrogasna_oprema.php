<?php
    $con = mysqli_connect('127.0.0.1','root',''); //spajanje na server

    if(!$con){
		echo "Neuspjelo spajanje na bazu";
    }
    
    if(!mysqli_select_db($con,'iooa2020')){ //spajanje na bazu
		echo "Baza podataka nije izabrana";
    }
    
    //print_r($_POST);
    //fill varijable
    $naziv_opreme = $_POST['naziv_opreme'];
    $kolicina = $_POST['kolicina'];
    $lokacija = $_POST['lokacija'];
    $sql = "SELECT * FROM lokacije";
    $myData = mysqli_query($con,$sql); //pull podataka iz baze
      while($record = mysqli_fetch_array($myData)){
        //Prebacivanje teksta u ID
        if(strcmp($record['naziv_lokacije'],$lokacija) == 0){
          $lokacija = $record['ID'];
        }        
      }   
    //sql upit za punjenje tablice
    $sql = "INSERT INTO vatrogasna_oprema (naziv_opreme, kolicina, lokacija) VALUES('$naziv_opreme','$kolicina','$lokacija')";

    //Uspješno . neuspješno punjenje
    if(!mysqli_query($con,$sql)){
        echo "Podaci nisu uneseni u bazu podataka";
        
    }
    else{
        header('Location: vatrogasna_oprema.php');
    }
?>