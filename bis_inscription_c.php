	<?php

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
				$req = $bdd->prepare('insert into centre (NUMCENTRE, ID_A, NUMSIRET, NOMCENTRE, ADRESSECENTRE, CPCENTRE, VILLECENTRE, EMAILCENTRE, NOMFICHIERDESCRIPTION, NOMFICHIERPHOTOCOUVERTURE, TELPORT, TELFIX, MOTDEPASS) 
				values(:numcentre, :id_a, :num_siret, :nomcentre, :adressecentre, :cpcentre, :villecentre, :emailcentre, :nomfichier, :nomfichierphoto, :telport, :telfix, :modepass)');
				
				//var_dump($_POST);
				//var_dump($_FILES);
				//die(__FILE__.__LINE__);
				
				$req->execute(array(
				
				'numcentre' => $numcentre,
				'id_a' => 1,
				'num_siret' => $_POST['num_siret'],
				'nomcentre' => $_POST['nomc'],
				'adressecentre' => $_POST['rue'],
				'cpcentre' => $_POST['cp'],
				'villecentre' => $_POST['ville'],
				'emailcentre' => $_POST['adressemail'],
				'nomfichier' => $_POST['commentaire'],
				'nomfichierphoto' => $_POST['photo'],
				'nomfichierphoto' => $_FILES['photo'],
				'telport' => $_POST['telport'],
				'telfix' => $_POST['telfix'],
				'modepass' => $passmd5
				));
				
					$reponse = $bdd->query('select max(NUMCENTRE) as numcentre from centre ;');
				//var_dump($reponse);
				$donnees = $reponse->fetch();
				//var_dump($donnees);
				$numcentre = $donnees['numcentre'];
				//var_dump($numcentre);
				
				 //die(__FILE__.__LINE__);
				

				$req = $bdd->prepare('insert into discipline(ID_D, COURS, DRESSAGE, SAUT_OBSTACLE, HORSE_BALL, PONEY_GAMES, TREC, ATTELAGE, PROMENADE, RANDONNEES, CONCOUR_COMPLET, EQUIFUN, AMAZONE, AUTRE) 
				values(:id, :cours, :dressage, :saut, :horse, :poney, :trec, :attelage, :promenade, :randonnees, :concour, :equifun, :amazone, :autre)');

				$req->execute(array(
				'id' => $id,
				'cours' => $_POST['cours'],
				'dressage' => $_POST['dressage'],
				'saut' => $_POST['saut'],
				'horse' => $_POST['horse'],
				'poney' => $_POST['poney'],
				'trec' => $_POST['trec'],
				'attelage' => $_POST['attelage'],
				'promenade' => $_POST['promenade'],
				'randonnees' => $_POST['randonnees'],
				'concour' => $_POST['concour'],
				'equifun' => $_POST['equifun'],
				'amazone' => $_POST['amazone'],
				'autre' => $_POST['autre']
				));

				$reponse = $bdd->query('select max(id_d) as id from discipline ;');
				//var_dump($reponse);
				$donnees = $reponse->fetch();
				//var_dump($donnees);
				$id = $donnees['id'];
				//var_dump($id);
				
				//die(__FILE__.__LINE__);
				
				$req = $bdd->prepare('insert into proposer(ID_D, NUMCENTRE) 
				values (:id, :numcentre)');
		
				$req->execute(array(
				'id' => $id,
				'numcentre' => $numcentre
				));
				
			//---------------------------------------------- procedure disciplines 
			
			function disciplines ($donnee, $valeur)
			{
				try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=hipic', 'root', '');
				}

				catch (Exception $e)
				{
					die('Erreur :'.$e->getMessage());
				}
				
				$req = $bdd->prepare('UPDATE discipline set '.$donnee.' = :valeur
									WHERE '.$donnee.' is null');

				$req->execute(array(
					'valeur' => $valeur,
				));
			}

			disciplines('cours', 'non'); // la rendre dynamique
			disciplines('dressage', 'non');
			disciplines('saut_obstacle', 'non');
			disciplines('horse_ball', 'non');
			disciplines('poney_games', 'non');
			disciplines('trec', 'non');
			disciplines('attelage', 'non');
			disciplines('promenade', 'non');
			disciplines('randonnees', 'non');
			disciplines('concour_complet', 'non');
			disciplines('equifun', 'non');
			disciplines('amazone', 'non');
			disciplines('autre', 'non');
			
			
			function disciplines_on ($donnee, $valeur)
			{
				try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=hipic', 'root', '');
				}

				catch (Exception $e)
				{
					die('Erreur :'.$e->getMessage());
				}
				
				$req = $bdd->prepare('UPDATE discipline set '.$donnee.' = :valeur
									WHERE '.$donnee.' = "on"');

				$req->execute(array(
					'valeur' => $valeur,
				));
			}
			
			disciplines_on('cours', 'oui'); 
			disciplines_on('dressage', 'oui');
			disciplines_on('saut_obstacle', 'oui');
			disciplines_on('horse_ball', 'oui');
			disciplines_on('poney_games', 'oui');
			disciplines_on('trec', 'oui');
			disciplines_on('attelage', 'oui');
			disciplines_on('promenade', 'oui');
			disciplines_on('randonnees', 'oui');
			disciplines_on('concour_complet', 'oui');
			disciplines_on('equifun', 'oui');
			disciplines_on('amazone', 'oui');
			disciplines_on('autre', 'oui');
			
			//--------------------------------------------------------------------------------
		
				header('location: confirmation_c.php');
		
			} 
			
			else 
			{
				echo("Veuillez saisir de nouveau votre mot de passe");
			}
		
		
	?>