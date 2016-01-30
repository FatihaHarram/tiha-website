<?php
//on requière le fichier config pour l'affichage des erreurs!
require_once('config.php');




/***********************************************************************************************************************************
										FONCTION DE CONNECTION À LA BASE DE DONNÉE
************************************************************************************************************************************/
	function connectBD(){
		//essayer de se connecter à la base de donnée
		try{
			//on se connecte à la base de donnée
			//$connection=$connection=new PDO('mysql:host=193.37.145.62; dbname=tiha580311','tiha580311','imrane2206');
			$connection=$connection=new PDO('mysql:host=localhost; dbname=websitehf','root','root');
			//$connection=$connection=new PDO('mysql:host=193.37.145.62; dbname=tiha580311','tiha580311','imrane2206');	
			//$connection = new PDO('mysql:host=localhost; dbname=harramfatihaportfolio', 'root', '');

			//on prend l'UTF8 en compte
			$connection->exec('SET NAME UTF8');
			//renvoie les données de connection à la base de donnée
			return $connection;

		}
		//si erreur PDO renvoie une exception qui permet de capturer l'erreur
		catch (Exception $e){
			echo '<red>Impossible de se connecter à la base de donnée. Veuillez contacter votre administrateur!</red><br>';
			echo '<red>Erreur : '.$e->getMessage().'</red><br>';
			echo '<red> Erreur :'.$e->getCode().'</red><br>';

			//on sort de la connection 
			exit();

		}

	}




/***********************************************************************************************************************************
										FONCTION DE LA CRÉATION DE SESSION SUR LES DONNÉES ($DATA)
************************************************************************************************************************************/
	function setSession($data){

		if(!isset($_SESSION)){
			//on lance la session
			session_start();
		}

		$_SESSION['id'] 				= $data['id'];
		$_SESSION['email'] 				= $data['email'];
		$_SESSION['pseudo'] 			= $data['pseudo'];
		$_SESSION['mdp'] 				= $data['mdp'];
		$_SESSION['dateinscription'] 	= $data['dateinscription'];
		$_SESSION['admin'] 				= $data['admin'];
		//$_SESSION['client'] 			= $data['client']; //user pour tout les utilisateurs
	}


/***********************************************************************************************************************************
											FONCTION DE LA MISE EN SESSION DES CLIENT($DONNEE)
************************************************************************************************************************************/

	function setSessionClient($donnee){
	
		
		$_SESSION['id'] 				= $donnee['id'];
		$_SESSION['pseudo'] 			= $donnee['pseudo'];
		$_SESSION['name'] 				= $donnee['name'];
		$_SESSION['firstname'] 			= $donnee['firstname'];
		$_SESSION['adress'] 			= $donnee['adress'];
		$_SESSION['phone'] 				= $donnee['phone'];
		$_SESSION['email'] 				= $donnee['email'];
		$_SESSION['mdp'] 				= $donnee['mdp'];
		$_SESSION['dateinscription'] 	= $donnee['dateinscription'];
		$_SESSION['admin'] 				= $donnee['admin'];
		$_SESSION['client'] 			= $donnee['client'];
		$_SESSION['user']				= $donnee['user'];

	}





/***********************************************************************************************************************************
													FONCTION POUR SÉCURISER LES DONNÉES
************************************************************************************************************************************/

	//trim (les espaces en trop et tabulation), stripslaches(élimination des slaches), htmlspecialchars (interdiction de caractères html)
	function secureData($data){
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);

			//on renvoie les données sécurisés
			return $data;


	}



