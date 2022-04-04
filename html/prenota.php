<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="../css/prenota.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="ui-page">

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
            echo '<p class="price" >' . $row["prezzo_giornaliero"] . " €</p>";
            echo '<p class="information" >numero bagni:' . $row["n_bagni"] . "</p>";
            echo '<p class="information" >numero posti letto:' . $row["posti_letto"] . "</p>";
            echo '<p class="information" >metratura:' . $row["metratura"] . "</p>";
            echo '<select id="id_camera" name="id_camera" class="hideContent" >';
            echo '<option value="' . $row["id_camera"] . '">' . $row["id_camera"] . "</option>";
            echo '</select>';
            echo '<select id="id_cliente" name="id_cliente" class="hideContent" >';
            echo '<option value="' . $id_cliente . '">' . $id_cliente . "</option>";
            echo '</select>';
            echo '<button type="submit" value="Compra Macchina" class="cardButton" name="submit2" >Compra!</button>';
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
        echo "0 results";
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
