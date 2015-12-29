<?php
//on lance la session
session_start();

include_once('lib/php/fonction.php');
include_once('meta_header.php');
//include_once('nav.php'); 


//quand on appuie sur inscrire
if(isset($_POST['saveForm'])){
 
	//le contenu n'affiche rien
	$contenu = '';

	//on récupère les données entrées par l'administrateur
	$id_client			= $_POST['id_client'];
	$name_client		= $_POST['name_client'];
	$orderType			= $_POST['orderType'];
	$orderDescr			= $_POST['orderDescr'];
	$orderLevel 		= $_POST['orderLevel'];
	$orderValue			= $_POST['orderValue'];

	$briefingValue 		= $_POST['briefingValue'];
	$envoiChValue		= $_POST['envoiChValue'];
	$okChValue			= $_POST['okChValue'];
	$designValue		= $_POST['designValue']; 
	$prodValue			= $_POST['prodValue'];
	$livraisonValue		= $_POST['livraisonValue'];
	$facturValue		= $_POST['facturValue'];

	$facturationData 	= $_POST['facturationData']; 
	$date 				= date('y-m-d H:i:s');

	/*print_r($_FILES);

	if (isset($_FILES['facture']) AND $_FILES['facture']['error'] == 0) {
		if ($_FILES['facture']['size'] <= 1000000 ) {
			$infosfichier = pathinfo($_FILES['facture']['name']);
			$extension_upload = $infosfichier['extension'];
			$extensions_autorisees = array('jpg', 'jpeg','pdf','png');
			if (in_array($extension_upload, $extensions_autorisees)) {
				# valider le fichier et le stocker définitivement
				move_uploaded_file($_FILES['facture']['name'] , 'uploads/'.basename($_FILES['facture']['name']));
				echo "l'envoi a bien été effectué !";
			}
			# code...
		}
		# code...
	}*/

	/*if($_SESSION['erreurform']){	//on renvoie vers la page où il y a le formulaire
			header('refresh:1;url=admin.php');
			echo 'erreur de $session erreurform!!!';
		}
		else
		{*/
		if(isset($_POST['id_client'])){
	
			$contenu = '';

			$id_client = $_POST['id_client'];

			//on se connecte
			$connection = connectBD();
				
			$req = $connection->query('SELECT * FROM clients WHERE id ="'.$id_client.'"');
			//$req = $pdo->query("SELECT * FROM profil WHERE pseudo='".$pseudo."'");
					
			if($donnee=$req->fetch())
				{
					verif_id_client($id_client);
					echo '<red>Le numéro de client existe!</red>';

					//on se connecte
					$connection = connectBD();

					// si on se connecte
					if($connection){

						try{
							//on lance la transaction
							$connection-> BeginTransaction();

							//si connection, on prépare la requête
							$connection->exec('INSERT INTO orders VALUES(null,"'.$id_client.'","'.$name_client.'","'.$orderType.'","'.$orderDescr.'","'.$orderLevel.'","'.$orderValue.'","'.$briefingValue.'","'.$envoiChValue.'","'.$okChValue.'","'.$designValue.'","'.$prodValue.'","'.$livraisonValue.'","'.$facturValue.'","'.$facturationData.'","'.$date.'")');

							//validation de la transaction
							$connection->commit();

							//on donne une valeur au contenu
							$contenu = '<red>Votre commande a bien été inscrite dans votre base de données!</red>';
								
							//on renvoie à la page pour remplir le formulaire de commentaire
							header('refresh:3; url=admin.php');

						}//si erreur
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
					}else{
						$contenu = '<red>ERREUR : Impossible de se connecter à la BD, Veuillez contacter votre administrateur!</red><br>';
					}
				}else{
					echo "<red>ce numero n\'existe pas dans la base de donnée!</red>";
				}
		}

		//}
		?>

		<title>adminTRTorder</title>
		<div id="content">
			<div id="container">
				<?php
				echo $contenu;
				//echo '<br>id_client = '.$id_client.'<br> name_client = '.$name_client.'<br> orderType = '.$orderType.'<br> orderDescr = '.$orderDescr.'<br> orderLevel = '.$orderLevel.'<br> facturationData = '.$facturationData.'<br> date = '.$date;

				?>
			</div> <!--container-->
		</div><!--content-->

		<?php

			}
	

?>