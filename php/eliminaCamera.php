<?php
session_start();
if (isset($_SESSION['admin'])) {
    // logged in
    if (isset($_POST['submit_delete'])) {
        $id_camera = array_key_exists('id_camera', $_POST) ? $_POST['id_camera'] : '';
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
        $sql1 = sprintf("DELETE FROM camere WHERE id_camera='%s' ",$id_camera);
        echo $sql1;
        if ($conn->query($sql1) === TRUE) {
            echo "<script>
                    alert('eliminazione eseguito con successo');
                    window.location.href='admin.php';
                   </script>";
        } else {
            echo "<script>
                    alert('errore durante eliminazione');
                    window.location.href='admin.php';
                   </script>";
        }

    }
} else {
    // not logged in
    echo "<script>
                    alert('non puoi prenotare fino a quando non sei loggato');
                    window.location.href='loginAdmin.html';
                   </script>";
}

?>