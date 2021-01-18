<?php session_start(); ?>
<?php 
    $_SESSION['username'] = null;
    $_SESSION['firstname'] = null;
    $_SESSION['lastname'] = null;
    $_SESSION['wrongcredentials'] = "";

    header("Location: ../index.php");
?>