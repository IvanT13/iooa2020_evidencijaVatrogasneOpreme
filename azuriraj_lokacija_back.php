<?php
    require ('connection.php');

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