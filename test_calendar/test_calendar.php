<?php
	
	/////////////////////////////////////////////////////////////////////////
	//    _____             __ _                       _   _               //
	//   / ____|           / _(_)                     | | (_)              //
	//  | |     ___  _ __ | |_ _  __ _ _   _ _ __ __ _| |_ _  ___  _ __    //
	//  | |    / _ \| '_ \|  _| |/ _` | | | | '__/ _` | __| |/ _ \| '_ \   //
	//  | |___| (_) | | | | | | | (_| | |_| | | | (_| | |_| | (_) | | | |  //
	//   \_____\___/|_| |_|_| |_|\__, |\__,_|_|  \__,_|\__|_|\___/|_| |_|  //
	//                            __/ |                                    //
	//                           |___/                                     //
	/////////////////////////////////////////////////////////////////////////
	session_start ();
	require_once './googleapi/Google_Client.php';
	require_once './googleapi/contrib/Google_CalendarService.php';
	
	// Créer :		API & Auth > Credentials > CREATE NEW CLIENT ID (web application)
	// ------------------------------------------------------------------------------
	// Récupérer :	API & Auth > Credentials > OAuth > Client ID
	   $CLIENT_ID = "982158665414-b575ffke8gl9r7ofmngcrb3d6gmll3n0.apps.googleusercontent.com";
					 
	// Récupérer :	API & Auth > Credentials > OAuth > Client secret
	   $CLIENT_SECRET = "liNcDJz7TZHNyd1RRqJNvPxG";
	// Récupérer :	API & Auth > Credentials > OAuth > Redirect URIs
	// ----> Les URIs doivent correspondre au script et au domaine d'utilisation, sinon erreur.(utile uniquement pour la première fois)
	   $URI = "http://localhost/test_calendar";
	
	// Configurer :	API & Auth > Consent screen
	// ----------------------------------------
	// /!\ Définir l'adresse mail dans consent screen pour éviter une erreur.
	// Récupérer :	API & Auth > Consent screen > Product name
	   $PRODUCT_NAME = "testcal";
	
	
	//Id de notre calendar
	function selectIdCalendar ($email)
	{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=hipic', 'root', '');
		}

		catch (Exception $e)
		{
			die('Erreur :'.$e->getMessage());
		}

		$reponse = $bdd->prepare('select ID_CALENDAR  from CALENDAR where EMAIL_LOGIN = :email ;');
		$reponse ->execute(array("email"=>$email));
		//var_dump($reponse);
		$donnees = $reponse->fetchAll(PDO::FETCH_ASSOC);
		//var_dump($donnees);
		if (isset($donnees[0]['ID_CALENDAR']))
		return $donnees[0]['ID_CALENDAR'];
		return "";
	}
	if (!isset($_SESSION['login']))
	{
		$email ="";
		echo "<br/> Erreur, aucun Id calendar n'a été trouvé pour votre centre : ".$_SESSION['login'];
		header('refresh :3; ../index.php');
	}
	else{
	$email = $_SESSION['login'];
	$calendar_id=selectIdCalendar($email);
	if (empty($calendar_id))
	{
	echo "<br/> Erreur, aucun Id calendar n'a été trouvé pour votre centre : ".$_SESSION['login'];
		header('refresh :3; ../espace_centre.php');
	}
 else {

//"hju6vpf7lvg9g1rgo19gh2r9q4@group.calendar.google.com";
				/*try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=centre', 'root', '');
				}
				catch (Exception $e)
				{
					die('Erreur :'.$e->getMessage());
				}
				$requete = "SELECT ID_CALENDAR FROM calendar WHERE login = :login;";

				$clause = array (":login"=>$login);

				$resultat = $dbh->prepare($requete);

				$resultat->execute($clause);

				$sortie = $resultat->fetchAll(PDO::FETCH_ASSOC);
	
	
	$calendar_id = $sortie['ID_CALENDAR']*/ ;//"hju6vpf7lvg9g1rgo19gh2r9q4@group.calendar.google.com";
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// FIN DE LA CONFIGURATION //////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	
	
	
	
	////////////////////////////////////////////////////
	//   ______               _   _                   //
	//  |  ____|             | | (_)                  //
	//  | |__ ___  _ __   ___| |_ _  ___  _ __  ___   //
	//  |  __/ _ \| '_ \ / __| __| |/ _ \| '_ \/ __|  //
	//  | | | (_) | | | | (__| |_| | (_) | | | \__ \  //
	//  |_|  \___/|_| |_|\___|\__|_|\___/|_| |_|___/  //
	//                                                //
	////////////////////////////////////////////////////
	
	function EchoVar( $name, $tb )
	// Permet d'afficher un tableau recursivement(contrairement à var_dump)
	{
		echo "<br /><hr /><b>".$name."</b>";
		echo str_replace( array(" ","\r","\n","\t"),array("&nbsp;","","<br />","&nbsp;&nbsp;&nbsp;"),print_r( $tb, 1 ));
	}
	
	function Connect_Google_API()
	// Connecte l'API Google, avec renouvellement automatique
	{
		$oauth_access_token = @file_get_contents("oauth.txt");
		$oauth_refresh_token = @file_get_contents("ref_token.txt");
		$oauth_lasttime = (int)@file_get_contents("time.txt");
		
		global $client;
		
		// Paramètres de l'objet
		$client->setAccessType('offline');
		$client->setApplicationName( "vendrediexp");
		$client->setClientId("253681685864-cbgrlppd8poi66t61s3ntv7rucv90j0r.apps.googleusercontent.com");
		$client->setClientSecret("iCz4AzQGUav1NERIGGu7oLjw");
		
		$client->setRedirectUri("http://localhost/test_calendar");
		$client->setUseObjects( 1 );
		
		
		if ( isset($oauth_access_token) && $oauth_access_token != "" )
		// si token déjà défini et valide
		{
		
			$time_max = $oauth_lasttime+3600;
			//echo $time_max ."time :".time();
			if( $time_max > time() ) $token_valid = true; else $token_valid = false;
			//echo "Refresh dans ".($time_max-time())." sec<br />";
			$token = $oauth_access_token;
			if( !isset($oauth_refresh_token) || trim($oauth_refresh_token) == "" )
			{
			
				$google_token = json_decode($token);
				$refreshToken = $google_token->refresh_token;
				$expires_in = $google_token->expires_in;
				file_put_contents("ref_token.txt", $refreshToken );
				//echo "Nouveau token : création du refresh token -> ".$refreshToken." -> ".$expires_in." -> ".($time_max-time())."<br />";
			}
			//echo $token."<br />";
			
			if( $token_valid )
			{
				 
				$client->setAccessToken($token);
			}else{
				$client->refreshToken($oauth_refresh_token);
				$newtoken = $client->getAccessToken();
				file_put_contents("oauth.txt", $newtoken );
				file_put_contents("time.txt", time() );
				$client->setAccessToken($newtoken);
			 
			}
		}else{
			// sinon, on s'authentifie
			//echo "TOKEN NON-TROUVE OU NON-VALIDE";
			
			$client->authenticate();
			$token = $client->getAccessToken();
			file_put_contents("oauth.txt", $token );
			file_put_contents("time.txt", time() );
			unlink("ref_token.txt");
			// on stocke le token
		}
		if( isset($_GET["code"]) ) header("Location: ".$URI); // Pour éviter d'avoir les arguments dans l'url
	}
	
	function CreerEvent( $titre, $heure_debut, $heure_fin, $lieu )
	// Créé un événement -> fonctionnel
	{
		//format de date '2014-02-19T09:00:00.000+01:00'
		$event = new Google_Event();
		global $service;
		global $calendar_id;
		
		$start = new Google_EventDateTime(); //note in the API examples it calls EventDateTime().
		$end = new Google_EventDateTime(); //note in the API examples it calls EventDateTime().
		
		$event->setSummary($titre);
		$event->setLocation($lieu);
		$start->setDateTime($heure_debut);
		$end->setDateTime($heure_fin);
		
		$event->setStart($start);
		$event->setEnd($end);
		
		$createdEvent = $service->events->insert($calendar_id, $event); 
	}
	
	function ModifierEvent( $eventid, $titre, $heure_debut, $heure_fin, $lieu )
	// Modifie un événement -> NON-fonctionnel
	{
		//format de date '2014-02-19T09:00:00.000+01:00'
		$event = new Google_Event();
		global $service;
		global $calendar_id;
		
		$start = new Google_EventDateTime(); //note in the API examples it calls EventDateTime().
		$end = new Google_EventDateTime(); //note in the API examples it calls EventDateTime().
		
		$event->setSummary($titre);
		$event->setLocation($lieu);
		$start->setDateTime($heure_debut);
		$end->setDateTime($heure_fin);
		
		$event->setStart($start);
		$event->setEnd($end);
		
	}
	
	function SupprimerEvent( $eventid )
	// Supprime un événement -> fonctionnel
	{
		//format de date '2014-02-19T09:00:00.000+01:00'
		global $service;
		global $calendar_id;
		
		return $service->events->delete($calendar_id, $eventid);
	}
	
	
	/***Créer calendrier Google
	$calendar = new Calendar();
	$calendar->setSummary('calendarSummary');
	$calendar->setTimeZone('Europe/Paris');

	$createdCalendar = $service->calendars->insert($calendar);

	echo $createdCalendar->getId();
	***/
	
	
	
	//////////////////////////////////////
	//    _____           _       _     //
	//   / ____|         (_)     | |    //
	//  | (___   ___ _ __ _ _ __ | |_   //
	//   \___ \ / __| '__| | '_ \| __|  //
	//   ____) | (__| |  | | |_) | |_   //
	//  |_____/ \___|_|  |_| .__/ \__|  //
	//                     | |          //
	//                     |_|          //
	//////////////////////////////////////

	// Déclaration des objets
	$client = new Google_Client(); // Utile pour authentification
	$service = new Google_CalendarService( $client ); // Utile pour le service "Calendrier"
	
	Connect_Google_API(); // La variable $client doit obligatoirement être la class Google_Client();
	 

	if(isset( $_POST["action"]) && $_POST["action"] == "add_event" )
	{
		$date_de_debut = $_POST["date_debut"]."T".$_POST["hour_debut"].".000+01:00";	//format '2014-02-19T09:00:00.000+01:00'
		$date_de_fin   = $_POST["date_fin"]."T".$_POST["hour_fin"].".000+01:00";		//format '2014-02-19T09:00:00.000+01:00'
		CreerEvent( $_POST["titre"],$date_de_debut,$date_de_fin,$_POST["lieu"] );
	}
	
	if(isset( $_POST["action"]) && $_POST["action"] == "mod_event_ok" )
	{
		$date_de_debut = $_POST["date_debut"]."T".$_POST["hour_debut"].".000+01:00";	//format '2014-02-19T09:00:00.000+01:00'
		$date_de_fin   = $_POST["date_fin"]."T".$_POST["hour_fin"].".000+01:00";		//format '2014-02-19T09:00:00.000+01:00'
		ModifierEvent( $eventid, $titre, $heure_debut, $heure_fin, $lieu );
	}
	
	if( isset( $_POST["action"]) && $_POST["action"] == "del_event" )
	{
		SupprimerEvent( $_POST["event"] );
	}
	
	$client->setUseObjects( 0 ); // Ici on déclare ne pas vouloir utiliser le mode objet pour récupérer un Array()
	$events = $service->events->listEvents($calendar_id); // Récupération d'un Array()
	
?><!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Accès Calendrier</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Content-Language" content="fr" />
		<meta http-equiv="pragma" content="no-cache" />
		<meta http-equiv="cache-control" content="must-revalidate, no-cache" />
		<link rel="shortcut icon" type="image/x-icon" href="../img/ffe.ico" />
		<script type="text/javascript" src="jq.js"></script>
	</head>
	<body>
		<div style="text-align: center;">
			<iframe src="https://www.google.com/calendar/embed?src=<?php echo $calendar_id; ?>&ctz=Europe/Paris" style="border: 0;margin:0 auto" width="800" height="600" frameborder="0" scrolling="no"></iframe>
			<!-- <div id="buttons" style="display: none">
				<input type="button" id="cre" value="Créer" />&nbsp;&nbsp;
				<input type="button" id="mod" value="Modifier" />&nbsp;&nbsp;
				<input type="button" id="del" value="Supprimer" />
			</div> -->
		</div>
		
		<form action="?" method="POST" id="form_create" style="display: block; border: 1px dashed blue;">
			<h2>Créer un évenement</h2>
			<input type="hidden" name="action" value="add_event" />
			
			<input type="text" name="titre" value="" placeholder="Titre de l'évènement" />
			<input type="text" name="lieu" value="" placeholder="Lieu de l'évènement" />
			<br />
			<input type="text" name="date_debut" value="" pattern="20[0-9]{2}-(0[0-9]|1[0-2])-([0-2][0-9]|3[0-1])" placeholder="Date de début de l'évènement YYYY-MM-DD" />&nbsp;&nbsp;
			<input type="text" name="hour_debut" value="" pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}" placeholder="Heure de début de l'évènement HH:MM:SS" />
			<br />
			<input type="text" name="date_fin" value="" pattern="20[0-9]{2}-(0[0-9]|1[0-2])-([0-2][0-9]|3[0-1])" placeholder="Date de fin de l'évènement YYYY-MM-DD" />&nbsp;&nbsp;
			<input type="text" name="hour_fin" value="" pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}" placeholder="Heure de fin de l'évènement HH:MM:SS" />
			<br />
			<input type="submit" value="Créer" />
		</form>
		
		<form action="?" method="POST"  id="form_modif" style="display: block; border: 1px dashed green;">
			<h2>Modifier un évenement</h2>
			<input type="hidden" id="action" value="mod_event" />
			
			<select name="event">
				<option>Selectionner un évènement</option>
				<?php foreach( $events["items"] as $tbevent ): ?>
				<option value="<?php echo $tbevent["id"]; ?>"><?php echo $tbevent["summary"]; ?></option>
				<?php endforeach; ?>
				
			</select>
			<input type="submit" name ="ok" value="ok" />
			</form>
			<?php
			if( isset( $_POST["ok"])) 
			{
					$eventid = $_POST["event"];
					$event = new Google_Event();
					$event = $service->events->get($calendar_id, $eventid);
					//var_dump($event);
					$titre =$event['summary']; 
					$lieu=$event['location'];
					$dt_deb1=explode("T", $event['start']['dateTime']);
					$dt_deb=$dt_deb1[0];
					$hr_deb1=explode("T", $event['start']['dateTime']);
					$hr_deb2=explode("+", $hr_deb1[1]);
					$hr_deb=$hr_deb2[0];
					$dt_fin1=explode("T", $event['end']['dateTime']);
					$dt_fin=$dt_fin1[0];
					$hr_fin1=explode("T", $event['end']['dateTime']);
					$hr_fin2=explode("+", $hr_fin1[1]);
					$hr_fin=$hr_fin2[0];
			?>
			<form action="?" method="POST"  id="form_modif_ok" style="display: block; border: 1px dashed green;">
			<input type="hidden" id="action" value="mod_event_ok" />
			<input type="text" name="titre" value="<?php echo $titre; ?>" placeholder="Titre de l'évènement" />
			<input type="text" name="lieu" value="<?php echo $lieu; ?>" placeholder="Lieu de l'évènement" />
			<br />
			<input type="text" name="date_debut" value="<?php echo $dt_deb; ?>" pattern="20[0-9]{2}-(0[0-9]|1[0-2])-([0-2][0-9]|3[0-1])" placeholder="YYYY-MM-DD Date de début de l'évènement" />&nbsp;&nbsp;
			<input type="text" name="hour_debut" value="<?php echo $hr_deb; ?>" pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}" placeholder="HH:MM:SS Heure de début de l'évènement" />
			<br />
			<input type="text" name="date_fin" value="<?php echo $dt_fin; ?>" pattern="20[0-9]{2}-(0[0-9]|1[0-2])-([0-2][0-9]|3[0-1])" placeholder="YYYY-MM-DD Date de fin de l'évènement" />&nbsp;&nbsp;
			<input type="text" name="hour_fin" value="<?php echo $hr_fin; ?>" pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}" placeholder="HH:MM:SS Heure de fin de l'évènement" />
			<br />
			
			
			<input type="submit" value="Valider" />
		</form>
		<?php
		}
		?>
		
		<form action="?" method="POST"  id="form_delete" style="display: block; border: 1px dashed yellow;">
			<h2>Supprimer un évenement</h2>
			<input type="hidden" name="action" value="del_event" />
			
			<select name="event">
				<option>Selectionner un évènement</option>
				<?php foreach( $events["items"] as $tbevent ): ?>
				<option value="<?php echo $tbevent["id"]; ?>"><?php echo $tbevent["summary"]; ?></option>
				<?php endforeach; ?>
			</select>
			<br />
			<input type="submit" value="Supprimer" />
		</form>
		
		<?php
		}
	}
		?>
<script>
$(document).ready( function(){
	$("#buttons").show();
		
	$("#form_delete, #form_create, #form_modif").hide();

	$("#cre").click( function(){
		$("#form_delete, #form_create, #form_modif").hide();
		$("#form_create").show();
	});
	
	$("#mod").click( function(){
		$("#form_delete, #form_create, #form_modif").hide();
		$("#form_modif").show();
	});
	$("#mod").click( function(){
		$("#form_delete, #form_create, #form_modif_ok").hide();
		$("#form_modif_ok").show();
	});
	
	$("#del").click( function(){
		$("#form_delete, #form_create, #form_modif").hide();
		$("#form_delete").show();
	});
});
</script>

	</body>
</html>