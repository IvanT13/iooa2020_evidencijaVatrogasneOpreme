<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Ažuriraj vatrogasnu opremu</title>
</head>

<body>
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.html">Evidencija DVD</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="zastitna_oprema.php">Zaštitna oprema</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="vatrogasna_oprema.php">Vatrogasna oprema</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="clanovi.php">Članovi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="lokacije.php">Lokacije opreme</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pomoc.html">Pomoć</a>
                </li>
            </ul>
        </div>
    </nav>
    <!--end navbar-->
    <div class="row">
        </br>
    </div>
    <!--Ažuriranje-->
    <?php
    $con=mysqli_connect("127.0.0.1","root",""); //spajanje na server
                    
    if(!$con){
        die("Nesupjelo spajanje: " . mysqli_error());}
    
    mysqli_select_db($con,"iooa2020"); //spajanje na bazu
    $sql = "SELECT * FROM vatrogasna_oprema WHERE ID='$_GET[id]'"; //sql upit za ispis
    $myData = mysqli_query($con,$sql); //pull podataka iz baze
    $record = mysqli_fetch_array($myData);
	$id = $record['ID'];
    
    echo  "<div class='container-fluid'>
    <form method='POST' action='azuriraj_vatrogasna_oprema_back.php?id=$id'>
    <!--naziv opreme-->
      <div class='form-group'>
        <label for='naziv_opreme'>Naziv opreme:</label>
        <input type='text' class='form-control' id='naziv_opreme' name='naziv_opreme' aria-describedby='naziv_opremeHelp' value='$record[naziv_opreme]' required>
        <small id='naziv_opremeHelp' class='form-text text-muted'>Unesi naziv opreme</small>
      </div>
      <!--end naziv opreme-->  
      <!--Kolicina opreme-->
      <div class='form-group'>
        <label for='kolicina'>Količina:</label>
        <input type='number' class='form-control' id='kolicina' name='kolicina' aria-describedby='kolicinaHelp' value='$record[kolicina]' required>
        <small id='kolicinaHelp' class='form-text text-muted'>Unesi količinu opreme</small>
      </div>";
      echo "<div class='form-group'>
      <label for='lokacija'>Lokacija:</label>
      <select type='text' class='form-control' id='lokacija' name='lokacija' aria-describedby='lokacijaHelp' required>";
      $sqlLokacija = "SELECT * FROM lokacije"; //sql upit za ispis
      $myDataLokacija = mysqli_query($con,$sqlLokacija); //pull podataka iz baze
      while($recordLokacija = mysqli_fetch_array($myDataLokacija)){
        echo "<option>" . $recordLokacija['naziv_lokacije'] . "</option>";
    }
      echo "</select>
      <small id='lokacijaHelp' class='form-text text-muted'>Odaberi lokaciju opreme</small>
    </div>
    <!--end Lokacija-->
    <button type='submit' class='btn btn-success btn-block'>Unesi opremu</button>
    </form>
  </div>";


  ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>