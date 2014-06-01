<html>
	<head>
				<title>liste centres</title>
		<link rel="stylesheet" href="index_admin.css" />
		<link rel="shortcut icon" type="image/x-icon" href="../img/ffe.ico" />
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
			
				<div id="bloc_menu">
			<ul id="menu">
				<li><a href="index.php">Liste des gestions</a></li>
			
		</div>
	
	<center><h1>Listes des centres equestres </h1></center>
	
	<?php
					try
					{
						$bdd = new PDO('mysql:host=localhost;dbname=hipic', 'root', '');
					}

					catch (Exception $e)
					{
						die('Erreur :'.$e->getMessage());
					}
					
				$reponse = $bdd->query('SELECT * from centre');
				
				echo '<center><table border="1"></center><tr><th>Numero Siret</th><th>Nom du centre</th><th>Adresse mail</th></th><th>supprimer</th></tr><tr>'; 

					while ($donnees = $reponse->fetch())
					{
						echo '<td>'.$donnees['NUMSIRET'] . '</td><td>'.$donnees['NOMCENTRE'].'</td><td>'.$donnees['EMAILCENTRE'].'</td><td><a href=modtest_c.php?modid='.$donnees['NUMCENTRE'].'><img  src="supprimer.ico" alt="supprimer" width="25px" /></a></td>'.'</tr>';
						
					}

					echo '</tr></table >';
			
				$reponse->closeCursor();
		?>
	
	</body>

</html>