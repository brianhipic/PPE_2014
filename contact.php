<html>

		<head>
		<title>Contact </title>
		<link rel="icon" href="ffe.ico" />
		<link rel="stylesheet" href="css/contact.css"/>
		
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
								<li><a href="inscription_c.php">Centre</a></li>
						</ul>
				</li>
			</ul>
		</div>
<br/>


		<form action ="#" method="post">
</br>
			<center><fieldset><legend>Pour recevoir des renseignements supplémentaires :</legend>
			
			<center><p> * champ obligatoire </p></center>

			<center><table><br>
			
				<tr><td> <label for="nom">Nom  : *</label> </td><td> <input type="text" name="nom" id="nom" class="champ" required /> </td></tr>
				<tr><td> <label for="prenom">Prenom : *</label> </td><td> <input type="text" name="prenom" id="prenom" class="champ" required /> </td></tr>
				<tr><td> <label for="email">E mail : *</label> </td><td> <input type="text" name="email" id="email" class="champ" required /> </td></tr>
				
				<tr><td> <label for="categorie"> Vous êtes  </label></td><td>
				
				<select name="categorie" id="civilite">
					<option value="autre" >autre </option>
					<option value="club" >Club</option>
					<option value="Organisateur de concours club/ponam" >Organisateur de concours club/ponam</option>
					<option value="Organisateur de concours amateur/pro" >Organisateur de concours amateur/pro</option>
					<option value="Compétiteur" >Compétiteur</option>
					<option value="Enseignant" >Enseignant</option>
					<option value="Officiel de compétition" >Officiel de compétition</option>
					<option value="Journaliste" >Journaliste</option>
					<option value="Cavalier" >Cavalier</option>
					<option value="Visiteur du site web" >Visiteur du site web</option>
				</select></td></tr>
				
				<tr><td> <label for="sujet">Sujet : *</label> </td><td> <input type="text" name="sujet" id="sujet" class="champ" required /> </td></tr>
				
			
				<tr><td><label for="commentaire"><div id="ecrit">Commentaire :*</label></div> </td><td> <textarea name="commentaire" id="commentaire" rows="10" cols="60" class="champ" required></textarea></td></tr>
			</table></center><br>
			<center> <input type="submit" value="valider" class="bouton"/> </center>
			</fieldset></center>
			
			
			
		</form>

	<br/>
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

<?php
if(isset($_POST['commentaire']))
		{
	$destinataire = "ffe-hipic@outlook.fr";

	$sujet = "demande de renseignement";

	$message ="nom de la personne : ".$_POST['nom']."\r\n"."prenom : ".$_POST['prenom']."\r\n"."adresse mail : ".$_POST['email']."\r\n"."categorie : ".$_POST['categorie']."\r\n"."sujet :".$_POST['sujet']."\r\n"."commentaire :".$_POST['commentaire'];

	/* fonction pour l'envoi d'email*/
	mail($destinataire,$sujet,$message);

		header('location: index.php');

	
}
?>
