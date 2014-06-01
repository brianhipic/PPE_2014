<?php
	session_start();
	if(isset($_POST['idcalendar']) && isset($_POST['login']) && isset($_POST['pass']) && isset($_SESSION['login']))
	{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=hipic', 'root', '');
		}
		catch (Exception $e)
		{
			die('Erreur :'.$e->getMessage());
		}
		$email= $_SESSION['login'];
		
		$req = $bdd->prepare('select NUMCENTRE from centre where EMAILCENTRE= :email');
		$tab = array('email'=> $email);
		$req->execute ($tab);
		$donnees = $req->fetch();
		$numcentre = $donnees['NUMCENTRE'];
		
		$req = $bdd->prepare('INSERT INTO calendar(ID_CALENDAR,NUMCENTRE, LOGIN, PASSWORD, EMAIL_LOGIN) VALUES (:idcalendar,:numcentre, :login, :pass, :email)');

		$email= $_SESSION['login'];
		$tab = array
		(
			'idcalendar' => $_POST['idcalendar'],
			'numcentre'=> $numcentre,
			'login' => $_POST['login'],
			'pass' => $_POST['pass'],
			'email'=> $email
		);
		$req->execute($tab);
		header('location: confirmation_gestion_calendrier.php');
	}
	else 
	{
		echo("Erreur : veuillez saisir à nouveau vos données");
	}
?>