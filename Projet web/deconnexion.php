<?php
    session_start();
    unset($_SESSION["idElecteur"]);
    unset($_SESSION["pseudo"]);
    unset($_SESSION["idGov"]);
    header("Location:acceuil.php");
?>