<?php
if (isset($_POST['submitRegister'])) {
    $first_name = array_key_exists( 'first_name' , $_POST ) ? $_POST['first_name'] : '' ;
    $last_name = array_key_exists( 'last_name' , $_POST ) ? $_POST['last_name'] : '' ;
    $email= array_key_exists( 'email_amministratore_Register' , $_POST ) ? $_POST['email_amministratore_Register'] : '' ;
    $password = array_key_exists( 'password_amministratore_Register',$_POST ) ? $_POST['password_amministratore_Register'] : '' ;
    echo 'password_amministratore_Register:'.$password;
    $servername = "localhost";
    $username = "root";
    $password_database = "";
    $dbname = "bed_and_breakfast";

// Create connection
    $conn = new mysqli($servername, $username, $password_database, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO bed_and_breakfast.amministratori (`nome_amministratore`, `cognome_amministratore`, `email_amministratore`, `password_amministratore`)
VALUES ('$first_name','$last_name','$email','$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('registrazione effettuata correttamente');
                window.location.href='../html/index.php';
               </script>";
    } else {
        echo "<script>
                alert('errore durante la registrazione,riprovare');
                window.location.href='../html/loginAdmin.html';
               </script>";
    }

    $conn->close();
}
?>
