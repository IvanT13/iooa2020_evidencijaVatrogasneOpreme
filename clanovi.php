<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Popis članova</title>
</head>

<body>
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Evidencija DVD</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Glavni izbornik <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Zaštitna oprema</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Vatrogasna oprema</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Članovi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Lokacije opreme</a>
                </li>
            </ul>
        </div>
    </nav>
    <!--end navbar-->
    <div class="row">
        </br>
    </div>
    <!-- Novi član button -->
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <a href="#" <button type="button" class="btn btn-success btn-lg btn-block">Upis novog člana</button>
                </a>
            </div>
        </div>
    <!-- end Novi član button -->
        <div class="row">
            </br>
        </div>
    <!-- Ispis članova -->
        <div class="row">
            <div class="col">
                <?php
				
                    $con=mysqli_connect("127.0.0.1","root",""); //spajanje na server
                    
                    if(!$con){
                        die("Nesupjelo spajanje: " . mysqli_error());}
                    
                    mysqli_select_db($con,"iooa2020"); //spajanje na bazu
                    $sql = "SELECT * FROM clanovi"; //sql upit za ispis
                    $myData = mysqli_query($con,$sql); //pull podataka iz baze
                    
                    //ispis podataka
                    echo '<table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Ime</th>
                            <th scope="col">Prezime</th>
                            <th scope="col">OIB</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            </tr>
                        </thead>';
                        while($record = mysqli_fetch_array($myData)){
                            echo "<tr>";
                            echo "<td>" . $record['ime'] . "</td>";
                            echo "<td>" . $record['prezime'] . "</td>";
                            echo "<td>" . $record['oib'] . "</td>";
                            echo '<td> <a href="#" <button type="button" class="btn btn-info btn-sm btn-block" >Ažuriraj</button> </a> </td>';
                            echo '<td> <a href="#" <button type="button" class="btn btn-danger btn-sm btn-block" href="#">Izbriši</button> </a> </td>';
                            echo "</tr>";
                        }
                 ?>
            </div>
        </div>

    </div>
    <!--end Ispis članova-->
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