/***********************************************************************************************************************************
													FONCTION DE CONNECTION (USERS)
************************************************************************************************************************************/
	function login($connection, $pseudo, $mdp){

		try{

			//on lance la requête pour récupérer le login et le mot de passe de l'utilisateur
			$results=$connection->query('SELECT * FROM clients WHERE pseudo="'.$pseudo.'" AND mdp="'.$mdp.'" ' );

			//on vérifie si on a des résultats, rowCount retourne le nombre de lignes affectées/si results est + grand que 0
			if($results -> rowCount() > 0 ){

				//on lance la transaction
				$connection->beginTransaction();
				//$connection->exec('UPDATE users SET ip="'.$_SERVER['REMOTE_ADDR'].'" WHERE pseudo="'.$pseudo.'" AND mdp="'.$mdp.'"');

				//on lance la requête pour récupérer le login et le mot de passe de l'utilisateur
				$results=$connection->query('SELECT * FROM clients WHERE pseudo="'.$pseudo.'" AND mdp="'.$mdp.'" ' );

			
				//on place les données dans un tableau
				$array=$results->fetch(PDO::FETCH_ASSOC);

				//appel de la fonction 	qui créer la session de l'utilisateur
				//...a créer...
				setSession( $array );

				//on termine le traitement de la requête en fermant le curseur d'analyse de résultats
				$results->closeCursor();

				//valider la transaction
				$connection->commit();

				//on ferme la connection
				unset($connection);

				//on créer les cookies pseudo et mdp
				if( !isset($_COOKIE['pseudo']) || !isset($_COOKIE['email']) ){	

				//s'il n'y a pas de cookie pseudo, ou email on en créé (cookie pseudo et cookie mot de passe d'une durée de 7 jours)				
				setcookie('pseudo',$_SESSION['pseudo'],$GLOBALS['duree'],$GLOBALS['chemin'],$GLOBALS['domaine'],$GLOBALS['https'],$GLOBALS['httponly']); 
				setcookie('email',$_SESSION['email'],$GLOBALS['duree'],$GLOBALS['chemin'],$GLOBALS['domaine'],$GLOBALS['https'],$GLOBALS['httponly']);
				setcookie('mdp',$_SESSION['mdp'],$GLOBALS['duree'],$GLOBALS['chemin'],$GLOBALS['domaine'],$GLOBALS['https'],$GLOBALS['httponly']); 

				}

				//on retourne vrai
				return true;

			}
			else{
				//sinon on retourne faux
				return false;

			}

		}//si erreur
		catch(Exception $e){

			echo '<red>ERREUR [0022] : Erreur lors de la requête. Veuillez contacter votre administrateur!</red>';
			echo '<red> Erreur : '.$e->getMessage().'</red><br>';
			echo '<red> Erreur : '.$e->getCode().'</red><br>';

			//on sort de la connection
			exit();
		}
	}





/***********************************************************************************************************************************
													FONCTION DE CONNECTION (CLIENTS)
************************************************************************************************************************************/
	function loginClient($connection,$email,$mdp){

		try{

			//on lance la requête pour récupérer le login et le mot de passe de l'utilisateur
			$results=$connection->query('SELECT * FROM clients WHERE email="'.$email.'" AND mdp="'.$mdp.'" ' );
			//$results=$connection->query('SELECT * FROM clients WHERE name="'.$name.'" AND firstname="'.$firstname.'" AND email="'.$email.'" AND mdp="'.$mdp.'" ' );

			//on vérifie si on a des résultats, rowCount retourne le nombre de lignes affectées/si results est + grand que 0
			if($results -> rowCount() > 0 ){

				//on lance la transaction
				$connection->beginTransaction();
				//$connection->exec('UPDATE users SET ip="'.$_SERVER['REMOTE_ADDR'].'" WHERE pseudo="'.$pseudo.'" AND mdp="'.$mdp.'"');

				//on lance la requête pour récupérer le login et le mot de passe de l'utilisateur
				$results=$connection->query('SELECT * FROM clients WHERE email="'.$email.'" AND mdp="'.$mdp.'" ' );

			
				//on place les données dans un tableau
				$array=$results->fetch(PDO::FETCH_ASSOC);

				//appel de la fonction 	qui créer la session de du client
				//...a créer...
				setSessionClient( $array );

				//on termine le traitement de la requête en fermant le curseur d'analyse de résultats
				$results->closeCursor();

				//valider la transaction
				$connection->commit();

				//on ferme la connection
				unset($connection);

				//on créer les cookies mail et mdp
				if( !isset($_COOKIE['email']) || !isset($_COOKIE['mdp']) ){	

					//s'il n'y a pas de cookie pseudo, ou email on en créé (cookie pseudo et cookie mot de passe d'une durée de 7 jours)				
					setcookie('email',$_SESSION['email'],$GLOBALS['duree'],$GLOBALS['chemin'],$GLOBALS['domaine'],$GLOBALS['https'],$GLOBALS['httponly']);
					setcookie('mdp',$_SESSION['mdp'],$GLOBALS['duree'],$GLOBALS['chemin'],$GLOBALS['domaine'],$GLOBALS['https'],$GLOBALS['httponly']); 

				}

				//on retourne vrai
				return true;

				}
				else{
				//sinon on retourne faux
				return false;

			}

		}//si erreur
		catch(Exception $e){

			echo '<red>ERREUR [0022] : Erreur lors de la requête. Veuillez contacter votre administrateur!</red>';
			echo '<red> Erreur : '.$e->getMessage().'</red><br>';
			echo '<red> Erreur : '.$e->getCode().'</red><br>';

			//on sort de la connection
			exit();
		}
	}



