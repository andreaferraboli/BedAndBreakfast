<?php
session_start();
if (isset($_SESSION['user'])) {
    // logged in
    if (isset($_POST['submit4'])) {
        $id_prenotazione = array_key_exists('id_prenotazione', $_POST) ? $_POST['id_prenotazione'] : '';
        $data_inizio = array_key_exists('trip-start', $_POST) ? $_POST['trip-start'] : '';
        echo $data_inizio;
        $data_fine = array_key_exists('trip-end', $_POST) ? $_POST['trip-end'] : '';
        echo $data_fine;
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
        $sql1 = sprintf("DELETE FROM prenotare WHERE id_prenotazione='%s' ",$id_prenotazione);
        echo $sql1;
        if ($conn->query($sql1) === TRUE) {
            echo "<script>
                    alert('eliminazione eseguito con successo');
//                    window.location.href='loggedin.php';
                   </script>";
        } else {
            echo "<script>
                    alert('errore durante eliminazione');
//                    window.location.href='loggedin.php';
                   </script>";
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