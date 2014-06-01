	<?php
	//cette fonction permet d'afficher l'horaire par défaut de toutes les fonctions date/heure
	date_default_timezone_set('Europe/Paris');
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=hipic', 'root', '');
		}

		catch (Exception $e)
		{
			die('Erreur :'.$e->getMessage());
		}
		$req = $bdd->prepare('insert into news(ID_A, DATENEWS, TITRE, NEWS) values(:id_a, :date, :titre, :news)');

			$req->execute(array(
			'id_a' => 2,
			'date' => date("Y-m-d H:i:s"),
			'titre' => $_POST['titre'],
			'news' => $_POST['news']
		));

		//rediriger
		header('location: index.php');

	?>