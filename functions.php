<?php

	function ConnexionBDD()
	{
		//CONNEXION BDD AVEC VARIABLES ENVIRONNEMENTS ($_ENV)
		$_ENV["connexion_bdd"] = mysql_connect ("localhost", "root", "") or die("Impossible de se connecter : " . mysql_error());

		// SELECTIONNER BDD
		mysql_select_db('hipic', $_ENV["connexion_bdd"]) or die ('Impossible de sélectionner la base de données : ' . mysql_error());
	}

	function DeconnexionBDD()
	{
		mysql_close($_ENV["connexion_bdd"]);
	}

	function ControleAccesUtilisateur($table,$url)
	{
		if (isset($_POST['login'])&&isset($_POST['pass']))
		{
			$passmd5 = md5($_POST["pass"]);
			$sql = "SELECT * FROM `".$table."` WHERE `ADRESSEMAIL` = '".mysql_real_escape_string($_POST["login"])."' AND `MOTDEPASS` = '".$passmd5."';";

			// ENVOI REQUETE SQL
			$retour_requete = mysql_query($sql) or die('Requête invalide : ' . mysql_error());

			//COMPTER NB RETOURS
			$nb_retours=mysql_num_rows($retour_requete);
			

			if($nb_retours!=1)
			{
				header ("Refresh: 15; ".$url);
				return false;
			}else
			{
				$_ENV["bdd_utilisateur"] = mysql_fetch_assoc($retour_requete,MYSQL_ASSOC);
				//session_start ();
				// on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
				$_SESSION['login'] = $_POST['login'];
				$_SESSION['passmd5'] = $passmd5;
				/*$_SESSION['passmd5'] = $_POST['$passmd5'];*/
				if ($table == 'adherent')
				{
					$type_user = 1;
					$id_user = $_ENV["bdd_utilisateur"]["NUM_ADHERENT"];
				}else
				{
					$type_user = 2;
					$id_user = $_ENV["bdd_utilisateur"]["NUMCENTRE"];
				}
				//RESULTAT SQL ARRAY
				return true; 
			}
		}else
		{
			return false;
		}
	}

?>