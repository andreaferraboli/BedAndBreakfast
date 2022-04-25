<?php
session_start();
if (isset($_SESSION['user'])) {
    // logged in
    if (isset($_POST['submit2'])) {
        $id_camera = array_key_exists('id_camera', $_POST) ? $_POST['id_camera'] : '';
        $data_inizio = array_key_exists('trip-start', $_POST) ? $_POST['trip-start'] : '';
        $data_fine = array_key_exists('trip-end', $_POST) ? $_POST['trip-end'] : '';
//        $id_cliente = array_key_exists( 'id_cliente' , $_POST ) ? $_POST['id_cliente'] : '' ;
        $id_cliente = $_SESSION['user'];
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
        $sql1 = sprintf("SELECT * FROM `prenotare` WHERE id_camera='%s' and (DATE(data_inizio_prenotazione) BETWEEN '%s' and '%s' or DATE(data_fine_prenotazione) BETWEEN '%s' and '%s');", $id_camera, $data_inizio, $data_fine, $data_inizio, $data_fine);
        echo $sql1;
        $result1 = $conn->query($sql1);
        if ($result1-> num_rows > 0) {
            echo "<script>
                    alert('camera già prenotata');
                    window.location.href='prenota.php';
                   </script>";
        } else {

            $sql = "INSERT INTO bed_and_breakfast.prenotare (`id_cliente`, `id_camera`, `data_inizio_prenotazione`, `data_fine_prenotazione`)
    VALUES ('$id_cliente','$id_camera','$data_inizio','$data_fine')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>
                    alert('prenotazione aggiunta correttamente');
                    window.location.href='index.php';
                   </script>";
            } else {
                echo "<script>
                    alert('prenotazione non aggiunta correttamente'+'id_camera:'+'$id_camera'+' id_cliente:'+'$id_cliente');
                    window.location.href='prenota.php';
                   </script>";
            }

            $conn->close();
        }

    }
} else {
    // not logged in
    echo "<script>
                    alert('non puoi prenotare fino a quando non sei loggato');
                    window.location.href='login.html';
                   </script>";
}

?>
