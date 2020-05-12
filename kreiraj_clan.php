<?php
  
  require connection.php;
    
    //fill varijable
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $oib = $_POST['oib'];
   
    //sql upit za punjenje tablice
    $sql = "INSERT INTO clanovi (ime, prezime, oib) VALUES('$ime','$prezime','$oib')";

    //Uspješno . neuspješno punjenje
    if(!mysqli_query($con,$sql)){
        echo "Podaci nisu uneseni u bazu podataka";
        
    }
    else{
        header('Location: clanovi.php');
    }
?>