<?php 

//on lance la session 
session_start();

	require_once ('lib/php/fonction.php');//on fait appel à la page fonction pour la connection!
	

/********************************************************************************************************************
									CONNECTION À L'ESPACE CLIENT (PAGE VIP)
*********************************************************************************************************************/	 
	if( isset($_POST['connecte']) ){
			//Le contenu est vide
			$contenu ='';

			//pas d'erreur par default
			$_SESSION['erreurform'] = false;

			//valider les données entrées par l'utilisateur
			//valider_name($_POST['name']);
			//valider_firstname($_POST['firstname']);
			valider_mail($_POST['email']);
			valider_mdp($_POST['mdp']);

			//on vérifie s'il y a erreur
			if($_SESSION['erreurform']){
				//s'il y a erreur, réinitialisation de l'erreur de connection
				$_SESSION['erreur_connection'] = '';

				//renvoie vers la page avec le formulaire
				header('refresh:0;url=espaceclient.php');

			}else{
				//connection à la BD
				$connection = connectBD();

				if($connection){
					//on récupère les données sécurisées du formulaire 
					//$name		= secureData($_POST['name']);
					//$firstname	= secureData($_POST['firstname']);
					$email 		= secureData($_POST['email']);
					$mdp 		=  md5(secureData($_POST['mdp']));
					
					//$_SESSION['name'] = $name;
					//$_SESSION['firstname'] = $firstname;
					$_SESSION['email'] = $email;
					$_SESSION['mdp'] = $mdp;
					
					//on connecte l'utilisateur grace à la fonction
					$connecte = loginClient($connection,$email,$mdp);

					
					//si connection
					if( $connecte ){
							header('refresh:3;url=vip.php');
							
							//on prépare le contenu à afficher
							$contenu = '<red>Bonjour <b>'.$_SESSION['email'].'</b> Vous avez été connecté avec succès!</red>';
					
					}else{
						//on prépare l'erreur à afficher
						$_SESSION['erreur_connection'] = '<red>Votre login ou mot de passe est erroné!</red>';

						//renvoi vers la page du formulaire de connection
						header('refresh:1;url=espaceclient.php');
						$contenu = '<red>'.$email. ', vous n\'êtes pas connecté!!! '.$_SESSION['erreur_connection'].'</red>';
					}
				}else{
					$contenu= '<red>Vous n\'êtes pas connecté à la BD, veuillez contacter votre administrateur!</red>';
				}

			}

			include_once('meta_header.php'); 
?>


			<?php

	}//fin if isset connect 


/********************************************************************************************************************
												MODIFICATION DE MOT DE PASSE 
*********************************************************************************************************************/	

	if(isset($_POST['changeClient'])){
		//Le contenu est vide
			$contenu ='';

			//pas d'erreur par default
			$_SESSION['erreurform'] = false;

			//valider les données entrées par l'utilisateur
			valider_mail($_POST['email']);

			//on vérifie s'il y a erreur
			if($_SESSION['erreurform']){
				//s'il y a erreur, réinitialisation de l'erreur de connection
				$_SESSION['erreur_connection'] = '';

				//renvoie vers la page avec le formulaire
				header('refresh:0;url=vip.php');

			}else{
				//connection à la BD
				$connection = connectBD();

				if($connection){
					//on récupère les données sécurisées du formulaire
					$id 		=	$_SESSION['id'];
					$adress		=	$_POST['adress'];
					$phone		=	$_POST['phone']; 
					$email 		= 	secureData($_POST['email']);
					$_SESSION['adress']=$adress;
					$_SESSION['phone']=$phone;
					$_SESSION['email']=$email;

					$req=$connection->prepare('UPDATE clients SET adress="'.$adress.'", phone="'.$phone.'", email="'.$email.'" WHERE id = ?')->execute([$id]);

					$contenu = '<red>Votre profil a été modifié avec succès!</red>';
							
					//on renvoie à la page pour remplir le formulaire de commentaire
					header('refresh:3; url=vip.php');
				}else{
					$contenu= '<red>Vous n\'êtes pas connecté à la BD, veuillez contacter votre administrateur!</red>';
				}


			}

	}//fin if isset ini


/********************************************************************************************************************
												MODIFICATION DE MOT DE PASSE 
*********************************************************************************************************************/	

	if(isset($_POST['ini'])){
		//Le contenu est vide
			$contenu ='';

			//pas d'erreur par default
			$_SESSION['erreurform'] = false;

			//valider les données entrées par l'utilisateur
			valider_mail($_POST['email']);
			valider_mdp($_POST['mdp']);

			//on vérifie s'il y a erreur
			if($_SESSION['erreurform']){
				//s'il y a erreur, réinitialisation de l'erreur de connection
				$_SESSION['erreur_connection'] = '';

				//renvoie vers la page avec le formulaire
				header('refresh:0;url=espaceclient.php');

			}else{
				//connection à la BD
				$connection = connectBD();

				if($connection){
					//on récupère les données sécurisées du formulaire 
					$email 		= secureData($_POST['email']);
					$mdp 		= md5(secureData($_POST['mdp']));

					$req=$connection->prepare('UPDATE clients SET mdp="'.$mdp.'" WHERE email = ?')->execute([$email]);

					$contenu = '<red>Votre mot de passe a été modifié avec succès! <b>Vous pouvez dès à présent vous connecter!</b></red>';
							
					//on renvoie à la page pour remplir le formulaire de commentaire
					header('refresh:3; url=espaceclient.php');
				}else{
					$contenu= '<red>Vous n\'êtes pas connecté à la BD, veuillez contacter votre administrateur!</red>';
				}


			}

	}//fin if isset ini

	include_once('meta_header.php');
	?>

		<title>Connection</title>
</head>
	<body>	
		<div id="content">
			<div id="container">
		
			<?php
				//affichage du contenu de la page
				echo '<h3>'.$contenu.'</h3>';
				?>
			</div> <!--container-->
		</div><!--content-->
	</body>
	</html>
<?php

?>