<?php

	// fonction ConnexionBDD()
	function ConnexionBDD()
	{
		// connexion de la base de données avec des variables environnements ($_ENV)
		$_ENV["connexion_bdd"] = mysql_connect ("localhost", "root", "") or die("Impossible de se connecter : " . mysql_error());

		// selection de la base de données
		mysql_select_db('hipic', $_ENV["connexion_bdd"]) or die ('Impossible de sélectionner la base de données : ' . mysql_error());
	}

	// fonction DeconnexionBDD()
	function DeconnexionBDD()
	{
		mysql_close($_ENV["connexion_bdd"]);
	}

	// fonction ControleAccesUtilisateur
	function ControleAccesUtilisateur($table,$url)
	{
		if (isset($_POST['login'])&&isset($_POST['pass']))
		{
			$passmd5 = md5($_POST["pass"]);
			$sql = "SELECT * FROM `".$table."` WHERE `EMAILCENTRE` = '".mysql_real_escape_string($_POST["login"])."' AND `MOTDEPASS` = '".$passmd5."';";

			// envoi de la requête SQL
			$retour_requete = mysql_query($sql) or die('Requête invalide : ' . mysql_error());

			// compte le nombre de retours
			$nb_retours=mysql_num_rows($retour_requete);
			

			if($nb_retours!=1)
			{
				header ("Refresh: 15; ".$url);
				return false;
			}else
			{
				
				///////////////////////////////////////////////////
				session_start ();
				// on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
				$_SESSION['login'] = $_POST['login'];
				$_SESSION['passmd5'] = $passmd5;
				///////////////////////////////////////////////////
				$_ENV["bdd_utilisateur"] = mysql_fetch_assoc($retour_requete,MYSQL_ASSOC);
				
				if ($table == 'adherent')
				{
					$type_user = 1;
					$id_user = $_ENV["bdd_utilisateur"]["NUM_ADHERENT"];
				}else
				{
					$type_user = 2;
					$id_user = $_ENV["bdd_utilisateur"]["NUMCENTRE"];
				}
				$time = microtime(true);
				$token = md5($time);
				setcookie("token",$token,time()+12*60*60);
				$sql_token = "INSERT INTO `auth` (`TOKEN`,`TIMESTAMP`,`ADRESSE_IP`,`USER_AGENT`,`ID_USER`,`TYPE_USER`) values ('".$token."','".(time()+12*60*60)."','".$_SERVER['REMOTE_ADDR']."','".$_SERVER['HTTP_USER_AGENT']."','".$id_user."','".$type_user."');";
				mysql_query($sql_token);
				
				//résultat du SQL sous forme de tableau ARRAY
				
				return true; 
			}
		}elseif (isset($_COOKIE["token"]))
		{
			$sql_token = "SELECT * FROM `auth` WHERE 
				token = '".mysql_real_escape_string($_COOKIE['token'])."' 
				AND 
				`timestamp` > '".time()."' 
				AND
				`ADRESSE_IP` = '".$_SERVER['REMOTE_ADDR']."'
				AND
				`USER_AGENT` = '".$_SERVER['HTTP_USER_AGENT']."'
				";

			$retour_requete = mysql_query($sql_token);
			$nb_token = mysql_num_rows($retour_requete);
	
			if($nb_token==1)
			{
				$bdd_token = mysql_fetch_assoc($retour_requete,MYSQL_ASSOC);
				$id_user = $bdd_token["ID_USER"];
				$type_user = $bdd_token["TYPE_USER"];
				
				if ($type_user == 1)
				{
					$champ = "NUM_ADHERENT";
					if ($table != 'adherent')
						return false;
				}else
				{
					$champ = "NUMCENTRE";
					if ($table != 'centre')
						return false;
				}
				$sql = "SELECT * FROM `".$table."` WHERE `".$champ."` = '".(int)$id_user."';";
				$retour_requete = mysql_query($sql);
				$_ENV["bdd_utilisateur"] = mysql_fetch_assoc($retour_requete,MYSQL_ASSOC);
				
				return true;
			}else
				return false;
		}else
		{
			return false;
		}
	
	}

?>