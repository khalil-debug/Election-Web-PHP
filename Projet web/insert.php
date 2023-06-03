
<?php 
    
    $host="localhost";
    $user="root";
    $pass="";
    $db="election";
    
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pseudo=$_POST['pseudo'];
    $mdp=$_POST['mdp'];
    $age=$_POST['age'];
    $gov=$_POST['gov'];
    $date=date('Y-m-d');
    if($mdp==""||empty($age)||$pseudo=="")
    { echo "veuillez remplir les champs.";}else if ($age<18){
        echo "Vous devez être Majeur pour voter.";
    }
    else{
    session_id($pseudo);
    $query="INSERT into electeur (pseudo,motPasse,age,dateIscription,idGouvernorat)values ('$pseudo','$mdp',$age,'$date',$gov)";
    $conn->exec($query);

    header("Location: auth.php");}
?>

