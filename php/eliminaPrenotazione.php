<?php
session_start();
if (isset($_SESSION['user'])) {
    // logged in
    if (isset($_POST['submit4'])) {
        $id_prenotazione = array_key_exists('id_prenotazione', $_POST) ? $_POST['id_prenotazione'] : '';
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

        if ($conn->query($sql1) === TRUE) {
            echo "<script>
                    alert('eliminazione eseguito con successo');
                    window.location.href='../html/loggedin.php';
                   </script>";
        } else {
            echo "<script>
                    alert('errore durante eliminazione');
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