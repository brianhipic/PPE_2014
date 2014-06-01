<html>

	<head>
		<title>Inscription centre</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="icon" href="img/ffe.ico" />
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
								<li><a href="inscription_a.php">Adhérent</a></li>
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
			<center><h1>Inscription Centre</h1></center>
			<center><p> * champ obligatoire </p></center>
			
		<form method="post" action="bis_inscription_c.php" onsubmit="return verif()">

			<center><fieldset>

			<center><table><br>
			
				<tr><td> <label for="nomc">Nom du centre : *</label> </td><td> <input type="text" name="nomc" id="nomc" class="champ" required /> </td></tr>
				<tr><td> <label for="rue">Adresse : *</label> </td><td> <input type="text" name="rue" id="rue" class="champ" required /> </td></tr>
				<tr><td> <label for="cp">Code postal : *</label> </td><td> <input type="text" name="cp" id="cp" class="champ" required /> </td></tr>
				<tr><td> <label for="ville">Ville : *</label> </td><td> <input type="text" name="ville" id="ville" class="champ" required /> </td></tr>
				<tr><td> <label for="num_siret">Numero de Siret : *</label> </td><td> <input type="text" name="num_siret" id="num_siret" class="champ" required/> </td></tr>
				
			</table></center><br>
			
			</fieldset></center>
			
			</br>
			
			<center><fieldset><legend>Moyen de communication :</legend>

				<center><table></br>
			
					<tr><td> <label for="adressemail">Adresse mail : *</label> </td><td> <input type="email" name="adressemail" id="adressemail" class="champ" required /> </td></tr>
					<tr><td> <label for="telfix">Telephone fix : *</label> </td><td> <input type="tel" name="telfix" id="telfix" class="champ" required /> </td></tr>
					<tr><td> <label for="telport">Telephone portable : *</label> </td><td> <input type="tel" name="telport" id="telport" class="champ" required /> </td></tr>
			
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
			
			<center><fieldset><legend>Cochez les disciplines praticables : *</legend>
			
				<p>
					<input type="checkbox" name="cours" id="cours" checked /> <label
					for="cours">Cours</label><br />
						
						<input type="checkbox" name="dressage" id="dressage" /> <label
					for="dressage">Dressage</label><br />
					
						<input type="checkbox" name="saut" id="saut" /> <label
					for="trec">Saut d'obstacle</label><br />
					
						<input type="checkbox" name="horse" id="horse" /> <label
					for="promenade">Horse-ball</label><br />
					
						<input type="checkbox" name="poney" id="poney" /> <label
					for="promenade">Poney-games</label><br />
					
					
						<input type="checkbox" name="trec" id="trec" /> <label
					for="promenade">Trec</label><br />
					
						<input type="checkbox" name="attelage" id="attelage" /> <label
					for="promenade">Attelage</label><br />
					
						<input type="checkbox" name="promenade" id="promenade" /> <label
					for="promenade">Promenade</label><br />
					
						<input type="checkbox" name="randonnees" id="randonnees" /> <label
					for="promenade">Randonnees</label><br />
					
					
						<input type="checkbox" name="concour" id="concour" /> <label
					for="promenade">Concour complet</label><br />
					
						<input type="checkbox" name="equifun" id="equifun" /> <label
					for="equifun">Equifun</label><br />
					
						<input type="checkbox" name="amazone" id="amazone" /> <label
					for="amazone">Amazone</label><br />
					
					<input type="checkbox" name="autre" id="autre" /> <label
					for="autre">Autre</label><br />
				</p>
				
			</fieldset></center><br>
			
			</br>
			
			<center><fieldset><legend>Detailler l'historique de votre club et vous présenter :</legend>
			
				<table><br>
					<tr><td> <label for="commentaire"></label> </td><td> <textarea name="commentaire" rows="10" cols="70"></textarea> </td></tr>
				</table>
				<br>
			</fieldset></center>
			
			</br>
			
			<center><fieldset><legend>Choisissez une photo de presentation de votre centre :</legend>
			<p>Au format .jpg</p>
				<table><br>
					 </td><td> <input type="file" name="photo" value="" size="50"/> </td></tr>
				</table><br>

			</fieldset></center>

			</br>
	
		
			
			<!--case a cocher pour enregistrer -->
			<center><a href="condition.php">Conditions générales d'utilisation</a></br>
			<input type="checkbox" name="case" id="case"/>Je confirme avoir pris connaissance des conditions</center>
			
			</br>
			
			<center> <input type="submit" value="Valider" class="bouton"/> </center>
			
			<script type="text/javascript">
				
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
				
				</script>
			
		</form>
		<br />
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
