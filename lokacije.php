<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title>Glavni izbornik</title>
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
        <li class="nav-item">
          <a class="nav-link" href="vatrogasna_oprema.php">Vatrogasna oprema</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="clanovi.php">Članovi</a>
        </li>
        <li class="nav-item active">
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
  <!-- Nova lokacija button -->
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <a href="dodaj_lokacija.html" <button type="button" class="btn btn-success btn-lg btn-block">Upis nove
          lokacije</button>
        </a>
      </div>
    </div>
    <!-- end Nova lokacija button -->
    <div class="row">
      </br>
    </div>
    <!-- Ispis lokacija -->
    <div class="row">
      <div class="col">
        <?php
   
          require ('connection.php');
          $sql = "SELECT * FROM lokacije"; //sql upit za ispis
          $myData = mysqli_query($con,$sql); //pull podataka iz baze
          
          //ispis podataka
          echo '<table class="table">
              <thead>
                  <tr>
                  <th scope="col">Lokacija</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  </tr>
              </thead>';
              while($record = mysqli_fetch_array($myData)){
                  echo "<tr>";
                  echo "<td>" . $record['naziv_lokacije'] . "</td>";
                  echo "<td><a href=azuriraj_lokacija.php?id=".$record['ID']." <button type='button' class='btn btn-info btn-sm btn-block'>Ažuriraj</button></a></td>";
                  echo "<td><a onClick=brisanje(".$record['ID'].") <button type='button' class='btn btn-danger btn-sm btn-block'>Izbriši</button></a></td>";
                  echo "</tr>";
              }
        ?>
      </div>
    </div>

  </div>
  <!--end Ispis lokacija-->
  <!-- Optional JavaScript -->
  <!-- Potvrda brisanja -->
  <script>
    function brisanje(id) {
      var odgovor = false;
      odgovor = confirm("Jesi li siguran?");
      if (odgovor) {
        window.open("izbrisi_lokacija.php?id=" + id, "_parent");
      }
    }
  </script>
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