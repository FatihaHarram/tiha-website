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
	$orderLevel 		= $_POST['orderLevel'];
	$briefingValue 		= $_POST['briefingValue'];
	$envoiChValue		= $_POST['envoiChValue'];
	$okChValue			= $_POST['okChValue'];
	$designValue		= $_POST['designValue']; 
	$prodValue			= $_POST['prodValue'];
	$livraisonValue		= $_POST['livraisonValue'];
	$facturValue		= $_POST['facturValue'];
	$facturationData 	= $_POST['facturationData']; 
	$date 				= date('y-m-d H:i:s');
 
	

	//if($_GET['action'] == 2){
		try{

			//on se connecte
			$connection = connectBD();
				
			$req = $connection->query('SELECT * FROM orders WHERE id ="'.$id.'"');
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
								$connection->exec('UPDATE orders SET name_client = "'.$name_client.'" WHERE id='.$_POST['id']);
							}
							if (!empty($orderType)) {
								$connection->exec('UPDATE orders SET orderType = '.$orderType.' WHERE id='.$_POST['id']);
							}
							if (!empty($orderDescr)) {
								$connection->exec('UPDATE orders SET orderDescr = "'.$orderDescr.'"  WHERE id='.$_POST['id']);
							}
							if (!empty($orderLevel )) {
								$connection->exec('UPDATE orders SET orderLevel  = "'.$orderLevel .'"  WHERE id='.$_POST['id']);
							}							
							if (!empty($briefingValue)) {
									$connection->exec('UPDATE orders SET briefingValue = "'.$briefingValue.'"  WHERE id='.$_POST['id']); 
							}
							if (!empty($envoiChValue)) {
								$connection->exec('UPDATE orders SET envoiChValue = "'.$envoiChValue.'"  WHERE id='.$_POST['id']);
							}
							if (!empty($okChValue)) {
								$connection->exec('UPDATE orders SET okChValue = "'.$okChValue.'"  WHERE id='.$_POST['id']); 
							}
							if (!empty($designValue)){
								$connection->exec('UPDATE orders SET designValue = "'.$designValue.'"  WHERE id='.$_POST['id']);  
							}
							if (!empty($prodValue)) {
								$connection->exec('UPDATE orders SET prodValue = "'.$prodValue.'"  WHERE id='.$_POST['id']);  
							}
							if (!empty($livraisonValue)) {
								$connection->exec('UPDATE orders SET livraisonValue = "'.$livraisonValue.'"  WHERE id='.$_POST['id']);  
							}
							if (!empty($facturValue)) {
								$connection->exec('UPDATE orders SET facturValue = "'.$facturValue.'"  WHERE id='.$_POST['id']); 
							}
							if (!empty($facturationData)) {
								$connection->exec('UPDATE orders SET facturationData = "'.$facturationData.'"  WHERE id='.$_POST['id']); 
							}
							if (!empty($date)) {
								$connection->exec('UPDATE orders SET date = '.$date.' WHERE id='.$_POST['id']);
							}
							
							//si jusque là tout va bien, on valide la transaction
							$connection->commit();

							unset( $connection );

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
		