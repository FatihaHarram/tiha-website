<?php
include_once('lib/php/fonction.php');


if(isset($_POST['id_client'])){
	
	$contenu = '';

	$id_client = $_POST['id_client'];

	//on se connecte
	$connection = connectBD();
	if ($connection) {
		try {
			$req = $connection->query('SELECT * FROM clients WHERE id ="'.$id_client.'"');
			//$req = $pdo->query("SELECT * FROM profil WHERE pseudo='".$pseudo."'");

			
			if($donnee=$req->fetch())
			
			{
				echo '1';
				
			}
			else{
				echo "0";
			}
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
	echo "imppossible de se connecter!";
}

}



?>