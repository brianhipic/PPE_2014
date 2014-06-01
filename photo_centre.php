<?php

	header('content-type:image/jpg'); 
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

				$reponse = $bdd->query("SELECT * from centre WHERE NUMCENTRE='$modid'");
				$donnees = $reponse->fetch();
		echo $donnees['NOMFICHIERPHOTOCOUVERTURE'];
	}

	