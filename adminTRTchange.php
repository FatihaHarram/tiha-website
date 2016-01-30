<?php
//on lance la session
session_start();

include_once('lib/php/fonction.php');
include_once('meta_header.php');
//include_once('nav.php'); 


//quand on appuie sur inscrire
//if(isset($_GET['action']) && isset($_GET['id'])){
if (isset($_POST['change'])) {
	


	//le contenu est vide
	$contenu="";


	//on récupère les données entrées par l'administrateur
	$id					= $_POST['id'];

	
	$name_client		= $_POST['name_client']; //$_POST['name_client'];
	$orderType			= $_POST['orderType']; //$_POST['orderType'];
	$orderDescr			= $_POST['orderDescr'];
	$Level 				= $_POST['orderLevel'];
	$orderValue			= $_POST['orderValue'];
	$briefingValue		="";
	$envoiChValue 		="";
	$okChValue 			="";
	$designValue 		="";
	$prodValue 			="";
	$livraisonValue 	="";
	$facturValue		="";
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
 
	

	//if($_GET['action'] == 2){
		try{

			//on se connecte
			$connection = connectBD();
				
			$req = $connection->query('SELECT * FROM orders WHERE id_client ="'.$id.'"');
			//$req = $pdo->query("SELECT * FROM profil WHERE pseudo='".$pseudo."'");
					
			if($donnee=$req->fetch())
				{
					//verif_id_client($id_client);
					echo '<red>Le numéro de commande existe!</red>';
					


					//on se connecte
					$connection = connectBD();

					// si on se connecte
					if($connection){


						try{

							//on tente d'executer les requetes suivantes dans une transaction
							//on lance la transaction
							$connection->beginTransaction();

							//si connection on prépare la requête
							if (!empty($name_client)) {
								$connection->exec('UPDATE orders SET name_client = "'.$name_client.'" WHERE id_client='.$_POST['id']);
							}
							if (!empty($orderType)) {
								$connection->exec('UPDATE orders SET orderType = '.$orderType.' WHERE id_client='.$_POST['id']);
							}
							if (!empty($orderDescr)) {
								$connection->exec('UPDATE orders SET orderDescr = "'.$orderDescr.'"  WHERE id_client='.$_POST['id']);
							}
							if (!empty($orderLevel )) {
								$connection->exec('UPDATE orders SET orderLevel  = "'.$orderLevel .'"  WHERE id_client='.$_POST['id']);
							}							
							if (!empty($briefingValue)) {
									$connection->exec('UPDATE orders SET briefingValue = "'.$briefingValue.'"  WHERE id_client='.$_POST['id']); 
							}
							if (!empty($envoiChValue)) {
								$connection->exec('UPDATE orders SET envoiChValue = "'.$envoiChValue.'"  WHERE id_client='.$_POST['id']);
							}
							if (!empty($okChValue)) {
								$connection->exec('UPDATE orders SET okChValue = "'.$okChValue.'"  WHERE id_client='.$_POST['id']); 
							}
							if (!empty($designValue)){
								$connection->exec('UPDATE orders SET designValue = "'.$designValue.'"  WHERE id_client='.$_POST['id']);  
							}
							if (!empty($prodValue)) {
								$connection->exec('UPDATE orders SET prodValue = "'.$prodValue.'"  WHERE id_client='.$_POST['id']);  
							}
							if (!empty($livraisonValue)) {
								$connection->exec('UPDATE orders SET livraisonValue = "'.$livraisonValue.'"  WHERE id_client='.$_POST['id']);  
							}
							if (!empty($facturValue)) {
								$connection->exec('UPDATE orders SET facturValue = "'.$facturValue.'"  WHERE id_client='.$_POST['id']); 
							}
							if (!empty($facturationData)) {
								$connection->exec('UPDATE orders SET facturationData = "'.$facturationData.'"  WHERE id_client='.$_POST['id']); 
							}
							if (!empty($date)) {
								$connection->exec('UPDATE orders SET date = '.$date.' WHERE id_client='.$_POST['id']);
							}
							
							//si jusque là tout va bien, on valide la transaction
							$connection->commit();

							unset( $connection );
//handle file upload
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
//end of file upload
							$contenu =  $name_client.'<red>Votre commande '.$_POST['id'].' a été modifiée avec succès!</red>';
							
							//on renvoie à la page pour remplir le formulaire de commentaire
							header('refresh:3; url=order.php');
															
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
					echo "<red>cette commande n\'existe pas dans la base de données!</red>";
				}
					
			//}
		?>

		<title>adminTRTorder</title>
		<div id="content">
			<div id="container">

		<?php
		echo $contenu;
		//echo '<br>id_client = '.$id_client.'<br> name_client = '.$name_client.'<br> orderType = '.$orderType.'<br> orderDescr = '.$orderDescr.'<br> orderLevel = '.$orderLevel.'<br> facturationData = '.$facturationData.'<br> date = '.$date;

	} catch(Exception $e) {
		//on affiche les erreurs
		$contenu = '<red> Erreur: Erreur lors de la requête, veuillez contacter votre administrateur!</red></br>';
		$contenu .= '<red>Erreur: '.$e->getMessage().'</red></br>';
		$contenu .= '<red>Erreur:'.$e->getCode().'</red></br>';
		
	}

	//}
	
?>
	</div><!--container-->
</div> <!--content-->
<?php
}
?>
		