<?php
//on lance la session
session_start();

include_once('lib/php/fonction.php');
include_once('meta_header.php');
//include_once('nav.php'); 

//D'abord activer l'affichage des érreur pour le debugage
// Reporte toutes les erreurs PHP
error_reporting(E_ALL);

//quand on appuie sur inscrire
if(isset($_POST['add'])){

	//la session erreur est false sinon, le fromulaire ne s'envoie pas à la BD
	//$_SESSION['erreurform'] = false;

	//le contenu n'affiche rien
	$contenu = '';

	//on récupère les données entrées par l'administrateur
	$pseudo				= secureData($_POST['pseudo']); 
	$name				= secureData($_POST['name']);
	$firstname			= secureData($_POST['firstname']);
	$adress				= secureData($_POST['adress']);
	$phone				= secureData($_POST['phone']);
	$email 				= secureData($_POST['email']);
	$mdp 				= md5(secureData($_POST['mdp'])); //md5($_POST['mdp']); //md5 = le mot de passe est cripté
	$dateinscription 	= date('y-m-d');
	$client 			= 0;
	$admin 			 	= 0;
	$user				= 1;
	// Génération aléatoire d'une clé
	$token = md5(microtime(TRUE)*100000);
	//$active = null ;
	

	//on valide les champs du formulaire
	valider_mail($_POST['email']);
	valider_mdp($_POST['mdp']);
	valider_pseudo($_POST['pseudo']);

	//fonction qui vérifie si l'email est déjà existant ou pas, Si existant n'inscrit pas le client.
	verif_clients($email);

			//on se connecte
			$connection = connectBD();
			
			// si on se connecte
			if($connection){

				try{
					//on lance la transaction
					$connection-> BeginTransaction();

					//si connection, on prépare la requête
					$connection->exec('INSERT INTO clients (pseudo,name,firstname,adress,phone,email,mdp,dateinscription,admin,client,user,token) VALUES("'.$pseudo.'","'.$name.'","'.$firstname.'","'.$adress.'","'.$phone.'","'.$email.'","'.$mdp.'","'.$dateinscription.'","'.$admin.'","'.$client.'","'.$user.'","'.$token.'")');
					// Insertion de la clé dans la base de données (à adapter en INSERT si besoin)
					//validation de la transaction
					$connection->commit();


					// Récupération des variables nécessaires au mail de confirmation	
					$email 		= secureData($_POST['email']); 
					$name		= secureData($_POST['name']);
					$firstname	= secureData($_POST['firstname']);
					
												
					// Préparation du mail contenant le lien d'activation 
					$to = $email;  //$destinataire
					$email_address = 'test@test.com'; //expediteur  no_reply@tiha.be
					$email_subject = 'Vos identifiants dans notre espace client'; //sujet
					$name;

					$headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
					$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n"; //entête content-type pour l'UTF8
					$headers .= 'Reply-To: '.$email_address."\n"; // Mail de reponse
					$headers .= 'From: "HARRAM Fatiha"<'.$email_address.'>'."\n"; // Expediteur no reply
					//$headers .= 'Cc: '.$copie."\n"; // Copie Cc
					//$headers .= 'Bcc: '.$copie_cachee."\n\n"; // Copie cachée Bcc        
					$message = '<div id="content" style="width: 100%; text-align: justify; font-family: Marcellus SC; "background-image:url(../img/grunge_wall.png);">
								<div style ="font-family: Sketch Rockwell,sans-serif;font-size: 2em;">TIHA.BE</div>
								<br>
								<b>Bonjour '.urlencode($name).' '.urlencode($firstname).'</b></br></br> 
								<p style="font-size:15px;">
								Votre inscription à bien été prise en charge. Vous pouvez, à tout moment, avoir accès à votre espace client où vous aurez la possibilité de consulter et/ou modifier vos données, également pour suivre vos projets. 
								Allez sur notre site tiha.be. </br>

								<b>Pour activer votre compte et initialiser votre mot de passe, veuillez cliquer sur le lien ci dessous ou le copier/coller dans votre navigateur internet.</b></p>	
								<a href="www.tiha.be/validation.php?email='.urlencode($email).'&token='.urlencode($token).'">www.tiha.be/validation.php?email='.urlencode($email).'&token='.urlencode($token).'</a>
								<p><i style="font-size: 0.8em;">Ceci est un mail automatique, Merci de ne pas y répondre.</i></p>'; //validation.php
			
					if( mail($to,$email_subject,$message,$headers) ){

						//var_dump(error_get_last());
										
						//echo "Votre message a bien été envoyé";

						//on donne une valeur au contenu
						$contenu = '<red>Vous avez été inscrit avec succès! Vous recevrez <b>un mail d\'activation</b> de votre compte. </br> Veuillez cliquez sur le lien ou copier/coller
									dans votre barre de navigation pour activer et confirmer votre inscription.</red>';
											
						//on renvoie à la page pour remplir le formulaire de commentaire
						//header('refresh:3; url=admin.php');

					}
					header("location:espaceclient.php");
					// else{

					// 	var_dump(error_get_last());

					// 	exit('Votre message n\'a pas pu être envoyé');
					// }

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


?>

	<title>inscriptionTRT</title>
	<div id="content">
		<div id="container">

		<?php
			echo $contenu;
		?>
		</div> <!--container-->
	</div> <!--content-->

<?php 
}	
?>