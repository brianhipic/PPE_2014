	<?php

	if (isset($_GET['modid']) != 0)

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

					$reponse = $bdd->query("SELECT * from news WHERE ID='$modid'");
					$donnees = $reponse->fetch();
					$titre = $donnees['TITRE'];
					$news = $donnees['NEWS'];
	}

	if(isset($_POST['Valide']) === true && $_POST['Valide'] == 1)
{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=hipic', 'root', '');
		}

		catch (Exception $e)
		{
			die('Erreur :'.$e->getMessage());
		}

		$req = $bdd->prepare("UPDATE news SET TITRE = :titre, NEWS = :news WHERE ID='$modid'");

		$req->execute(array(
		'titre' => $_POST['titre'],
		'news' => $_POST['news']
		));

		header('location: index.php');

	}
	
	?>
	<!DOCTYPE html>
	<html>
	
		<head>
			<meta charset=UTF-8" />
			<title>Modification news</title>
			<link rel="shortcut icon" type="image/x-icon" href="../img/ffe.ico" />
			<link rel="stylesheet" href="style_ajout_news.css"/>
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
				<li><a href="index.php">Liste news</a></li>
		</div>
			
		<center><h1>Modification de la news :</h1></center>
	<form method="post" action="#">
	
		<center><fieldset>

				<center><table></br>
			
					<tr><td> <label for="titre">Titre : *</label> </td><td> <input type="text" name="titre" id="titre" class="champ" value="<?php echo $titre; ?>" /> </td></tr>
					<tr><td><label for="news"><div id="news">News</label> :</div> </td><td> <textarea name="news" id="news"rows="10" cols="50"><?php echo $news; ?></textarea></td></tr>
			
				</table></center></br>
			
				</fieldset></center>
				
				</br>
				
			<center><input type="submit" value="Ajouter" class="bouton"/></center>
			</fieldset></center>
			
			<input type="hidden" name="modid" value="<?php echo $modid; ?>">
			<input type="hidden" name="Valide" value="1">
	</form>
		
		</body>
		
	</html>