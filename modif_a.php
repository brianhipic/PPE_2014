<html>
	<head>
		<title> Accès Adhérent </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="author" content="MALGOUYAT Julie,DA COSTA Brian,SHOLTES Melody" />
		<link rel="icon" href="img/ffe.ico"/>
		<link rel="stylesheet" href="css/style_session.css"/>
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
						<a href="#">Centres</a>
						<ul>
								<li><a href="regions/paris.php">75 PARIS</a></li>
                                <li><a href="regions/hauts_de_seine.php">92 HAUTS DE SEINE</a></li>
                                <li><a href="regions/val_doise.php">95 VAL D'OISE</a></li>
                                <li><a href="regions/seine_st_denis.php">93 SEINE SAINT DENIS</a></li>
                                <li><a href="regions/val_de_marne.php">94 VAL DE MARNE</a></li>
                                <li><a href="regions/essonnes.php">91 ESSONNES</a></li>
                                <li><a href="regions/yvelines.php">78 YVELINES</a></li>
                                <li><a href="regions/seine_et_marne.php">77 SEINE-ET-MARNE</a></li>
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
echo "Modification effectuée avec succès !";
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=hipic', 'root', '');
		}

		catch (Exception $e)
		{
			die('Erreur :'.$e->getMessage());
		}

		$req = $bdd->prepare("UPDATE adherent SET CIVILITE = :civilite, PRENOM = :prenom, NOM = :nom, RUE = :rue, CP = :cp, VILLE = :ville, NAISSANCE = :naissance, LIEUNAISSANCE = :lieunaissance, NIVEAU = :niveau, ADRESSEMAIL = :adressemail, TELFIX = :telfix, TELPORT = :telport WHERE NUM_ADHERENT='$modid'");

		$req->execute(array(
		'civilite' => $_POST['civilite'],
		'prenom' => $_POST['prenom'],
		'nom' => $_POST['nom'],
		'rue' => $_POST['rue'],
		'cp' => $_POST['cp'],
		'ville' => $_POST['ville'],
		'naissance' => $_POST['naissance'],
		'lieunaissance' => $_POST['lieunaissance'],
		'niveau' => $_POST['niveau'],
		'adressemail' => $_POST['adressemail'],
		'telfix' => $_POST['telfix'],
		'telport' => $_POST['telport']
		));


	}
	try
					{
						$bdd = new PDO('mysql:host=localhost;dbname=hipic', 'root', '');
					}

					catch (Exception $e)
					{
						die('Erreur :'.$e->getMessage());
					}

					$reponse = $bdd->query("SELECT * from adherent WHERE NUM_ADHERENT='$modid'");
					$donnees = $reponse->fetch();
					
					$civilite = $donnees['CIVILITE'];
					$prenom = $donnees['PRENOM'];
					$nom = $donnees['NOM'];
					$rue = $donnees['RUE'];
					$cp = $donnees['CP'];
					$ville = $donnees['VILLE'];
					$naissance = $donnees['NAISSANCE'];
					$lieunaissance = $donnees['LIEUNAISSANCE'];
					$niveau = $donnees['NIVEAU'];
					$adressemail = $donnees['ADRESSEMAIL'];
					$telfix = $donnees['TELFIX'];
					$telport = $donnees['TELPORT'];
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
		<center><h1>Modification de vos données :</h1></center>
	<form method="post" action="modif_a.php?modid=<?php echo $modid; ?>">
	
	<center><fieldset>

				<center><table></br>
			
					<tr><td> <label for="civilite">Civilité : *</label> </td>
					<td>
					<select name="civilite" id="civilite">
						<option value="Mr"<?php echo (($civilite === 'Mr') ? ' selected="selected"' : ''); ?>>Mr</option>
						<option value="Madame"<?php echo (($civilite === 'Madame') ? ' selected="selected"' : ''); ?>>Madame</option>
					</select>
					</td>
					</tr>
					<tr><td> <label for="nom">Nom : </label> </td><td> <input type="text" name="nom" id="nom" class="champ" value="<?php echo $nom; ?>" /> </td></tr>
					<tr><td> <label for="prenom">Prenom : </label> </td><td> <input type="text" name="prenom" id="prenom" class="champ" value="<?php echo $prenom; ?>"/> </td></tr>
					<tr><td> <label for="naissance">Date naissance :</label> </td><td> <input type="text" name="naissance" id="naissance" class="champ" value="<?php echo $naissance; ?>"/> </td></tr>
					<tr><td> <label for="lieunaissance">Lieu de naissance :</label> </td><td> <input type="text" name="lieunaissance" id="lieunaissance" class="champ" value="<?php echo $lieunaissance; ?>"/> </td></tr>
					<tr><td>
						<label for="niveau">Galop : *</label> 
					</td><td> 
						<select name="niveau" id="niveau">
							<option value="0"<?php echo (($niveau === '0') ? ' selected="selected"' : ''); ?>>0</option>
							<option value="1"<?php echo (($niveau === '1') ? ' selected="selected"' : ''); ?>>1</option>
							<option value="2"<?php echo (($niveau === '2') ? ' selected="selected"' : ''); ?>>2</option>
							<option value="3"<?php echo (($niveau === '3') ? ' selected="selected"' : ''); ?>>3</option>
							<option value="4"<?php echo (($niveau === '4') ? ' selected="selected"' : ''); ?>>4</option>
							<option value="5"<?php echo (($niveau === '5') ? ' selected="selected"' : ''); ?>>5</option>
							<option value="6"<?php echo (($niveau === '6') ? ' selected="selected"' : ''); ?>>6</option>
							<option value="7"<?php echo (($niveau === '7') ? ' selected="selected"' : ''); ?>>7</option>
						</select> 
					</td></tr>
					
			
				</table></center></br>
			
				</fieldset></center>

				</br>
				
				<center><fieldset><legend>Votre adresse :</legend>
	
				<center><table></br>
			
					<tr><td> <label for="rue">Rue : </label> </td><td> <input type="text" name="rue" id="rue" class="champ" value="<?php echo $rue; ?>" /> </td></tr>
					<tr><td> <label for="cp">Code postal : </label> </td><td> <input type="text" name="cp" id="cp" class="champ" value="<?php echo $cp; ?>" /> </td></tr>
					<tr><td> <label for="ville">Ville : </label> </td><td> <input type="text" name="ville" id="ville" class="champ" value="<?php echo $ville; ?>" /> </td></tr>
			
				</table></center></br>
			
				</fieldset></center>
				
				</br>
				
					<center><fieldset><legend>Moyen de communication :</legend>

				<center><table></br>
			
					<tr><td> <label for="adressemail">Adresse mail : </label> </td><td> <input type="email" name="adressemail" id="adressemail" class="champ" value="<?php echo $adressemail; ?>" /> </td></tr>
					<tr><td> <label for="telfix">Telephone fix :</label> </td><td> <input type="tel" name="telfix" id="telfix" class="champ" value="<?php echo $telfix; ?>"/> </td></tr>
					<tr><td> <label for="telport">Telephone portable :</label> </td><td> <input type="tel" name="telport" id="telport" class="champ" value="<?php echo $telport; ?>"/> </td></tr>
			
				</table></center></br>
			
				</fieldset></center>
				
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
