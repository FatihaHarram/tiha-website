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
	$Level 				= $_POST['orderLevel'];
	$orderValue			= $_POST['orderValue'];
    if($Level==1)
    {
	$briefingValue 		= $orderValue;
	$orderLevel 		= "Briefing";
    }
    else if($Level==2)
    {
    $envoiChValue 		= $orderValue;
	$orderLevel 		= "Envoi du cahier des charges";
    }
    else if($Level==3)
    {
    $okChValue 		= $orderValue;
	$orderLevel 		= "Acceptation du cahier des charges";
    }
    else if($Level==4)
    {
    $designValue 		= $orderValue;
	$orderLevel 		= "Réalisation du design/visuel";
    }
    else if($Level==5)
    {
    $prodValue 			= $orderValue;
	$orderLevel 		= "En production";
    }
    else if($Level==6)
    {
    $livraisonValue 	= $orderValue;
	$orderLevel 		= "En cours de livraison";
    }
    else if($Level==7)
    {
    $facturValue 		= $orderValue;
	$orderLevel 		= "Facturation";
    }
	
    $rand     			= date('His');
	$facturationData 	= $rand.$_FILES['facture']['name']; 
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
							//$connection->exec('INSERT INTO orders VALUES(null,"'.$id_client.'","'.$name_client.'","'.$orderType.'","'.$orderDescr.'","'.$orderLevel.'","'.$orderValue.'","'.$briefingValue.'","'.$envoiChValue.'","'.$okChValue.'","'.$designValue.'","'.$prodValue.'","'.$livraisonValue.'","'.$facturValue.'","'.$facturationData.'","'.$date.'")');


    if($Level==1)
    {
	$connection->exec('INSERT INTO orders (id_client,name_client,orderType,orderDescr,orderLevel,briefingValue,facturationData) VALUES("'.$id_client.'","'.$name_client.'","'.$orderType.'","'.$orderDescr.'","'.$orderLevel.'","'.$briefingValue.'","'.$facturationData.'")');
    }
    else if($Level==2)
    {
    $connection->exec('INSERT INTO orders (id_client,name_client,orderType,orderDescr,orderLevel,envoiChValue,facturationData) VALUES("'.$id_client.'","'.$name_client.'","'.$orderType.'","'.$orderDescr.'","'.$orderLevel.'","'.$envoiChValue.'","'.$facturationData.'")');
    }
    else if($Level==3)
    {
    $connection->exec('INSERT INTO orders (id_client,name_client,orderType,orderDescr,orderLevel,okChValue,facturationData) VALUES("'.$id_client.'","'.$name_client.'","'.$orderType.'","'.$orderDescr.'","'.$orderLevel.'","'.$okChValue.'","'.$facturationData.'")');
    }
    else if($Level==4)
    {
	$connection->exec('INSERT INTO orders (id_client,name_client,orderType,orderDescr,orderLevel,designValue,facturationData) VALUES("'.$id_client.'","'.$name_client.'","'.$orderType.'","'.$orderDescr.'","'.$orderLevel.'","'.$designValue.'","'.$facturationData.'")');
    }
    else if($Level==5)
    {
    $connection->exec('INSERT INTO orders (id_client,name_client,orderType,orderDescr,orderLevel,prodValue,facturationData) VALUES("'.$id_client.'","'.$name_client.'","'.$orderType.'","'.$orderDescr.'","'.$orderLevel.'","'.$prodValue.'","'.$facturationData.'")');
    }
    else if($Level==6)
    {
    $connection->exec('INSERT INTO orders (id_client,name_client,orderType,orderDescr,orderLevel,livraisonValue,facturationData) VALUES("'.$id_client.'","'.$name_client.'","'.$orderType.'","'.$orderDescr.'","'.$orderLevel.'","'.$livraisonValue.'","'.$facturationData.'")');
    }
    else if($Level==7)
    {
	$connection->exec('INSERT INTO orders (id_client,name_client,orderType,orderDescr,orderLevel,facturValue,facturationData) VALUES("'.$id_client.'","'.$name_client.'","'.$orderType.'","'.$orderDescr.'","'.$orderLevel.'","'.$facturValue.'","'.$facturationData.'")');
    }



							//validation de la transaction
							$connection->commit();

							// handle file upload
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
if (isset($_FILES['facture'])) {
  $name     = $_FILES['facture']['name'];
  $tmpName  = $_FILES['facture']['tmp_name'];
  $error    = $_FILES['facture']['error'];
  $size     = $_FILES['facture']['size'];
  $newname  =$rand.$name;
  $ext    = strtolower(pathinfo($name, PATHINFO_EXTENSION));
  
  // switch ($error) {
  //   case UPLOAD_ERR_OK:
      $valid = true;
      //validate file extensions
      if ( !in_array($ext, array('doc','docx','pdf')) ) {
        $valid = false;
        $response = 'Invalid file extension.';
      }
      //validate file size
      if ( $size/1024/1024 > 4 ) {
        $valid = false;
        $response = 'File size is exceeding maximum allowed size.';
      }
      //upload file
      if ($valid) {
        $targetPath =  dirname( __FILE__ ) . DIRECTORY_SEPARATOR. 'facture' . DIRECTORY_SEPARATOR. $newname;
        move_uploaded_file($tmpName,$targetPath); 
        chmod("$targetPath",0644);
      }
  //     break;
  //   case UPLOAD_ERR_INI_SIZE:
  //     $response = 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
  //     break;
  //   case UPLOAD_ERR_PARTIAL:
  //     $response = 'The uploaded file was only partially uploaded.';
  //     break;
  //   case UPLOAD_ERR_NO_FILE:
  //     $response = 'No file was uploaded.';
  //     break;
  //   case UPLOAD_ERR_NO_TMP_DIR:
  //     $response = 'Missing a temporary folder. Introduced in PHP 4.3.10 and PHP 5.0.3.';
  //     break;
  //   case UPLOAD_ERR_CANT_WRITE:
  //     $response = 'Failed to write file to disk. Introduced in PHP 5.1.0.';
  //     break;
  //   default:
  //     $response = 'Unknown error';
  //   break;
  // }

  // echo $response;
}
							// end of file upload

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