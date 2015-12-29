<?php
include_once('lib/php/fonction.php');


if(isset($_POST['pseudo'])){
	
	$contenu = '';

	$pseudo = $_POST['pseudo'];
	

	//on se connecte
	$connection = connectBD();
	if ($connection) {
		try {
			$req = $connection->query('SELECT * FROM clients WHERE pseudo="'.$pseudo.'"');
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
}//fin if isset


if(isset($_POST['email'])){
	
	$contenu = '';

	$email = $_POST['email'];

	//on se connecte
	$connection = connectBD();
	if ($connection) {
		try {
			$req = $connection->query('SELECT * FROM users WHERE email="'.$email.'"');
			$req = $connection->query('SELECT * FROM clients WHERE email="'.$email.'"');
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
}//fin if isset


//Autocomplete

//if (!isset($_REQUEST['term']))
//exit();

/* if the 'term' variable is not sent with the request, exit */
if ( !isset($_REQUEST['term']) ) {
	exit;
}

	//on se connecte
	$connection = connectBD();
	if ($connection) {
		try {
			/*$req = $connection->query('SELECT * FROM clients WHERE name LIKE "'.ucfirst($_REQUEST['term']).'%" ORDER BY id ASC LIMIT 0.10', $connection);
			$data = array();
			while ($row = mysql_fetch_assoc($req, MYSQL_ASSOC)) {
				$data[] = array(
					'label' => $row['name'],
					'value' => $row['name']
					);
					# code...
			}

			$contenu = json_data($data);
			flush();*/


			/* retrieve the search term that autocomplete sends */
			$term = trim(strip_tags($_GET['term'])); 
			$a_json = array();
			$a_json_row = array();
			if ($data = $connection->query("SELECT * FROM clients WHERE name LIKE '%$term%' OR firstname LIKE '%$term%' ORDER BY name , firstname")) {
				while($row = mysqli_fetch_array($data)) {
					$name = htmlentities(stripslashes($row['name ']));
					$firstname = htmlentities(stripslashes($row['firstname']));
					$id = htmlentities(stripslashes($row['id']));
					$a_json_row["id"] = $code;
					$a_json_row["value"] = $name.' '.$firstname;
					$a_json_row["label"] = $name.' '.$firstname;
					array_push($a_json, $a_json_row);
				}
			}
			// jQuery wants JSON data
			echo json_encode($a_json);
			flush();
		
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






 
?>