<?php
include_once('lib/php/fonction.php');


//Autocomplete

	//on se connecte
	$connection = connectBD();
	if ($connection) {
		try {
			/* veillez bien à vous connecter à votre base de données */

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




			//json_encode($array); // il n'y a plus qu'à convertir en JSON
			//echo $code;
		
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


			/* retrieve the search term that autocomplete sends 
			$term = trim(strip_tags($_GET['term'])); 
			$a_json = array();
			$a_json_row = array();
			if ($data = $connection->query("SELECT * FROM clients WHERE name LIKE '%$term%' OR firstname LIKE '%$term%' ORDER BY id")) {
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
			flush();*/






 
?>