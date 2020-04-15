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
    $sql = "UPDATE vatrogasna_oprema SET naziv_opreme = '$naziv_opreme', kolicina = '$kolicina', lokacija= '$lokacija' WHERE ID = '$id'";

    //Uspješno . neuspješno punjenje
    if(!mysqli_query($con,$sql)){
        echo "Podaci nisu uneseni u bazu podataka";
        
    }
    else{
        header('Location: vatrogasna_oprema.php');
    }
?>