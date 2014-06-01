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

		$req = $bdd->query("DELETE FROM adherent WHERE NUM_ADHERENT='$modid'");

		
		header('location: adherents.php');
	}
	
?>