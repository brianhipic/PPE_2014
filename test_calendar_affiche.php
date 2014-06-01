<?php

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

		$reponse = $bdd->prepare('select ID_CALENDAR  from CALENDAR where LOGIN = :email ;');
		$reponse ->execute(array("email"=>$email));
		//var_dump($reponse);
		$donnees = $reponse->fetchAll(PDO::FETCH_ASSOC);
		//var_dump($donnees);
		if (isset($donnees[0]['ID_CALENDAR']))
		return $donnees[0]['ID_CALENDAR'];
		return "";
	}

	
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
	
?>