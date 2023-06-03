<?php
$host="localhost";
$user="root";
$pass="";
$db="election";

$conn= mysqli_connect($host,$user,$pass,$db);

$query="SELECT nomParti from partipolitique";
$res=mysqli_query($conn,$query);

$res_nbr_siege=mysqli_query($conn,"SELECT nombreSieges from gouvernorat ");
$res_govs=mysqli_query($conn,"SELECT nomGouvernorat from gouvernorat");

$siege=array();
$i=1;
while($row=mysqli_fetch_array($res_nbr_siege)){
    $siege[$i]=$row[0];
    $i++;
}

$i=1;
$total=array();
$quotient=array();
while($i<=24){
$sql="SELECT nombreVoix from voix where idGouvernorat=$i";
$res_nbr_voix=mysqli_query($conn,$sql);
$quotient[$i]=0;
$total[$i]=0;
while($row=mysqli_fetch_array($res_nbr_voix)){
    $total[$i]+=$row[0];
}

$quotient[$i]= intval($total[$i]/$siege[$i]);
$i++;
}


$nbrsiege_parti=array();

for ($i=0;$i<=6;$i++)
$nbrsiege_parti[$i]=0;
$j=0;


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Projet WEB2</title>
		
    </head>
   
 <body>
 	<div id="bloc_page">
    <header>
    	<div id="titre_principal">
	    	<div id="logo">
	    	   <img src="images/tikhabet.jpg" alt="logo" id="tikhabet" width="300"/>
	    	</div>
			<h2>Republique Tunisienne</h2>
       </div>
    	<nav>
    		<ul id="barre">
                <li><a href='home_User.php' >ACCEUIL </a> </li>
                <li><a href='vote.php' onclick='voter()'> Voter </a> </li>
                <li><a href='consultation.php' onclick='consulter_vote()'> CONSULTER VOTRE VOTE </a> </li>
                <li><a href='afficher.php' onclick='afficher_result()'> AFFICHER RESULTAT ELECTIONS </a> </li>
                <li><a href='deconnexion.php' onclick='deconnexion()'> DECONNEXION </a> </li>
    		</ul>
    	</nav>

    </header>

    <div id="banniere-image"> <!-- bannière -->
    	
		<div id="banniere_description"><img src="images/flecheblanchedroite.png" alt="" />
	    </div>
    </div>
    
    <section id="section"> 
        <article>
            <h1> Résultat des élections par gouvernorat</h1>
            <table border=1>
                <legend>Nombre de sièges remportés par chaque parti pour chaque Gouvernorat</legend>
                <tr>
                    <th></th>
                    <?php while($row=mysqli_fetch_array($res)):;
                    ?>
                    <th><?php echo $row[0];?></th>
                    <?php endwhile;?>
                    <th>TOTAL DES SIEGES</th>
                </tr>
                <?php $i=1;
                    while($row=mysqli_fetch_array($res_govs)):;
                ?>
                <tr>
                    <td><?php echo $row[0] ?></td>
                    <?php $res_nbr_voix=mysqli_query($conn,"SELECT nombreVoix from voix where idGouvernorat=$i");
                        $j=0;
                        while ($ligne=mysqli_fetch_array($res_nbr_voix)):;
                        
                    ?><td><?php $kresi=intval($ligne[0]/$quotient[$i]);
                    echo $kresi;
                        $nbrsiege_parti[$j]+=$kresi;
                        $j++;
                    ?></td>
                    <?php  endwhile; 
                    $res_voix=mysqli_query($conn,"SELECT nombreSieges from gouvernorat where idGouvernorat=$i");
                    if($ligne=mysqli_fetch_array($res_voix)):;
                    ?><td><?php echo $ligne[0];?></td>
                    <?php endif;?>
                </tr>
                <?php $i++; endwhile;?>

            </table>

            <br><br><br>
            <h1>Résultat des elections par parti politique:</h1>
            <table border="2">
                <legend>Nombre de sièges romportés au niveau National Par Parti Politique</legend>
                <tr>
                <?php 
                $query="SELECT nomParti from partipolitique";
                $res=mysqli_query($conn,$query);
                while($row=mysqli_fetch_array($res)):;
                    ?>
                    <th><?php echo $row[0];?></th>
                    <?php endwhile;?>
                </tr>
                <tr>
                    <?php for($i=0;$i<7;$i++):;?>
                    <td><?php echo $nbrsiege_parti[$i];?></td>
                    <?php endfor;?>
                </tr>
            </table>
        </article>
		
    </section>
	</div>
    <footer>
    	<div id="suivez_nous">
    		<h1> suivez nous </h1>
    		<p> <a href="https://www.facebook.com/isgtunis.officiel" class="lien_facebook" ><img src="images/facebook.png" alt="facebook isg" /></a></p>
    	</div>

    	<div id="mes_photos">
    		<h1> Photos de la chambre des représentants</h1>
    		<p><img src="images/parlement.jpg" alt="parlement" width="300"/><img src="images/photo.jpg" alt="barlamen" width="300"/><p>
    	</div>

    	<div id="liens_utiles">
    		<h1> liens_utiles </h1>
    		<div id="listes_liens">
	    		<ul>
	    			<li><a href="http://www.isie.tn/">instance superieure independante election tunisie. </a> </li>
	    			<li><a href="http://www.arp.tn/site/main/FR/docs/contact.jsp">Chambre de représentants du peuple tunisien.</a> </li>
	    		</ul>
    	  </div>
    	</div>

    </footer>

    </body>
</html> 