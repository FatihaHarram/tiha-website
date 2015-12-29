<?php
//on lance la session
session_start();

include_once('lib/php/fonction.php');

//include_once('nav.php'); 


//quand on appuie sur inscrire
if(isset($_POST['inscrire'])){

	//la session erreurform est false sinon, le fromulaire ne s'envoie pas à la BD
	$_SESSION['erreurform'] = false;

	//le contenu n'affiche rien
	$contenu = '';

	//on récupère les données entrées par l'utilisateur
	$email 				= secureData($_POST['email']);
	$pseudo 			= secureData($_POST['pseudo']);
	$mdp 				= md5(secureData($_POST['mdp'])); //md5 = le mot de passe est cripté
	$dateinscription 	= date('y-m-d');
	$admin 				= 0;
	$client 			= 0;

	//on valide les champs du formulaire
	valider_mail($_POST['email']);
	valider_pseudo($_POST['pseudo']);
	valider_mdp($_POST['mdp']);

	$_SESSION['email'] = $email;
	$_SESSION['pseudo'] = $pseudo;
	$_SESSION['mdp'] = $mdp;
					 


	if($_SESSION['erreurform']){	//on renvoie vers la page où il y a le formulaire
			header('refresh:0;url=form.php');
			//echo 'erreur de $session erreurform!!!';
		}
		else
		{
			//on se connecte
			$connection = connectBD();

			// si on se connecte
			if($connection){

				try{
					//on lance la transaction
					$connection-> BeginTransaction();

					//si connection, on prépare la requête
					$connection->exec('INSERT INTO users VALUES(null,"'.$email.'","'.$pseudo.'","'.$mdp.'","'.$dateinscription.'","'.$admin.'","'.$client.'")'); 
					//validation de la transaction
					$connection->commit();


					//appel à la fonction qui connecte l'utilisateur
					login($connection, $pseudo, $mdp );

					//on donne une valeur au contenu
					$contenu = '<red><b>'.$_SESSION['pseudo'] .'</b> Vous avez été inscrit(e) avec succès!</red>';
					// Récupération des variables nécessaires au mail de confirmation	
					$email 		= secureData($_POST['email']); 
					$pseudo		= secureData($_POST['pseudo']);
												
					// Préparation du mail contenant le lien d'activation 
					$destinataire = $email; 
					$expediteur = 'f.harram@hotmail.com';
					$sujet = 'Votre inscription'; 
					$entete = 'From: inscription@tiha.com'; 

					$headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
					$headers .= 'Content-type: text/html; charset=ISO-8859-1'."\n"; // l'en-tete Content-type pour le format HTML
					$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
					$headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
					$headers .= 'From: "HARRAM Fatiha"<'.$expediteur.'>'."\n"; // Expediteur
					$headers .= 'Delivered-to: '.$destinataire."\n"; // Destinataire
					//$headers .= 'Cc: '.$copie."\n"; // Copie Cc
					//$headers .= 'Bcc: '.$copie_cachee."\n\n"; // Copie cachée Bcc        
					$message = '<div id="content" style="width: 100%; text-align: center; font-family: Marcellus SC; "background-image:url(../img/grunge_wall.png);">
								<div style ="font-family: Sketch Rockwell,sans-serif;font-size: 2em;">TIHA.BE</div>
								<br>
								<b>Un Bonjour '.urlencode($pseudo).'</b></br></br> 
								Merci pour votre inscription! Vous pouvez faire un commentaire dès à présent. </br>
						 		<i style="font-size: 0.8em;">Ceci est un mail automatique, Merci de ne pas y répondre</i>';

			

					// est un mail automatique, Merci de ne pas y répondre.'; 
					mail($destinataire, $sujet, $message, $headers,$entete); // Envoi du mail 
					//mail_utf8 ($destinataire, $from_user, $expediteur, $sujet = '', $message = '');
						
						

					//on renvoie à la page pour remplir le formulaire de commentaire
					header('refresh:3; url=comments.php');

				}

				//si erreur
				catch(PDOException $e){
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
		}
		?>

		<title>inscriptionTRT</title>
		<div id="content">
			<div id="container">

				<?php

				include_once('meta_header.php');
				echo $contenu;
				?>
			</div><!--container-->
		</div><!--content-->

		<?php
			}
	

?>