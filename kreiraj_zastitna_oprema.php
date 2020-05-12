<?php
    require ('connection.php');
    
    //fill varijable
    $naziv_opreme = $_POST['naziv_opreme'];
    $kolicina = $_POST['kolicina'];
    $clan = $_POST['clan'];
    $datum_post = $_POST['datum_zaduzeno'];
    $datum_convert = strtotime($datum_post);
    $datum_zaduzeno = date('Y-m-d',$datum_convert);
    $sql = "SELECT * FROM clanovi";
    $myData = mysqli_query($con,$sql); //pull podataka iz baze
      while($record = mysqli_fetch_array($myData)){
        //Prebacivanje teksta u ID
        if(strcmp($record['ime'] . " " . $record['prezime'],$clan) == 0){
          $clan = $record['ID'];
        }        
      }   
    //sql upit za punjenje tablice
    $sql = "INSERT INTO zastitna_oprema (naziv_opreme, kolicina, clan, datum_zaduzeno) VALUES('$naziv_opreme','$kolicina','$clan', '$datum_zaduzeno')";

    //Uspješno . neuspješno punjenje
    if(!mysqli_query($con,$sql)){
        echo "Podaci nisu uneseni u bazu podataka";
        print_r($_POST);
        
    }
    else{
        header('Location: zastitna_oprema.php');
        /*
        print_r($_POST);
        echo "tempdatum".$tempdatum_zaduzeno;
        echo "datum" . $datum_zaduzeno;
        echo "temptempdatum" . $temptempdatum_zaduzeno;
        */
    }
?>