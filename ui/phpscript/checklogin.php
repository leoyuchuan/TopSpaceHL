<?php
    session_start();
    $status = $_SESSION['status'];
    if($status !== 'online')
        echo '<script>window.location = "login.php"</script>';
//        echo "<script>alert('$state');</script>";
?>

