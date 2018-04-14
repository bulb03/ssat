<?php
    session_start();
    if($_SESSION['uid']!=null){
        unset($_SESSION['uid']);
        echo "<script>alert('Logout successfully'); location.href='SchoolLogin.php'</script>";
    }    
        echo "<script>alert('Login first'); location.href='SchoolLogin.php'</script>";
?>