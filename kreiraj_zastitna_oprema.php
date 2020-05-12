<?php
    require ('connection.php');
    
    //fill varijable
    $naziv_opreme = $_POST['naziv_opreme'];
    $kolicina = $_POST['kolicina'];
    $clan = $_POST['clan'];
    $sql = "SELECT * FROM clanovi";
    $myData = mysqli_query($con,$sql); //pull podataka iz baze
      while($record = mysqli_fetch_array($myData)){
        //Prebacivanje teksta u ID
        if(strcmp($record['ime'] . " " . $record['prezime'],$clan) == 0){
          $clan = $record['ID'];
        }        
      }   
    //sql upit za punjenje tablice
    $sql = "INSERT INTO zastitna_oprema (naziv_opreme, kolicina, clan) VALUES('$naziv_opreme','$kolicina','$clan')";

    //Uspješno . neuspješno punjenje
    if(!mysqli_query($con,$sql)){
        echo "Podaci nisu uneseni u bazu podataka";
        
    }
    else{
        header('Location: zastitna_oprema.php');
    }
?>