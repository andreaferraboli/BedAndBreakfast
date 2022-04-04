<?php
if (isset($_POST['submitLogin'])) {

    $emailLogin = array_key_exists('emailLogin', $_POST) ? $_POST['emailLogin'] : '';
    $password = array_key_exists('passwordLogin', $_POST) ? $_POST['passwordLogin'] : '';
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
    $sql = "SELECT email_cliente, password_cliente FROM clienti WHERE email_cliente='$emailLogin' and password_cliente='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<script>
                alert('accesso eseguito correttamente');
                window.location.href='../html/index.html';
               </script>";
        }
    } else {
        echo "<script>
            alert('email o password errate, riprovare');
            window.location.href='../html/login.html';
            </script>";
    }
    $conn->close();
}
?>
