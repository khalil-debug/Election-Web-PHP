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
    	
		<div id="banniere_description"><a href="#" class="bouton_rouge" >Emplois du temps <img src="images/flecheblanchedroite.png" alt="" /></a>
	    </div>
    </div>
    
    <section id="section"> 
        <article>
            <h1>Bienvenu <?php 
                session_start();
                $ID= $_SESSION["pseudo"];
                echo "$ID.";
            ?>

            </h1>
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