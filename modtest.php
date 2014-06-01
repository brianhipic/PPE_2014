<?php
require_once '/test_calendar/googleapi/Google_Client.php';
require_once '/test_calendar/googleapi/contrib/Google_CalendarService.php';
		try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=hipic', 'root', '');
			}

			catch (Exception $e)
			{
				die('Erreur :'.$e->getMessage());
			}
			
	if (isset($_GET['modid']) && isset($_GET['affiche']) )
	{
		$modid = $_GET['modid'];
		
		$reponse = $bdd->query("SELECT LOGIN  from   calendar WHERE NUMCENTRE='$modid'");
		$donnees = $reponse->fetch();
		$email = $donnees['LOGIN'];
		
		include ("test_calendar_affiche.php");

		
	
	   $CLIENT_ID = "982158665414-b575ffke8gl9r7ofmngcrb3d6gmll3n0.apps.googleusercontent.com";
					 
	// Récupérer :	API & Auth > Credentials > OAuth > Client secret
	   $CLIENT_SECRET = "liNcDJz7TZHNyd1RRqJNvPxG";

	   $URI = "http://localhost/test_calendar";

	   $PRODUCT_NAME = "testcal";
		$calendar_id=selectIdCalendar($email);
		
	if (empty($calendar_id))
	{
echo "<br/> Erreur, aucun Id calendar n'a été trouvé pour votre centre : ".$email;
	
	

	


	// Déclaration des objets
	$client = new Google_Client(); // Utile pour authentification
	$service = new Google_CalendarService( $client ); // Utile pour le service "Calendrier"
	
	Connect_Google_API(); // La variable $client doit obligatoirement être la class Google_Client();


	$client->setUseObjects( 0 ); // Ici on déclare ne pas vouloir utiliser le mode objet pour récupérer un Array()
	$events = $service->events->listEvents($calendar_id); // Récupération d'un Array()
	}
	?>

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
			<div id="buttons" style="display: none">
				<input type="button" id="cre" value="Créer" />&nbsp;&nbsp;
				<input type="button" id="mod" value="Modifier" />&nbsp;&nbsp;
				<input type="button" id="del" value="Supprimer" />
			</div>
		</div>
<?php
}
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
				$nom = $donnees['NOMCENTRE'];
				$numc = $donnees['NUMCENTRE'];
				$cp = $donnees['CPCENTRE'];
				$numsiret = $donnees['NUMSIRET'];
				$adresse = $donnees['ADRESSECENTRE'];
				$ville = $donnees['VILLECENTRE'];
				$tel = $donnees['TELFIX'];
				$email = $donnees['EMAILCENTRE'];
				$description = $donnees['NOMFICHIERDESCRIPTION'];
				$telport = $donnees['TELPORT'];
				$photo = $donnees['NOMFICHIERPHOTOCOUVERTURE'];
				

				$reponse = $bdd->query("SELECT * from proposer p, discipline d WHERE p.ID_D = d.ID_D and NUMCENTRE='$modid'");
				$donnees = $reponse->fetch();
				$cours = $donnees['COURS'];
				$dressage = $donnees['DRESSAGE'];
				$saut = $donnees['SAUT_OBSTACLE'];
				$horse = $donnees['HORSE_BALL'];
				$poney = $donnees['PONEY_GAMES'];
				$trec = $donnees['TREC'];
				$attelage = $donnees['ATTELAGE'];
				$promenade = $donnees['PROMENADE'];
				$randonnee = $donnees['RANDONNEES'];
				$concour = $donnees['CONCOUR_COMPLET'];
				$equifun = $donnees['EQUIFUN'];
				$amazone = $donnees['AMAZONE'];
				$autre = $donnees['AUTRE'];
	}
?>

<!DOCTYPE html>

	<html>
	
		<head>
			<meta charset="UTF-8" />
			<title>Centre</title>
			<link rel="icon" href="ffe.ico" />
			<link rel="stylesheet" href="css/style_inscription_a.css"/>
		</head>
	
		<body>
		
			
			<center><h1><?php echo $nom; ?> </h1></center>
		
			<img src="photo_centre.php?modid=<?php echo $modid; ?>" alt="texte" />
			
			
			<center><fieldset><legend>Informations générales :</legend>
			
			<p>Le numero siret :<?php echo $numsiret; ?></p>
			<p>Adresse :<?php echo $adresse; ?></p>
			<p>Code postal :<?php echo $cp; ?></p>
			<p>Ville :<?php echo $ville; ?></p>
			<p>Description :<?php echo $description; ?></p>
			
			</fieldset></center>
			
			</br>
			
			<center><fieldset><legend>Moyen de communication :</legend>

			<p>Telephone fixe :<?php echo $tel; ?></p>
			<p>Telephone portable :<?php echo $telport; ?></p>
			<p>Adresse mail :<?php echo $email; ?></p>
			
			
			</fieldset></center>
			
			</br>
			
			
			<center><fieldset><legend>Activités proposées :</legend>
			
			<p>cours :<?php echo $cours; ?></p>
			<p>dressage :<?php echo $dressage; ?></p>
			<p>saut d'obstacle:<?php echo $saut; ?></p>
			<p>horse ball :<?php echo $horse; ?></p>
			<p>poney games :<?php echo $poney; ?></p>
			<p>trec :<?php echo $trec; ?></p>
			<p>attelage :<?php echo $attelage; ?></p>
			<p>promenade :<?php echo $promenade; ?></p>
			<p>randonnee :<?php echo $randonnee; ?></p>
			<p>concour :<?php echo $concour; ?></p>
			<p>equifun :<?php echo $equifun; ?></p>
			<p>amazone :<?php echo $amazone; ?></p>
			<p>autre :<?php echo $autre; ?></p>
		
			</fieldset></center>
		
			</br>
			
			<center><a href="modtest.php?modid=<?php echo$modid; ?>&affiche=1">Voir le planning de reservation</a></br>
		
		</body>
		
	</html>