/***********************************************************************************************************************************
													VALIDATION DES CHAMPS DU FORMULAIRE
************************************************************************************************************************************/
	//validation du champs mail
	function valider_mail($email){	
		$_SESSION['form_email'] = $email; //sauvegarder les données du champ en session, en cas de retour en arriére.
	
		if(!preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9])+([a-zA-Z0-9\._-])*\.([a-zA-Z])+$/', $email)) //expression régulière
		{
			$_SESSION['erreurform'] = true;
			$_SESSION['erreurform_email'] = '<red>E-mail non valide! ex: fatiha@gmail.com</red>';
		}

		else
		{
			$_SESSION['erreurform_email'] = '';
		}

	}

	//validation du champs pseudo
	function valider_pseudo($pseudo){ 	
		 $_SESSION['form_pseudo'] = $pseudo; //sauvegarder les données du champ en session, en cas de retour en arriére.

		//Expression régulière : login avec 2 à 12 caractéres alphabétiques ou alphanumérique
		//si ces éléments ne sont pas présents dans le pseudo, on mets l'erreur en session
	    if( !preg_match('/^[a-zA-Z0-9]{2,12}$/', $pseudo) ) //expression régulière
		{
			$_SESSION['erreurform']       = true; // l'erreur est vrai
			$_SESSION['erreurform_pseudo'] = '<red>Pseudo non valide! 2 à 12 caractéres.</red>'; // on instencie notre texte d'erreur
		}
		else
		{	//sinon l'erreur est vide
			$_SESSION['erreurform_pseudo'] = '';
		}
	}

	//validation du champs mdp
	function valider_mdp($mdp){ 	
		$_SESSION['form_mdp'] = $mdp; //sauvegarder les données du champ en session, en cas de retour en arriére.

		//mot de passe contenant de 2 à 12 caractères alphabétiques
		if(!preg_match('/^[a-zA-Z0-9]{2,12}$/', $mdp) && !preg_match('[a-z]', $mdp) && !preg_match('[0-9]', $mdp))//expression régulière

		{
			$_SESSION['erreurform'] = true;
			$_SESSION['erreurform_mdp'] = '<red>Mot de passe non valide! il faut de 2 à 12 caract max.</red>';

		}
		else
		{
			$_SESSION['erreurform_mdp'] = '';
		}


	}

	//fonction qui valide le nom
	function valider_name($name){
		//on sauvegarde les données du champ, dans une session, si il y a une erreur et si 'il faut revenir en arriére
		$_SESSION['form_name'] = $name;

		//nom avec 2 à 20 caractères et pas d'espace [0-57A-Za-z.-]
		if(!preg_match("/^[^ -][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð\s '-]{2,20}$/", $name)){
			$_SESSION['erreurform'] = true;
			$_SESSION ['erreurform_name'] = '<red>Veuillez entrer un nom valide!</red>'; 
		}else{
			$_SESSION['erreurform_name'] = '';
		}
	}

	//conftion qui valide le prénom
	function valider_firstname($firstname){
		//on sauvegarde les données du champ, dans une session, si il y a une erreur et si 'il faut revenir en arriére
		$_SESSION['form_firstname'] = $firstname;

		// prénom avec 2 à 20 caractères et pas d'espaces
		if(!preg_match("/^[^ -][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð\s '-]{2,20}$/", $firstname)){
			$_SESSION['erreurform'] = true;
			$_SESSION ['erreurform_firstname'] = '<red>Veuillez enter un prénom valide!</red>';
		}else{
			$_SESSION['erreurform_firstname'] = '';
		}
	}






/***********************************************************************************************************************************
													FONCTIONPOUR GÉNÉRER UN MOT DE PASSE ALÉATOIRE
************************************************************************************************************************************/
	function genererMDP ($longueur = 8){
	// initialiser la variable $mdp
	$mdp = "";
 
	// Définir tout les caractères possibles dans le mot de passe, 
	// Il est possible de rajouter des voyelles ou bien des caractères spéciaux
	$possible = "2346789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
 
	// obtenir le nombre de caractères dans la chaîne précédente
	// cette valeur sera utilisé plus tard
	$longueurMax = strlen($possible);
 
	if ($longueur > $longueurMax) { //si la longueur est supérieure à la longueurmax, on l'initialise à la longueurmax.
		$longueur = $longueurMax;
	}
 
	// initialiser le compteur à 0
	$i = 0;
 
	// ajouter un caractère aléatoire à $mdp jusqu'à ce que $longueur soit atteint
	while ($i < $longueur) { //si i est plus perir que la longueur
		// prendre un caractère aléatoire
		$caractere = substr($possible, mt_rand(0, $longueurMax-1), 1);
 
		// vérifier si le caractère est déjà utilisé dans $mdp
		if (!strstr($mdp, $caractere)) {
			// Si non, ajouter le caractère à $mdp et augmenter le compteur
			$mdp .= $caractere;
			$i++;
		}
	}
 
	// retourner le résultat final
	return $mdp;
}

