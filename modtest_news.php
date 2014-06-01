<?php

	if (isset($_GET['modid']))
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
				$datenews = $donnees['DATENEWS'];
				$titre = $donnees['TITRE'];
				$news = $donnees['NEWS'];
				
				
	}
?>

<!DOCTYPE html>

	<html>
	
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>News</title>
			<link rel="icon" href="ffe.ico" />
			<link rel="stylesheet" href="css/style_inscription_a.css"/>
		</head>
	
		<body>
		
			
			<center><h1 style="text-transform: uppercase"><?php echo $titre; ?> </h1></center>
		
			<p>Message postée le :<?php echo $datenews; ?></p>
			
			
			<div align="center" style="border:1px solid #b98c5e; background: #EEEEEE; padding: 5px">
				<div align="center" style="font-weight: bold; background: #606060; color: #FFFFFF">News :</div>
					<div align="center" style="padding: 15px 0px;">
						<?php echo (ucfirst($news)); ?>
					</div>		
			</div>
			
			
		</body>
		
	</html>