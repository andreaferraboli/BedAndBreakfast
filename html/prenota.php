<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="../css/prenota.css">
    <link href="../css/style.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/js/tabler.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/css/tabler-flags.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/css/tabler-payments.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/css/tabler-vendors.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/css/tabler.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="../css/bootstrap.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="ui-page">
<nav class="navbar navbar-expand-lg myNavbar bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand personal-link" href="index.php">BED&BREAKFAST</a>
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
            <?php
            session_start();
            echo "<script>console.log(': " . $_SESSION['user'] . "' );</script>";

            if (isset($_SESSION['user'])) {
                ?>
                <a class="btn btn-outline-success" href="loggedin.php"><i class="far fa-user-circle"></i></a>
                <?php
            } else {
                ?>
                <a class="btn btn-outline-success" href="login.html">Login</a>
                <?php
            } ?>

        </div>
    </div>
</nav>
<h3 class="title">prenota la tua camera, per te un soggiorno indimenticabile!</h3>
<?php

$conn = new mysqli('localhost', 'root', '', 'bed_and_breakfast');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {
//creo la query
    $sql = "SELECT * FROM bed_and_breakfast.camere";
//eseguo la query
    $result = $conn->query($sql);
    $id_cliente = 1;
    if ($result->num_rows > 0) {
        $numberElements = 0;
//creo la rappresentazione delle macchine in magazzino
        echo '<div class="container">';
        while ($row = $result->fetch_assoc()) {
            if ($numberElements % 3 == 0)
                echo '<div class="row">';
            echo '<div class="column">';
            echo '<div class="card">';
            echo '<form name="buyform" method="post" action="aggiungiPrenotazione.php">';
            echo '<h1 class="cardH1">' . $row["nome_camera"] . "</h1>";
            echo '<img src="/img/' . $row["nome_camera"] . '.jpg" alt="' . $row["nome_camera"] . '" style="width:50%;height:300px">';
            echo '<p class="price" >Prezzo giornaliero:' . $row["prezzo_giornaliero"] . " €</p>";
            echo '<p class="information" >numero bagni:' . $row["n_bagni"] . "</p>";
            echo '<p class="information" >numero posti letto:' . $row["posti_letto"] . "</p>";
            echo '<p class="information" >metratura:' . $row["metratura"] . " m<sup>2</sup></p>";
            echo '<div>';
            if($row["wi_fi"]>=1)
                echo '<i class="fa fa-wifi" style="font-size:48px;color:green"></i>';
            else
                echo '<i class="fa fa-wifi" style="font-size:48px;color:red"></i>';
            if($row["parcheggio_privato"]>=1)
                echo '<i class="fa fa-parking" style="font-size:48px;color:green"></i>';
            else
                echo '<i class="fa fa-parking" style="font-size:48px;color:red"></i>';
            if($row["n_bagni"]>=1)
                echo '<i class="fa fa-bath" style="font-size:48px;color:green"></i>';
            else
                echo '<i class="fa fa-bath" style="font-size:48px;color:red"></i>';
            if($row["tv"]>=1)
                echo '<i class="fa fa-tv" style="font-size:48px;color:green"></i>';
            else
                echo '<i class="fa fa-tv" style="font-size:48px;color:red"></i>';
            echo'</div>';
            echo '<input type="hidden" name="id_camera" value="' . $row["id_camera"] . '"/' . ">";
            echo '<label>Data inizio:</label>';
            echo '<input type="date" id="start" name="trip-start" >';
            echo '<label>Data fine:</label>';
            echo '<input type="date" id="end" name="trip-end" >';
            echo '<br><button type="submit" value="Compra Macchina" class="cardButton" name="submit2" >PRENOTA</button>';
            //            echo '<button class="cardButton" />Compra Macchina</button>';
            echo "</form>";

            echo "</div>";


            echo "</div>";
            if ($numberElements % 3 == 2)
                echo "</div>";
            $numberElements++;
        }
        echo "</div>";

    } else {
        echo "<script>
                alert('nessuna camera disponibile');
                window.location.href='IdeaProjects/BedAndBreakfast/html/index.php';
               </script>";
    }
}

?>
<!--<script type="text/javascript">-->
<!--    function setId(id){-->
<!--        document.cookie = "id="+id++ "; path=/; domain=..";-->
<!--    }-->
<!--</script>-->
</body>
</html>