function genererTOKEN($token){
	$token = md5(uniqid(rand()));
	echo $token;
	return $token;

}

/*TEST*/
function pseudo($connection, $email,$pseudo){
	try{

			//on lance la requête pour récupérer le login et le mot de passe de l'utilisateur
			$results=$connection->query('SELECT * FROM users WHERE email="'.$email.'" ' );

			//on vérifie si on a des résultats, rowCount retourne le nombre de lignes affectées/si results est + grand que 0
			if($results -> rowCount() > 0 ){

				//on lance la transaction
				$connection->beginTransaction();

				//on lance la requête pour récupérer le login et le mot de passe de l'utilisateur
				$results=$connection->query('SELECT * FROM users WHERE email="'.$email.'"');

			
				//on place les données dans un tableau
				$array=$results->fetch(PDO::FETCH_ASSOC);

				//appel de la fonction 	qui créer la session de l'utilisateur
				//...a créer...
				setSession( $array );

				//on termine le traitement de la requête en fermant le curseur d'analyse de résultats
				$results->closeCursor();

				//valider la transaction
				$connection->commit();

				//on ferme la connection
				unset($connection);

				//on créer les cookies email
				if(!isset($_COOKIE['email']) ){	

				//s'il n'y a pas de cookie pseudo, ou email on en créé (cookie pseudo et cookie mot de passe d'une durée de 7 jours)				
				setcookie('email',$_SESSION['email'],$GLOBALS['duree'],$GLOBALS['chemin'],$GLOBALS['domaine'],$GLOBALS['https'],$GLOBALS['httponly']);
				}

				//on retourne vrai
				return true;

			}
			else{
				//sinon on retourne faux
				return false;

			}

		}//si erreur
		catch(Exception $e){

			echo '<red>ERREUR [0022] : Erreur lors de la requête. Veuillez contacter votre administrateur!</red>';
			echo '<red> Erreur : '.$e->getMessage().'</red><br>';
			echo '<red> Erreur : '.$e->getCode().'</red><br>';

			//on sort de la connection
			exit();
		}

}

/***********************************************************************************************************************************
										FONCTION QUI VÉRIFIE SI L'ID CLIENT EXISTE
************************************************************************************************************************************/
	function verif_id_client($id_client){
	//connection à la BD
		$connection = ConnectBD();	
		//On vérifie si on est bien connecté
		if( $connection ){
			//exécution de la requête pour vérifier si le login existe déjà dans la table utilisateurs
			$resultats = $connection->query('SELECT id_client FROM orders WHERE id_client="'.$id_client.'"');
			
			//on vérifie si on a obtenu des résultats, si oui le login existe déjà
			if( $resultats->rowCount() > 0 )
			{
				//$resultats->rollback();
				//$pdo->rollback();
				
						echo '<red>Une commande existe déjà pour cet ID client! <br> <b>Vérifiez vos commandes!</b>
						Si vous voulez la modifier! Utilisez le formulaire adéquat!</red>';
						//on renvoie à la page pour remplir le formulaire de commentaire
						header('refresh:5; url=admin.php');
			
			
				exit();

			}
			
		}
		else
		{
			$contenu = 'Erreur: Impossible de se connecter à la BD!';						
		}
}

/***********************************************************************************************************************************
										FONCTION QUI VÉRIFIE L'EMAIL CLIENT N'EST PAS EN DOUBLE
************************************************************************************************************************************/
function verif_clients($email){
	//connection à la BD
		$connection = ConnectBD();	
		//On vérifie si on est bien connecté
		if( $connection ){
			//exécution de la requête pour vérifier si le login existe déjà dans la table utilisateurs
			$resultats = $connection->query('SELECT email FROM clients WHERE email="'.$email.'"');
			
			//on vérifie si on a obtenu des résultats, si oui le login existe déjà
			if( $resultats->rowCount() > 0 )
			{
				//$resultats->rollback();
				//$pdo->rollback();
				
						echo '<red>Cet email exite déja, pour un autre client! <br> <b>Vérifiez vos entrées clients.</b></red>';
						//on renvoie à la page pour remplir le formulaire de commentaire
						header('refresh:5; url=admin.php');
			
			
				exit();

			}
		}
		else
		{
			$contenu = 'Erreur: Impossible de se connecter à la BD!';						
		}
}
