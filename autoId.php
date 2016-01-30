<?php
include_once('lib/php/fonction.php');


if (isset($_POST['name_client'])) {

		# on récupère les données entrées par l'utilisateur
		$name_client = $_POST['name_client'];
		//on se connecte
		$connection = connectBD();

		if ($connection) {
			try {
				$req = 'SELECT * FROM clients WHERE name ="'.$name_client.'"';
				//$req = $pdo->query("SELECT * FROM profil WHERE pseudo='".$pseudo."'");

				//on insere la requete dans la variable results
				$results = $connection->query($req);

				//si on trouve un résultat. Si la recherche est plus grande que 0
				if ($results->rowCount() > 0) {	

					//boucle pour récupérer les données
					foreach ($results as $key) {

						//on affiche l'id
						$id_client = $key['id'];
						$name_client = $key['name'];

						// echo $id_client.', '.$name_client;
						echo $id_client;
									
					}	
					// echo $id_client.', '.$name_client;
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









		

	//on se connecte
	/*$connection = connectBD();
	if ($connection) {

		try {
			$req = $connection->query('SELECT * FROM clients WHERE name = "'.$name_client.'');
			//$req = $pdo->query("SELECT * FROM profil WHERE pseudo='".$pseudo."'");

			$array = array();

			while($donnee=$req->fetch())
			
			{
				$name = $donnee['name'];
				$firstname = $donnee['firstname'];
				$id = $donnee['id'];

				$data["value"] = $name;
				$data["label"] = $id;

				array_push($array,$data['label']); // et on ajoute celles-ci à notre tableau
				
			}

			echo json_encode($array);
		
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


		/*
	$term = $_GET['term'];

			$req = $connection->prepare('SELECT * FROM clients WHERE name LIKE :term || firstname LIKE :term ORDER BY id'); // j'effectue ma requête SQL grâce au mot-clé LIKE
			$req->execute(array('term' => '%'.$term.'%'));

			$array = array(); // on créé le tableau


			while($data = $req->fetch()) // on effectue une boucle pour obtenir les données
			{
				$name = $data['name'];
				$firstname = $data['firstname'];
				$id = $data['id'];

				//$data['id'] = $code;
				$data["value"] = $name.' '.$firstname;
				$data["label"] = $name.' '.$firstname.' '.$id;

				//array_push($a_json, $a_json_row);
    			
    			array_push($array, $data['label']); // et on ajoute celles-ci à notre tableau
			}
				$list = json_encode($array);

				echo $list;







		*/

 
?>