<?php
if (isset($_POST['submitLogin'])) {

    $email_amministratore = array_key_exists('email_amministratore', $_POST) ? $_POST['email_amministratore'] : '';
    $password_amministratore = array_key_exists('password_amministratore', $_POST) ? $_POST['password_amministratore'] : '';
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
    $sql = "SELECT * FROM amministratori WHERE email_amministratore=" . '"' . $email_amministratore . '"' . 'and password_amministratore=' . '"' . $password_amministratore . '"';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            session_start();
            $_SESSION['admin'] = $row["id_amministratore"];
            echo "<script>
                alert('accesso eseguito correttamente');
                window.location.href='../html/admin.php';
               </script>";
        }
    } else {
        echo "<script>
            alert('email o password errate, riprovare');
            window.location.href='../html/loginAdmin.html';
            </script>";
    }
    $conn->close();
}
?>
