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
                    <a class="nav-link active personal-link" aria-current="page" href="#Home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link personal-link" href="#position">dove siamo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link personal-link" href="prenota.php">le nostre camere</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link personal-link" href="prenota.php">galleria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link personal-link" href="#contact">contattaci</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8 mx-auto">
            <h2 class="h3 mb-4 page-title">Settings</h2>
            <div class="my-4">
                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                           aria-controls="home" aria-selected="false">Profile</a>
                    </li>
                </ul>

                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstname">Firstname</label>
                            <input type="text" id="firstname" class="form-control" placeholder="Brown"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastname">Lastname</label>
                            <input type="text" id="lastname" class="form-control" placeholder="Asher"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="brown@asher.me"/>
                    </div>
                    <hr class="my-4"/>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputPassword4">Old Password</label>
                                <input type="password" class="form-control" id="inputPassword5"/>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword5">New Password</label>
                                <input type="password" class="form-control" id="inputPassword5"/>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword6">Confirm Password</label>
                                <input type="password" class="form-control" id="inputPassword6"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-2">Password requirements</p>
                            <p class="small text-muted mb-2">To create a new password, you have to meet all of the
                                following requirements:</p>
                            <ul class="small text-muted pl-4 mb-0">
                                <li>Minimum 8 character</li>
                                <li>At least one special character</li>
                                <li>At least one number</li>
                                <li>Can’t be the same as a previous password</li>
                            </ul>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Change</button>
                </form>
            </div>
        </div>
    </div>

    <?php
    $conn = new mysqli('localhost', 'root', '', 'bed_and_breakfast');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
//creo la query

        echo "<script>console.log(': " . $_SESSION['user'] . "' );</script>";
        $sql = 'SELECT * FROM bed_and_breakfast.prenotare where id_cliente=' . '"' . $_SESSION['user'] . '"';
//eseguo la query
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
//creo la rappresentazione delle macchine in magazzino
            while ($row = $result->fetch_assoc()) {
                $sql = 'SELECT * FROM bed_and_breakfast.camere where id_camera=' . '"' . $row['id_camera'] . '"';
//eseguo la query
                $result2 = $conn->query($sql);
                if ($result2->num_rows > 0) {
//creo la rappresentazione delle macchine in magazzino
                    echo '<div class="container">';
                    while ($row2 = $result2->fetch_assoc()) {
                        echo '<div class="column">';
                        echo '<div class="row row-no-gutters">';
                        echo '<div class="col-sm-6 card">';
                        echo '<h1 class="cardH1">' . $row2["nome_camera"] . "</h1>";
                        echo '<img src="/img/' . $row2["nome_camera"] . '.jpg" alt="' . $row2["nome_camera"] . '" style="width:100%;height:300px">';
                        echo '<p class="price" > prezzo giornaliero:' . $row2["prezzo_giornaliero"] . " €</p>";
                        echo '<p class="information" >numero bagni:' . $row2["n_bagni"] . "</p>";
                        echo '<p class="information" >numero posti letto:' . $row2["posti_letto"] . "</p>";
                        echo '<p class="information" >metratura:' . $row2["metratura"] . "</p>";
                        echo "</div>";
                        echo '<div class="col-sm-6 card">';
                        $differenza = floor((strtotime($row["data_fine_prenotazione"]) - strtotime($row["data_inizio_prenotazione"])) / 86400);
                        echo '<p type="submit"  class="cardInformation" >Dettagli prenotazione</p>';
                        echo '<p type="submit"  class="cardInformation"> Durata soggiorno:' . $differenza . ' giorni</p>';
                        echo '<p type="submit"  class="cardInformation" >Arrivo:' . $row["data_inizio_prenotazione"] . '</p>';
                        echo '<p type="submit"  class="cardInformation" >Partenza' . $row["data_fine_prenotazione"] . '</p>';
                        echo '<p type="submit"  class="cardInformation" >Costo soggiorno:' . $differenza * $row2["prezzo_giornaliero"] . '</p>';
                        //            echo '<button class="cardButton" />Compra Macchina</button>';
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