<?php
if (isset($_POST['submit2'])) {
    $id_camera = array_key_exists( 'id_camera' , $_POST ) ? $_POST['id_camera'] : '' ;
    $id_cliente = array_key_exists( 'id_cliente' , $_POST ) ? $_POST['id_cliente'] : '' ;
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bed_and_breakfast";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO bed_and_breakfast.prenotare (`id_cliente`, `id_camera`, `data_inizio_prenotazione`, `data_fine_prenotazione`)
VALUES ('$id_camera','$id_cliente','2022-02-10','2022-3-10')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
