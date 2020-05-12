<?php
    require ('connection.php');
    
    //fill varijable
    $lokacija = $_POST['lokacija'];
    
    //sql upit za punjenje tablice
    $sql = "INSERT INTO lokacije (naziv_lokacije) VALUES('$lokacija')";

    //Uspješno . neuspješno punjenje
    if(!mysqli_query($con,$sql)){
        echo "Podaci nisu uneseni u bazu podataka";
        
    }
    else{
        header('Location: lokacije.php');
    }
?>