<?php
session_start();
if (isset($_SESSION['admin'])) {
    // logged in
    if (isset($_POST['submit_update'])) {
        $id_camera = array_key_exists('id_camera', $_POST) ? $_POST['id_camera'] : '';
        $nome_camera = array_key_exists('nome_camera', $_POST) ? $_POST['nome_camera'] : '';
        $prezzo_giornaliero = array_key_exists('prezzo_giornaliero', $_POST) ? $_POST['prezzo_giornaliero'] : '';
        $metratura = array_key_exists('metratura', $_POST) ? $_POST['metratura'] : '';
        $n_bagni = array_key_exists('n_bagni', $_POST) ? $_POST['n_bagni'] : '';
        $posti_letto = array_key_exists('posti_letto', $_POST) ? $_POST['posti_letto']:'';
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
        $sql1 = sprintf("UPDATE camere set nome_camera='%s', prezzo_giornaliero='%s', metratura='%s', n_bagni='%s', posti_letto='%s'  WHERE id_camera='%s' ",$nome_camera,$prezzo_giornaliero,$metratura,$n_bagni,$posti_letto,$id_camera);
        
        if ($conn->query($sql1) === TRUE) {
            echo "<script>
                    alert('Update eseguito con successo');
                    window.location.href='../html/admin.php';
                   </script>";
        } else {
            echo "<script>
                    alert('errore durante update');
                    window.location.href='../html/admin.php';
                   </script>";
        }

    }
} else {
    // not logged in
    echo "<script>
                    alert('non puoi prenotare fino a quando non sei loggato');
                    window.location.href='../html/loginAdmin.html';
                   </script>";
}

?>

