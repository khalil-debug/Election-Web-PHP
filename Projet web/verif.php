<?php
session_start();
if(isset($_POST['verif']))
{
    extract($_POST);
    $host="localhost";
    $user="root";
    $pass="";
    $db="election";
    
    $conn = mysqli_connect($host,$user,$pass,$db);
    $sql=mysqli_query($conn,"SELECT * FROM electeur where Pseudo='$pseudo' and motPasse='$mdp'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        $_SESSION["idElecteur"] = $row['idElecteur'];
        $_SESSION["pseudo"]=$row['pseudo'];
        $_SESSION["idGov"]=$row['idGouvernorat'];
        $_SESSION["partiElu"]=$row['idPartiElu'];
        
        header("Location: home_User.php"); 

    }
    else
    {
        echo "Invalid Pseudo/Password";
    }
}
?>