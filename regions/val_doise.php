<!DOCTYPE html>
	<html lang="fr">
    <head>
        <title>Centres | Val D'oise</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<meta name="author" content="MALGOUYAT Julie,DA COSTA Brian,SCHOLTES Melody" />
			<link rel="shortcut icon" type="image/x-icon" href="../img/ffe.ico" />
		<link rel="stylesheet" href="../css/style_archive.css"/>
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
				<img src="../img/logo_hipic.png" width="178" height="101" alt="cheval" id="logo"/>
				<a href="https://twitter.com/FFEquitation" target="_blank"> <img src="../img/twitter.png" width="50" height="50" alt="tweet" id="icone1"/></a>
				<a href="https://www.facebook.com/FFEofficiel" target="_blank"> <img src="../img/fb.png"width="50" height="50" alt="Facebook" id="icone1"/></a>
			</header>
			<!--Fin en-tête de page-->
			<ul id="menu">
			<li><a href="../espace_adherent.php">Accueil adherent</a></li>
                
		</ul>
			<h1> <center> Liste de tous les centres equestres du val d'oise </center> </h1>
			
		<?php
					try
					{
						$bdd = new PDO('mysql:host=localhost;dbname=hipic', 'root', '');
					}

					catch (Exception $e)
					{
						die('Erreur :'.$e->getMessage());
					}
					
				$reponse = $bdd->query('SELECT * from centre where cpcentre like "95%"');
				
				echo '<center><table border="1"></center><tr><th>Nom du centre</th><th>Ville</th></th><th>voir</th></tr><tr>'; 

					while ($donnees = $reponse->fetch())
					{
						echo '<td>'.$donnees['NOMCENTRE'] . '</td><td>'.$donnees['VILLECENTRE'].'</td><td><a href=../modtest.php?modid='.$donnees['NUMCENTRE'].'><img  src="../img/loupe.png" alt="Modifier" width="25px" /></a></td>'.'</tr>';
						
					}

					echo '</tr></table >';
			
				$reponse->closeCursor();
		?>
		<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
		<!-- Debut: pied de page -->
		<div id="bloc_footer">
			<footer>
			<table border="0" width="100%" height="100%">
					<!--<td align="middle" width="33%">
					<img src="img/cheval_logo.png"  width="100" height="100"alt="cheval" id="logo_horse"/>
					</td> -->
					<td align="middle">
					<a href="../plan_site.php" class="white_link">Plan du site</a>
					</td>
					<td align="middle">
					<a href="../adresse.php">Adresse</a>
					</td>
					<td align="middle">
					<a href="../contact.php">Contact</a>
					</td>
				</table>
			</footer>
		</div>
		<!-- Fin: pied de page -->
	</body>

</html>