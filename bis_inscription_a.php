<?php
	if(isset($_POST['civilite']) && isset($_POST['prenom']) && isset($_POST['rue']) && isset($_POST['cp']) && isset($_POST['ville']) && isset($_POST['naissance']) && isset($_POST['galop']) && isset($_POST['nom']) && isset($_POST['lieunaissance']) && isset($_POST['adressemail']) && isset($_POST['telfix']) && isset($_POST['telport']) && isset($_POST['motdepass']) && isset($_POST['confirmotdepass']))
	{
		if($_POST['motdepass'] == $_POST['confirmotdepass'])
		{
			$destinataire = $_POST['adressemail'];
			$sujet = "confirmation";
			$message = "Votre compte a bien été enregistré"."\r\n"."votre login : ".$_POST['adressemail']."\r\n"."votre mot de passe : ".$_POST['motdepass'];

		/* fonction pour l'envoi d'email*/
		/*(mail($destinataire,$sujet,$message));*/

			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=hipic', 'root', '');
			}
			catch (Exception $e)
			{
				die('Erreur :'.$e->getMessage());
			}

			$passmd5 = md5($_POST["motdepass"]);
			$req = $bdd->prepare('insert into adherent(ID_A, CIVILITE, PRENOM, NOM, RUE, CP, VILLE, NAISSANCE, LIEUNAISSANCE, NIVEAU, ADRESSEMAIL, MOTDEPASS, TELPORT, TELFIX) values(:id_a, :civilite, :prenom, :nom, :rue, :cp, :ville, :naissance, :lieunaissance, :niveau, :adressemail, :motdepass, :telport, :telfix)');
			$req->execute(array(
				'id_a' => 1,
				'civilite' => $_POST['civilite'],
				'prenom' => $_POST['prenom'],
				'nom' => $_POST['nom'],
				'rue' => $_POST['rue'],
				'cp' => $_POST['cp'],
				'ville' => $_POST['ville'],
				'naissance' => $_POST['naissance'],
				'lieunaissance' => $_POST['lieunaissance'],
				'niveau' => $_POST['galop'],
				'adressemail' => $_POST['adressemail'],
				'motdepass' => $passmd5,
				'telport' => $_POST['telport'],
				'telfix' => $_POST['telfix']
				));

			header('location: confirmation_a.php');
		} 
		else 
		{
			echo("Veuillez saisir de nouveau votre mot de passe");
		}

	}
?>