<?php
$host="localhost";
$user="root";
$pass="";
$db="election";

$conn= mysqli_connect($host,$user,$pass,$db);

$query="SELECT * from gouvernorat";
$res=mysqli_query($conn,$query);


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
    			<li><a href="acceuil.php">ACCEUIL </a> </li>
    			<li><a href="inscription.php"> S'INSCRIRE </a></li>
    			<li><a href="auth.php"> S'AUTHENTIFIER </a> </li>
    		</ul>
    	</nav>

    </header>

    <div id="banniere-image"> <!-- bannière -->
    	
		<div id="banniere_description"><a href="#" class="bouton_rouge" >Emplois du temps <img src="images/flecheblanchedroite.png" alt="" /></a>
	    </div>
    </div>
    
    <section id="section"> 
        <article>
            <h1>Page d'inscription Aux Elections</h1>
            <p> il s'agit d'une inscription anonyme, aucune information personnelle consernent l'électeur ne pourra etre fournie.</p>
            <form name='formIns' method='POST' action="insert.php">
            <fieldset>

                <legend>informations générales </legend>

                <label for='pseudo'>Pseudo :</label>   
                <input type='text' name='pseudo' id='pseudo' placeholder='Nom d utilisateur...' size='30' maxlength='40'>

                <br><br><label for='mdp'>Mot de Passe: </label>
                <input type='password' name='mdp' id='mdp' size='30' placeholder='Mot de Passe...' maxlength='40'> <br>
                <br><label for='age'>Age: </label>
                <input type='number' name='age' id='age' size='5' placeholder="Age..." maxlength='10'><br>   
                <br><label for='gov'>Votre Gouvernorat: </label>
                <select name='gov' id='gov'> 
                    <?php
                        while($row=mysqli_fetch_array($res)):;
                    ?>
                    <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
                    <?php endwhile;?>
                </select>
                </fieldset>
                <input type="submit" name="reg" value="S'inscrire." onclick="">


                <input type='button' value='annuler.' onclick="location.href='acceuil.php'">
            </form>
        <article>
		
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

    <script src="inter.js"></script>
    </body>
</html> 