	<html>
	
		<head>
			<title>Ajout news</title>
			
			<link rel="stylesheet" href="style_ajout_news.css"/>
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
				<li><a href="index.php">Liste news</a></li>
		</div>
				
				
			<form method="post" action="bis_ajout_news.php">
				<br/>
				<br/>
				<center><fieldset><legend>Nouvelle news:</legend>
	
				<center><table></br>
			
					<tr><td> <label for="titre">Titre : *</label> </td><td> <input type="text" name="titre" id="titre" class="champ" required /> </td></tr>
					<tr><td> <label for="news">news : *</label> </td><td> <textarea name="news" rows="10" cols="70" id="news" class="champ" required></textarea> </td></tr>
				</table></center></br>
				
						<center><input type="submit" value="Ajouter" class="bouton"/></center>
						
				</fieldset></center>
				
				
			
			</form>
		
		</body>
		
	</html>
