	<html>
	
		<head>
			<title>Inscription adherant</title>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<link rel="shortcut icon" type="image/x-icon" href="img/ffe.ico" />
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
				<li><a href="index.php">Accueil</a></li>
				<li><a href="#">Qui sommes-nous ?</a>
					<ul>
						<li> <a href="presentation_ffe.php">Présentation </a> </li>
						<li> <a href="disciplines_ffe.php">Disciplines </a> </li>
						<li> <a href="missions_ffe.php">Missions </a> </li>
					</ul>
				</li>
				<li><a href="#"> Espace Membre</a>
						<ul>
							<li>
								<a href="connexion_adherent.php">Adhérent</a>
							</li>

							<li>
								<a href="connexion_centre.php">Centre</a>
							</li>
						</ul>
				</li>
				<li>
						<a href="#">Inscription</a>
						<ul>
								<li><a href="inscription_c.php">Centre</a></li>
						</ul>
				</li>
				<li>
						<a href="#"> Espace Admin</a>
						<ul>
							
										<li><a href="admin_news/index.php">gérer les news</a></li>
										<li><a href="admin_suppression/index.php">gérer les centres et les adhérents </a></li>
								
						</ul>
				</li>
			</ul>
		</div>
				<center><h1>Inscription Adhérant</h1></center>
				<center><p> * champ obligatoire </p></center>
				
			<form method="post" action="bis_inscription_a.php"  onsubmit="return verif()">
			
				<center><fieldset>

				<center><table></br>
			
					<tr><td> <label for="civilite">Civilité : *</label> </td><td> <select name="civilite" id="civilite"><option value="Mr">Mr</option><option value="Madame">Madame</option></select> </td></tr>
					<tr><td> <label for="nom">Nom : *</label> </td><td> <input type="text" name="nom" id="nom" class="champ" required /> </td></tr>
					<tr><td> <label for="prenom">Prenom : *</label> </td><td> <input type="text" name="prenom" id="prenom" class="champ" required/> </td></tr>
					<tr><td> <label for="naissance">Date naissance :</label> </td><td> <input type="text" name="naissance" id="naissance" class="champ"/> </td></tr>
					<tr><td> <label for="lieunaissance">Lieu de naissance :</label> </td><td> <input type="text" name="lieunaissance" id="lieunaissance" class="champ"/> </td></tr>
					<tr><td> <label for="galop">Galop : *</label> </td><td> <select name="galop" id="galop"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option></select> </td></tr>

				</table></center></br>

				</fieldset></center>

				</br>

				<center><fieldset><legend>Donnez votrez adresse :</legend>

				<center><table></br>

					<tr><td> <label for="rue">Rue : *</label> </td><td> <input type="text" name="rue" id="rue" class="champ" required /> </td></tr>
					<tr><td> <label for="cp">Code postal : *</label> </td><td> <input type="text" name="cp" id="cp" class="champ" required /> </td></tr>
					<tr><td> <label for="ville">Ville : *</label> </td><td> <input type="text" name="ville" id="ville" class="champ" required /> </td></tr>

				</table></center></br>

				</fieldset></center>

				</br>

				<center><fieldset><legend>Moyen de communication :</legend>

				<center><table></br>

					<tr><td> <label for="adressemail">Adresse mail : *</label> </td><td> <input type="email" name="adressemail" id="adressemail" class="champ" required /> </td></tr>
					<tr><td> <label for="telfix">Telephone fix :</label> </td><td> <input type="tel" name="telfix" id="telfix" class="champ"/> </td></tr>
					<tr><td> <label for="telport">Telephone portable :</label> </td><td> <input type="tel" name="telport" id="telport" class="champ"/> </td></tr>

				</table></center></br>

				</fieldset></center>

				</br>

				<center><fieldset><legend>Information pour le site :</legend>

				<center><table></br>

					<tr><td> <label for="motdepass">Mot de passe : *</label> </td><td> <input type="password" name="motdepass" id="motdepass" class="champ" required /> </td></tr>
					<tr><td> <label for="confirmotdepass">Confirmation du mot de passe : *</label> </td><td> <input type="password" name="confirmotdepass" id="confirmotdepass" class="champ" required /> </td></tr>

				</table></center></br>

				</fieldset></center>

				</br>

				<!--case a cocher pour enregistrer -->
				<center><a href="condition.php">Conditions générales d'utilisation</a></br>
				<input type="checkbox" name="case" id="case"/>Je confirme avoir pris connaissance des conditions </center>

				</br>

				<center> <input type="submit" value="Valider" class="bouton"/> </center>

				<script type="text/javascript">
				<!--
					function verif()
					{
						if (document.getElementById('case').checked)
						{
							return true;
						}
						else
						{
							alert ('Veuillez cocher la case de confirmation pour vous inscrire');
							return false;
						}
					}
				//-->
				</script>

			</form>
			<br />
			<!-- Debut: pied de page -->
		<div id="bloc_footer">
			<footer>
			<table border="0" width="100%" height="100%">
					<!--<td align="middle" width="33%">
					<img src="img/cheval_logo.png"  width="100" height="100"alt="cheval" id="logo_horse"/>
					</td> -->
					<td align="middle">
					<a href="plan_site.php" class="white_link">Plan du site</a>
					</td>
					<td align="middle">
					<a href="adresse.php">Adresse</a>
					</td>
					<td align="middle">
					<a href="contact.php">Contact</a>
					</td>
					
				</table>
			</footer>
		</div>
		<!-- Fin: pied de page -->
		</body>

	</html>
