<?php
    require ('connection.php');
    
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