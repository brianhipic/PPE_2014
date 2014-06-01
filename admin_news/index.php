<html>

	<head>
		<title> Accueil </title>
		
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
				<li><a href="../index.php">Accueil site HIPIC</a></li>
				<li><a href="ajout_news.php">Ajouter une news</a>
					
		</div>
		<center><h1> bienvenue dans la gestion de vos news </h1></center>
	
	
		
		<center><h1>Liste des news</h1></center>

				<?php

					try
					{
						$bdd = new PDO('mysql:host=localhost;dbname=hipic', 'root', '');
					}

					catch (Exception $e)
					{
						die('Erreur :'.$e->getMessage());
					}
			
					$reponse = $bdd->query('SELECT * from news');


					echo '<center><table border="1"></center><tr><th>Date</th><th>titre</th></th><th>news</th></th><th>modifier</th><th>supprimer</th></tr><tr>'; 

					while ($donnees = $reponse->fetch())
					{
						echo '<td>'.$donnees['DATENEWS'] . '</td><td>'.$donnees['TITRE'].'</td><td>'.$donnees['NEWS'].'</td><td><a href=modif_news.php?modid='.$donnees['ID'].'><img  src="mod.ico" alt="Modifier" width="25px" /></a></td>'.'<td><a href=supp_news.php?modid='.$donnees['ID'].'><img  src="supprimer.ico" alt="Modifier" width="25px" /></a></td>'.'</tr>';
					}

					echo '</tr></table >';
			
					$reponse->closeCursor();

				?>
	</body>
	
</html>