<?php

	if (isset($_GET['modid']))
	{
	
		$modid = $_GET['modid'];

		
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=hipic', 'root', '');
			}

			catch (Exception $e)
			{
				die('Erreur :'.$e->getMessage());
			}

				$reponse = $bdd->query("SELECT * from centre WHERE NUMCENTRE='$modid'");
				$donnees = $reponse->fetch();
				$nom = $donnees['NOMCENTRE'];
				$mail = $donnees['EMAILCENTRE'];			
	}
?>

<html>

	<head>
		<title>supprimer compte </title>
		<link rel="icon" href="img/ffe.ico"/>
		<link rel="stylesheet" href="css/style_inscription_a.css"/>
		<script type="text/javascript">
				<!--
				sfHover = function() 
				{
					var sfEls = document.getElementById("menu").getElementsByTagName("LI");
					for (var i=0; i<sfEls.length; i++)
					{
						sfEls[i].onmouseover=function() 
						{
							this.className+=" sfhover";
						}
						sfEls[i].onmouseout=function() 
						{
							this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
						}
					}
				}
				if (window.attachEvent) window.attachEvent("onload", sfHover);
				-->
			</script>
	</head>

	<body>
		<!--Debut en-tête de page-->
			<header>
				<img src="img/logo_hipic.png" width="178" height="101" alt="cheval" id="logo"/>
				<a href="https://twitter.com/FFEquitation" target="_blank"> <img src="img/twitter.png" width="50" height="50" alt="tweet" id="icone1"/></a>
				<a href="https://www.facebook.com/FFEofficiel" target="_blank"> <img src="img/fb.png"width="50" height="50" alt="Facebook" id="icone1"/></a>

			</header>
			<!--Fin en-tête de page-->
			<div id="bloc_menu">
			<ul id="menu">
				<li><a href="espace_adherent.php">Accueil adherent</a></li>
				<li>
					<a href="#">Gestion planning</a>
                    <ul>
                      
                      <li><a href="gestion_calendrier.php">créer planning</a></li>
					  <li><a href="test_calendar/test_calendar.php">accès calendrier</a></li>
                  
                    </ul>
				</li>
			</ul>
		</div>
		<br /><br /><br /><br /><br />
	<div id="formulaire_adh">
	<center><p> Afin de supprimer votre compte, merci de remplir ce formulaire. Une fois le formulaire rempli, l'administrateur du site supprimera votre compte. </p></center>
		<form action ="#" method="post">
</br>
			<center><fieldset><legend>Se désinscrire</legend>
			
			<p>Votre nom : <?php echo $nom; ?></p>
			<p>Votre adresse mail : <?php echo $mail; ?></p>

			<center><table><br>

			<tr><td><label for="commentaire"><div id="commentaire">Pourquoi voulez vous supprimer votre compte :*</label></div> </td><td> <textarea name="commentaire" id="commentaire" rows="10" cols="60" class="champ" required></textarea></td></tr>
			
			</table></center><br>
			<center> <input type="submit" value="valider" class="bouton"/> </center>
			</fieldset></center>
			
		</form>

	</body>
<!-- Debut: pied de page -->
		<div id="bloc_footer">
			<footer>
				<table border="0" width="100%" height="100%">
					<!--<td align="middle" width="33%">
					<img src="img/cheval_logo.png"  width="100" height="100"alt="cheval" id="logo_horse"/>
					</td> -->
					<td>
					<a href="plan_site.php" class="white_link">Plan du site</a>
					</td>
					<td>
					<a href="adresse.php">Adresse</a>
					</td>
					<td>
					<a href="contact.php">Contact</a>
					</td>
				</table>
			</footer>
		</div>
		<!-- Fin: pied de page -->
</html>
<?php
if(isset($_POST['commentaire']))
		{
	$destinataire = "ffe-hipic@outlook.fr";

	$sujet = "suppression compte centre";

	$message =$nom."\r\n".$prenom."\r\n".$mail."\r\n".$_POST['commentaire'];

	/* fonction pour l'envoi d'email*/
	mail($destinataire,$sujet,$message);

		header('location: espace_centre.php');

	
}
?>


