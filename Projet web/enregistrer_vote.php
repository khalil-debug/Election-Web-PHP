<?php 
    
    $host="localhost";
    $user="root";
    $pass="";
    $db="election";
    
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    session_start();
    $ID= $_SESSION["idElecteur"];
    
    $parti=$_POST['parti'];
    $date=date('y-m-d');
    $idGov=$_SESSION["idGov"];

    if ($_SESSION["partiElu"]==null){
    $query="UPDATE electeur set idPartiElu=$parti, dateDerniereElection='$date' where idElecteur=$ID;";
    $sql="UPDATE voix SET nombreVoix = nombreVoix+1 WHERE idParti = $parti and idGouvernorat=$idGov;";
    $conn->exec($query);
    $conn->exec($sql);
    $_SESSION["partiElu"]=$parti;
    echo "Vote ajouté!";}
    else
    {
        header("Location: home_User.php");
    }

?>