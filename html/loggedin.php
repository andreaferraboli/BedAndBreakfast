<?php
session_start();
if (isset($_SESSION['user'])) {
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../css/loggedin.css" rel="stylesheet"/>
    <link href="../css/style.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="../css/bootstrap.css" rel="stylesheet"/>
    <title>bed and breakfast</title>
</head>
<body>
<nav class="navbar navbar-expand-lg myNavbar bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand personal-link" href="../html/index.php">BED&BREAKFAST</a>
        <button class="custom-toggler navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link active personal-link" aria-current="page" href="index.php#Home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link personal-link" href="index.php#position">dove siamo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link personal-link" href="prenota.php">le nostre camere</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link personal-link" href="index.php#contact">contattaci</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8 mx-auto">
            <h2 class="h3 mb-4 page-title title">Profilo</h2>
            <div class="my-4">
                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#PROFILE" role="tab"
                           aria-controls="home" aria-selected="false">Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#reservations" role="tab"
                           aria-controls="home" aria-selected="false">my reservations</a>
                    </li>
                </ul>

                <div id="PROFILE">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstname">Firstname</label>
                            <input type="text" id="firstname" class="form-control" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastname">Lastname</label>
                            <input type="text" id="lastname" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" />
                    </div>
                    <hr class="my-4"/>
                </div>
            </div>
            <h3 class="title">le tue prenotazioni</h3>
        </div>
    </div>
    <?php
    $conn = new mysqli('localhost', 'root', '', 'bed_and_breakfast');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {

        echo "<script>console.log(': " . $_SESSION['user'] . "' );</script>";
                $sql = 'SELECT * FROM bed_and_breakfast.clienti where id_cliente=' . '"' . $_SESSION['user'] . '"';
                $info_client = $conn->query($sql);
                if ($info_client->num_rows > 0) {
                    while ($row3 = $info_client->fetch_assoc()) {
                        echo "<script>console.log(': " . $_SESSION['user'] . "ciao' );</script>";
                        echo "<script>
                        let name = document.getElementById('firstname');
                        let surname = document.getElementById('lastname');
                        let email = document.getElementById('email');
                        name.value = '".$row3['nome']."';
                        surname.value = '".$row3['cognome']."';
                        email.value = '".$row3['email_cliente']."';
                         </script>";
                    }
                }
        $sql = 'SELECT * FROM bed_and_breakfast.prenotare where id_cliente=' . '"' . $_SESSION['user'] . '"';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
//                $sql = 'SELECT * FROM bed_and_breakfast.clienti where id_cliente=' . '"' . $_SESSION['user'] . '"';
//                $info_client = $conn->query($sql);
//                if ($info_client->num_rows > 0) {
//                    while ($row3 = $info_client->fetch_assoc()) {
//                        echo "<script>
//                        let name = document.getElementById('firstname');
//                        let surname = document.getElementById('surname');
//                        let email = document.getElementById('email');
//                        name.value = ".$row3['nome'].";
//                        surname.value = ".$row3['cognome'].";
//                        email.value = ".$row3['email_cliente'].";
//                         </script>";
//                    }
//                }
                $sql = 'SELECT * FROM bed_and_breakfast.camere where id_camera=' . '"' . $row['id_camera'] . '"';
                $result2 = $conn->query($sql);
                if ($result2->num_rows > 0) {
                    echo '<div id="reservations" class="container">';
                    while ($row2 = $result2->fetch_assoc()) {
                        echo '<div class="column">';
                        echo '<div class="row row-no-gutters">';
                        echo '<div class="col-sm-8 card">';
                        echo '<h1 class="cardH1">' . $row2["nome_camera"] . "</h1>";
                        echo '<img src="/img/' . $row2["nome_camera"] . '.jpg" alt="' . $row2["nome_camera"] . '" style="width:100%;height:300px">';
                        echo '<p class="price" > prezzo giornaliero:' . $row2["prezzo_giornaliero"] . " €</p>";
                        echo '<p class="information" >numero bagni:' . $row2["n_bagni"] . "</p>";
                        echo '<p class="information" >numero posti letto:' . $row2["posti_letto"] . "</p>";
                        echo '<p class="information" >metratura:' . $row2["metratura"] . "</p>";
                        echo "</div>";
                        echo '<div class="col-sm-4 card">';
                        echo '<form action="../php/updatePrenotazione.php" method="POST"> ';
                        $differenza = floor((strtotime($row["data_fine_prenotazione"]) - strtotime($row["data_inizio_prenotazione"])) / 86400);
                        echo '<p class="cardInformation" >Dettagli prenotazione</p>';
                        echo '<input type="hidden" class="cardInformation" name="id_prenotazione" value="'.$row["id_prenotazione"] . '">';
                        echo '<p class="cardInformation"> Durata soggiorno:' . $differenza . ' giorni</p>';
                        echo '<p class="cardInformation" >Arrivo:</p>';
                        echo '<input type="date" class="cardInformation" name="inizio" value="'.$row["data_inizio_prenotazione"] . '">';
                        echo '<p class="cardInformation" >Partenza</p>';
                        echo '<input type="date" class="cardInformation" name="fine" value="'.$row["data_fine_prenotazione"] . '">';
                        echo '<p class="cardInformation" >Costo soggiorno:' . $differenza * $row2["prezzo_giornaliero"] . '€</p>';
                        echo '<button  type="submit" class="btn-modify" data-toggle="tooltip" data-placement="top" title="elimina" name="submit3">modifica</button>';
                        //            echo '<button class="cardButton" />Compra Macchina</button>';
                        echo "</form>";
                        echo '<form action="../php/eliminaPrenotazione.php" method="POST"> ';
                        echo '<input type="hidden" class="cardInformation" name="id_prenotazione" value="'.$row["id_prenotazione"] . '">';
                        echo '<button  type="submit" class="btn-delete" data-toggle="tooltip" data-placement="top" title="elimina" name="submit4">Elimina</button>';
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                    echo "</div>";
                } else {
                    echo "<script>
                            alert('id camera non valido');
                            window.location.href='../html/index.php';
                           </script>";
                }
            }
        }
    }
    } else {
        echo "<script>
                            alert('id cliente non esistente');
                            window.location.href='../html/index.php';
                           </script>";
    }

    ?>
</div>
</body>
</html>