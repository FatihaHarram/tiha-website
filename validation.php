<?php
session_start();

include_once('lib/php/fonction.php');
include_once('meta_header.php');
include_once('nav.php'); 
 ?>

<title>reinitialisation</title>
</head>
<body>
	
		<?php
	

			// Récupération des variables nécessaires à l'activation
			$email = $_GET['email'];
			$token = $_GET['token'];


			//on se connecte
			$connection = connectBD();

			$contenu = '';

			// si on se connecte
			if($connection){


				try{

					$req=$connection->prepare('SELECT * FROM clients WHERE email=?');
					$req->execute([$email]);
					$user = $req->fetch();
					
					 // Si ce n'est pas le cas on passe aux comparaisons

						if($user && $user['token' ] == $token){
							
							$req=$connection->prepare('UPDATE clients SET token = NULL, active = 1 WHERE email = ?')->execute([$email]);
							
							$_SESSION['auth'] = $user;

							$contenu = "Votre compte a bien été activé !";

							//die("ok! c'est égale");

							header('refresh:5;url=espaceclient.php');
	
						}else{

							$contenu= "<red>Erreur ! Votre compte ne peut être activé... <br>
							Votre compte à surement déjà été activé! Veuillez contacter notre administrateur. <a href='contact.php'><b>CONTACTEZ ADMINISTRATEUR</b></a></red>";

						}
					
				
			}//fermeture try		
				catch(PDOException $e){		//si erreur
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


								// url=modifMDP.php"

		?>
	<META http-equiv="refresh" content="5; url=espaceclient.php"> 	
	</head>	
	<div id="content">
		<h1>
			Validation
		</h1>	

		<?php echo $contenu; 

		?>
		
	</div>

<?php
include_once('js/script_js.php');
?>
</body>
</html>