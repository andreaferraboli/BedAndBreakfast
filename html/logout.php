<?php
if (isset($_POST['submit_logout'])) {
    session_start() ;
    session_destroy();
    $_SESSION = array(); // Clears the $_SESSION variable
    echo "<script>
                    alert('sessione eliminata con successo');
                    window.location.href='index.php';
                   </script>";
}