<?php
session_start();
if (isset($_SESSION['user'])) {
    // logged in
    if (isset($_POST['submit3'])) {
        $id_prenotazione = array_key_exists('id_prenotazione', $_POST) ? $_POST['id_prenotazione'] : '';
        $data_inizio = array_key_exists('inizio', $_POST) ? $_POST['inizio'] : '';
        echo $data_inizio;
        $data_fine = array_key_exists('fine', $_POST) ? $_POST['fine'] : '';
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
        $sql1 = sprintf("UPDATE prenotare set data_inizio_prenotazione='%s', data_fine_prenotazione='%s'  WHERE id_prenotazione='%s' ",$data_inizio,$data_fine,$id_prenotazione);
        
        if ($conn->query($sql1) === TRUE) {
            echo "<script>
                    alert('Update eseguito con successo');
                    window.location.href='../html/loggedin.php';
                   </script>";
        } else {
            echo "<script>
                    alert('errore durante update');
                    window.location.href='../html/loggedin.php';
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

