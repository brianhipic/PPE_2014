<!DOCTYPE html>
	<html lang="fr">
		<head>
			<title> Gestion Planning </title>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<meta name="author" content="MALGOUYAT Julie,DA COSTA Brian,SCHOLTES Melody" />
			<link rel="icon" href="img/ffe.ico"/>
			<link rel="stylesheet" href="css/gestion_planning.css"/>
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
			<div id="bloc_menu">
				<ul id="menu">
				<li>
					<a href="espace_centre.php">Accueil</a>
				</li>
				<li>
					<a href="#">Mon espace</a>
					<ul>
						<li> <a href="update_donnes_centre.php">modifier mes données</a> </li>
                        <li> <a href="delete_donnes_centre.php">supprimer mes données</a> </li>
					</ul>
				</li>
                
                <li>
					<a href="#">Gestion planning</a>
                    <ul>
						<li><a href="test_calendar/test_calendar.php">accès calendrier</a></li>
                  
                    </ul>
				</li>
		</ul>
		</div>
		<br />
			<center>
				<fieldset>
					<legend> Bienvenue sur la gestion du calendrier </legend>
					<p> Pour pouvoir utiliser l'api calendar, vous devez vous créer un compte google : <a href="https://accounts.google.com/SignUp?hl=fr" target="_blank" > Compte Google </a> </p>
					<p> Pour créer un calendrier, vous devez vous rendre ici : <a href="https://www.google.com/calendar/render" target="_blank" > Créer Calendrier </a> </p>
			</fieldset>
			</br>
			<form action="bis_gestion_calendrier.php" method="post">
				<p> Veuillez entrer l'<b><u>ID de votre calendrier</u></b>, ainsi que votre <b><u>adresse Gmail</u></b> et votre <b><u>mot de passe</u></b> : </p>
				<fieldset>
					
				<input type="text" name="idcalendar" id="idcalendar" class="champ" placeholder="ID de votre calendrier" maxlength="250" required />
				</br>
				<input type="text" name="login" id="login" class="champ" placeholder="Votre adresse Gmail" maxlength="250" required />
				</br>
				<input type="password" name="pass" id="pass" class="champ" placeholder="Votre mot de passe" maxlength="250" required />
				</br></br>
				<input type="submit" value="Valider" class="bouton">
				</fieldset>
				</br> </br>
				<a href="tuto_recuperer_idcalendar.pdf" target="_blank" > Comment récupérer l'ID de votre calendrier </a>
			</form>
			<br />
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

