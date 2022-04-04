<?php
if (isset($_POST['submitRegister'])) {
    $first_name = array_key_exists( 'first_name' , $_POST ) ? $_POST['first_name'] : '' ;
    $last_name = array_key_exists( 'last_name' , $_POST ) ? $_POST['last_name'] : '' ;
    $emailRegister = array_key_exists( 'emailRegister' , $_POST ) ? $_POST['emailRegister'] : '' ;
    $phone = array_key_exists( 'phone' , $_POST ) ? $_POST['phone'] : '' ;
    $password_cliente = array_key_exists( 'passwordRegister' , $_POST ) ? $_POST['passwordRegister'] : '' ;
    echo "<p>".$password_cliente."</p>";
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

    $sql = "INSERT INTO bed_and_breakfast.clienti (`nome`, `cognome`, `email_cliente`, `password_cliente`,`telefono`)
VALUES ('$first_name','$last_name','$emailRegister','$password_cliente','$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('registrazione effettuata correttamente');
                window.location.href='../html/index.html';
               </script>";
    } else {
        echo "<script>
                alert('errore durante la registrazione,riprovare');
                window.location.href='../html/login.html';
               </script>";
    }

    $conn->close();
}
?>
