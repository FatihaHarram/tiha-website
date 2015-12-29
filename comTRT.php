

<?php
session_start();

include_once('lib/php/fonction.php');
include_once('meta_header.php');

//quand on clique sur envoyer
if (isset($_POST['validCom'])&&isset($_POST['comment'])) {

	//on initialise de contenu
	$contenu='';

	//on récupère les données entrées par l'utilisateur
	$user_id		=	$_SESSION['id'];
	$user_mail 		=	$_SESSION['email'];
	$comment 		= 	nl2br(secureData($_POST['comment']));
	$datecomments 	= 	date('y-m-d H:i:s');
	//$heure		 	= 	date('H:i');
	// $date=date("Y-m-d H:i:s");
	if (isset($_SESSION['firstname'])) {
		$user_pseudo 	=	$_SESSION['firstname']; 
	}else{
	$user_pseudo 	=	$_SESSION['pseudo']	; 

	}

	

	//on se connection
	$connection = connectBD();

	//si la connection s'effectue

	if ($connection) {

		try {
			//on lance la transaction
			$connection->  BeginTransaction();

			//on prépare la requête
			$connection->exec('INSERT INTO comments VALUES (null, "'.$user_id.'", "'.$user_pseudo.'", "'.$user_mail.'", "'.$comment.'", "'.$datecomments.'") ');
			//validation de la transaction
			$connection->commit();
			//on donne une valeur au contenu
			$contenu = '<red>Merci '.$user_pseudo.', votre commentaire a bien été enregisté! </red>';
			//header('refresh:3; url=livredor.php');


			//si erreur
		} catch (PDOException $e) {
			//on annule la transaction
			$connection->rollback;
			//on affiche les erreurs
			$contenu = '<red> Erreur: Erreur lors de la requête, veuillez contacter votre administrateur!</red></br>';
			$contenu .= '<red>Erreur: '.$e->getMessage().'</red></br>';
			$contenu .= '<red>Erreur:'.$e->getCode().'</red></br>';


			//on quitte, on arrête l'execution q'il y a du code après
			exit();
			
		}	
	}
	else{
		$contenu = '<red>ERREUR : Impossible de se connecter à la BD, Veuillez contacter votre administrateur!</red><br>';
	}

	
?>
<META http-equiv="refresh" content="3; url=livredor.php"> 
</head>

<title>comTRT</title>
<div id="content">
	<div id="container">
		<?php
		echo $contenu;

		?>
	</div><!--container-->
</div><!--content-->

<?php
	}
?>