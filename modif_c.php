<html>
	<head>
		<title> Accès Adhérent </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="author" content="MALGOUYAT Julie,DA COSTA Brian,SHOLTES Melody" />
		<link rel="icon" href="img/ffe.ico"/>
		<link rel="stylesheet" href="style_session.css" />
		
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
				<li><a href="espace_centre.php">Accueil centre</a></li>
                
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
	
	
	
		<?php

	if (isset($_GET['modid']) != 0)

	{
	
				$modid = $_GET['modid'];
	}
	
	if(isset($_POST['Valide']) === true && $_POST['Valide'] == 1)
{
echo "Modification effectuee avec succes !";

		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=hipic', 'root', '');
		}

		catch (Exception $e)
		{
			die('Erreur :'.$e->getMessage());
		}

		$req = $bdd->prepare("UPDATE centre SET NUMSIRET = :numsiret, NOMCENTRE = :nomcentre, ADRESSECENTRE = :adressecentre, CPCENTRE = :cpcentre, VILLECENTRE = :villecentre, EMAILCENTRE = :emailcentre, NOMFICHIERDESCRIPTION = :nomfichierdescription, TELPORT = :telport, TELFIX = :telfix WHERE NUMCENTRE='$modid'");

		$req->execute(array(
		
		'numsiret' => $_POST['num_siret'],
		'nomcentre' => $_POST['nomc'],
		'adressecentre' => $_POST['rue'],
		'cpcentre' => $_POST['cp'],
		'villecentre' => $_POST['ville'],
		'emailcentre' => $_POST['adressemail'],
		'nomfichierdescription' => $_POST['commentaire'],
		'telport' => $_POST['telport'],
		'telfix' => $_POST['telfix']
		));

		//---------------------------------------------- procedure
			
			function disciplines ($donnee, $valeur)
			{
			
				if (isset($_GET['modid']) != 0)
				{
	
					$modid = $_GET['modid'];
				}
			
				try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=hipic', 'root', '');
				}

				catch (Exception $e)
				{
					die('Erreur :'.$e->getMessage());
				}
				
				$req = $bdd->prepare('UPDATE proposer p, discipline d SET d.'.$donnee.' = :valeur
				WHERE p.ID_D = d.ID_D and NUMCENTRE='.$modid.'');

				$req->execute(array(
					'valeur' =>(($valeur ) ? 'oui' : 'non'),
				));
			}

			disciplines('cours', !empty($_POST['cours'])); 
			disciplines('dressage',!empty($_POST['dressage']));
			disciplines('saut_obstacle',!empty($_POST['saut']));
			disciplines('horse_ball',!empty($_POST['horse']));
			disciplines('poney_games',!empty($_POST['poney']));
			disciplines('trec',!empty($_POST['trec']));
			disciplines('attelage',!empty($_POST['attelage']));
			disciplines('promenade',!empty($_POST['promenade']));
			disciplines('randonnees',!empty($_POST['randonnee']));
			disciplines('concour_complet',!empty($_POST['concour']));
			disciplines('equifun',!empty($_POST['equifun']));
			disciplines('amazone',!empty($_POST['amazone']));
			disciplines('autre',!empty($_POST['autre']));
			
		//--------------------------------------------------------------------------------

		//$req = $bdd->prepare("UPDATE proposer p, discipline d SET d.DRESSAGE = :dressage WHERE p.ID_D = d.ID_D and NUMCENTRE='$modid'");

		//$req->execute(array(
		
		//'dressage' => $_POST['dressage']
		//));
		
			
		
	}
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
					$numsiret = $donnees['NUMSIRET'];
					$nomcentre = $donnees['NOMCENTRE'];
					$adressecentre = $donnees['ADRESSECENTRE'];
					$cpcentre = $donnees['CPCENTRE'];
					$villecentre = $donnees['VILLECENTRE'];
					$emailcentre = $donnees['EMAILCENTRE'];
					$nomfichierdescription = $donnees['NOMFICHIERDESCRIPTION'];
					$telport = $donnees['TELPORT'];
					$telfix = $donnees['TELFIX'];

			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=hipic', 'root', '');
			}

			catch (Exception $e)
			{
				die('Erreur :'.$e->getMessage());
			}
			
				$reponse = $bdd->query('SELECT * from proposer p, discipline d WHERE p.ID_D = d.ID_D and NUMCENTRE='.$modid.'');
				$donnees = $reponse->fetch();
				$cours = $donnees['COURS'];
				$dressage = $donnees['DRESSAGE'];
				$saut = $donnees['SAUT_OBSTACLE'];
				$horse = $donnees['HORSE_BALL'];
				$poney = $donnees['PONEY_GAMES'];
				$trec = $donnees['TREC'];
				$attelage = $donnees['ATTELAGE'];
				$promenade = $donnees['PROMENADE'];
				$randonnee = $donnees['RANDONNEES'];
				$concour = $donnees['CONCOUR_COMPLET'];
				$equifun = $donnees['EQUIFUN'];
				$amazone = $donnees['AMAZONE'];
				$autre = $donnees['AUTRE'];

	?>
	<!DOCTYPE html>
	<html>
	
		<head>
			<meta charset=UTF-8" />
			<title>Modification donnee</title>
			<link rel="icon" href="ffe.ico" />
			<link rel="stylesheet" href="css/style_inscription_a.css"/>
		</head>
	
		<body>
		<center><h1>Modification de vos donnees :</h1></center>
	<form method="post" action="modif_c.php?modid=<?php echo $modid; ?>">
	
	<center><fieldset>

				<center><table></br>
			
					<tr><td> <label for="nomc">Nom du centre : *</label> </td><td> <input type="text" name="nomc" id="nomc" class="champ" value="<?php echo $nomcentre; ?>" required /> </td></tr>
				<tr><td> <label for="rue">Adresse : *</label> </td><td> <input type="text" name="rue" id="rue" class="champ" value="<?php echo $adressecentre; ?>" required /> </td></tr>
				<tr><td> <label for="cp">Code postal : *</label> </td><td> <input type="text" name="cp" id="cp" class="champ" value="<?php echo $cpcentre; ?>" required /> </td></tr>
				<tr><td> <label for="ville">Ville : *</label> </td><td> <input type="text" name="ville" id="ville" class="champ" value="<?php echo $villecentre; ?>" required /> </td></tr>
				<tr><td> <label for="num_siret">Numero de Siret : *</label> </td><td> <input type="text" name="num_siret" id="num_siret" class="champ" value="<?php echo $numsiret; ?>" required/> </td></tr>
				
					
					
			
				</table></center></br>
			
				</fieldset></center>

				</br>
				
				<center><fieldset><legend>Moyen de communication :</legend>

				<center><table></br>
			
					<tr><td> <label for="adressemail">Adresse mail : *</label> </td><td> <input type="email" name="adressemail" id="adressemail" class="champ" value="<?php echo $emailcentre; ?>" required /> </td></tr>
					<tr><td> <label for="telfix">Telephone fix : *</label> </td><td> <input type="tel" name="telfix" id="telfix" class="champ" value="<?php echo $telfix; ?>" required /> </td></tr>
					<tr><td> <label for="telport">Telephone portable : *</label> </td><td> <input type="tel" name="telport" id="telport" class="champ" value="<?php echo $telport; ?>" required /> </td></tr>
			
				</table></center></br>
			
				</fieldset></center>
				
				</br>
				
					<center><fieldset><legend>Detailler l'historique de votre club et vous présenter :</legend>
			
				<table><br>
					<tr><td> <label for="commentaire"></label> </td><td> <textarea name="commentaire" rows="10"  cols="70"> <?php echo $nomfichierdescription; ?></textarea>  </td></tr>
				</table>
				<br>
			</fieldset></center>
			
			</br>
				
			<center><fieldset><legend>Cochez les disciplines praticables : *</legend>
			
				<p>
					<input type="checkbox" name="cours" id="cours" value="oui" <?php echo(($cours === 'oui') ? ' checked="checked"' : ''); ?> /> <label
					for="cours">Cours </label> <br />	
						
						<input type="checkbox" name="dressage" id="dressage" value="oui" <?php echo(($dressage === 'oui') ? ' checked="checked"' : ''); ?> /> <label
					for="dressage">Dressage</label><br />

					<input type="checkbox" name="saut" id="saut" value="oui" <?php echo(($saut === 'oui') ? ' checked="checked"' : ''); ?> /> <label
					for="saut">Saut d'obstacle</label><br />
					
					<input type="checkbox" name="horse" id="horse" value="oui" <?php echo(($horse === 'oui') ? ' checked="checked"' : ''); ?> /> <label
					for="horse">Horse ball</label><br />
					
					<input type="checkbox" name="poney" id="poney" value="oui" <?php echo(($poney === 'oui') ? ' checked="checked"' : ''); ?> /> <label
					for="poney">Poney games</label><br />
					
					<input type="checkbox" name="trec" id="trec" value="oui" <?php echo(($trec === 'oui') ? ' checked="checked"' : ''); ?> /> <label
					for="trec">Trec</label><br />
					
					<input type="checkbox" name="attelage" id="attelage" value="oui" <?php echo(($attelage === 'oui') ? ' checked="checked"' : ''); ?> /> <label
					for="attelage">Attelage</label><br />
					
					<input type="checkbox" name="promenade" id="promenade" value="oui" <?php echo(($promenade === 'oui') ? ' checked="checked"' : ''); ?> /> <label
					for="promenade">Promenade</label><br />
					
					<input type="checkbox" name="randonnee" id="randonnee" value="oui" <?php echo(($randonnee === 'oui') ? ' checked="checked"' : ''); ?> /> <label
					for="randonnee">Randonnées</label><br />
					
					<input type="checkbox" name="concour" id="concour" value="oui" <?php echo(($concour === 'oui') ? ' checked="checked"' : ''); ?> /> <label
					for="concour">Concour</label><br />
					
					<input type="checkbox" name="equifun" id="equifun" value="oui" <?php echo(($equifun === 'oui') ? ' checked="checked"' : ''); ?> /> <label
					for="equifun">Equifun</label><br />
					
					<input type="checkbox" name="amazone" id="amazone" value="oui" <?php echo(($amazone === 'oui') ? ' checked="checked"' : ''); ?> /> <label
					for="amazone">Amazone</label><br />
					
					<input type="checkbox" name="autre" id="autre" value="oui" <?php echo(($autre === 'oui') ? ' checked="checked"' : ''); ?> /> <label
					for="autre">Autre</label><br />

			</fieldset></center><br>
			
			</br>
				
			<center><input type="submit" value="Ajouter" name ="Ajouter" class="bouton"/></center>
			</fieldset></center>
			
			
			
			
			<input type="hidden" name="modid" value="<?php echo $modid; ?>">
			<input type="hidden" name="Valide" value="1">
		</form>
		</body>
	</html>
	</div>
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
</body>

</html>
