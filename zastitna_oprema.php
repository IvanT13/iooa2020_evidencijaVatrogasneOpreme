<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title>Zaštitna oprema</title>
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
        <li class="nav-item active">
          <a class="nav-link" href="zastitna_oprema.php">Zaštitna oprema</a>
        </li>
        <li class="nav-item">
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
  <!-- Nova zaštitna oprema button -->
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <a href="dodaj_zastitna_oprema.php" <button type="button" class="btn btn-success btn-lg btn-block">Upis nove
          zaštitne opreme</button>
        </a>
      </div>
    </div>
    <!-- end Nova zaštitna oprema button -->
    <div class="row">
      </br>
    </div>
    <!-- Filtriranje prema članu -->
      <div class="row">
        <div class="col">
          <form class="form-inline" method="POST" action="zastitna_oprema_filter.php">
            <div class="form-inline">
              <label for="clan">Prikaži opremu po članu: </label>
              <div class="col">
                <select type="text" class="form-control" id="clan" name="clan" aria-describedby="clanHelp" required>
                  <?php
                require ('connection.php');
                $sql = "SELECT * FROM clanovi"; //sql upit za ispis
                $myData = mysqli_query($con,$sql); //pull podataka iz baze
                while($record = mysqli_fetch_array($myData)){
                    echo "<option>" . $record['ime'] . " " . $record['prezime'] . "</option>";
                }
              ?>
                </select>
                </div>
            </div>
            <div class="col">
            <div class="form-inline">
            <button type="submit" class="btn btn-secondary btn-block">Prikaži</button>
            </div>
            </div>
          </form>
        </div>
      </div>
    <!-- end filtriranje prema članu -->
    <div class="row">
      </br>
    </div>
    <!-- Ispis zaštitne opreme -->
    <div class="row">
      <div class="col">
        <?php

          require ('connection.php');
          $sql = "SELECT zastitna_oprema.ID, zastitna_oprema.naziv_opreme, zastitna_oprema.kolicina, zastitna_oprema.datum_zaduzeno, clanovi.ime AS clanime, clanovi.prezime AS clanprez FROM zastitna_oprema, clanovi WHERE zastitna_oprema.clan = clanovi.ID"; //sql upit za ispis opreme
          $myData = mysqli_query($con,$sql); //pull podataka iz baze opreme
          //ispis podataka
          echo '<table class="table">
              <thead>
                  <tr>
                  <th scope="col">Naziv opreme</th>
                  <th scope="col">Količina</th>
                  <th scope="col">Član</th>
                  <th scope="col">Datum zaduženja</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  </tr>
              </thead>';
              while($record = mysqli_fetch_array($myData)){
                  echo "<tr>";
                  echo "<td>" . $record['naziv_opreme'] . "</td>";
                  echo "<td>" . $record['kolicina'] . "</td>";
                  echo "<td>" . $record['clanime'] . " " . $record['clanprez'] . "</td>";
                  echo "<td>" . $record['datum_zaduzeno'] . "</td>";
                  echo "<td><a href=azuriraj_zastitna_oprema.php?id=".$record['ID']." <button type='button' class='btn btn-info btn-sm btn-block'>Ažuriraj</button></a></td>";
                  echo "<td><a onClick=brisanje(".$record['ID'].") <button type='button' class='btn btn-danger btn-sm btn-block'>Izbriši</button></a></td>";
                  echo "</tr>";
              }
        ?>
      </div>
    </div>

  </div>
  <!--end Ispis zaštitne opreme-->

  <!-- Optional JavaScript -->
  <!-- Potvrda brisanja -->
  <script>
    function brisanje(id) {
      var odgovor = false;
      odgovor = confirm("Jesi li siguran?");
      if (odgovor) {
        window.open("izbrisi_zastitna_oprema.php?id=" + id, "_parent");
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