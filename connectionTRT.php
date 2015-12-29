<?php 
//on lance la session
session_start();

	require_once ('lib/php/fonction.php');//on fait appel à la page fonction pour la connection!

	if( isset($_POST['connecte']) )
		{
			//Le contenu est vide
			$contenu ='';
			
			//pas d'erreur par default
			$_SESSION['erreurform'] = false;

			//valider les données entrées par l'utilisateur
			//valider_mail($_POST['login']);
			valider_pseudo($_POST['pseudo']);
			valider_mdp($_POST['mdp']);

			//on vérifie s'il y a erreur
			if($_SESSION['erreurform'])
			{
				//s'il y a erreur, réinitialisation de l'erreur de connection
				$_SESSION['erreur_connection'] = '';

				//renvoie vers la page avec le formulaire
				header('refresh:0;url=form.php');
			}
			else 
			{
				//connection à la BD
				$connection = connectBD();

				if($connection){
					//on récupère les données sécurisées du formulaire 
					//$email 		= secureData($_POST['login']);
					$pseudo		= secureData($_POST['pseudo']);
					$mdp 		= md5(secureData($_POST['mdp']));
					
					$_SESSION['pseudo'] = $pseudo;
					$_SESSION['mdp'] = $mdp;
					
					//on connecte l'utilisateur grace à la fonction
					$connecte = login($connection, $pseudo, $mdp );
					
					//si connection
					if( $connecte )
					{
						if ($_SESSION['admin'] == 1) 
						{
							// l'utilisateur est renvoyé vers la page admin
							header('refresh:3;url=admin.php');
							$contenu = '<red>Bonjour notre administrateur de choc, <b>'.$_SESSION['pseudo'].',</b> Vous avez été connecté avec succès!</red>';
					
						}
						else{
							header('refresh:3;url=comments.php');
							
							//on prépare le contenu à afficher
							$contenu = '<red>Bonjour <b>'.$_SESSION['pseudo'].',</b> Vous avez été connecté avec succès!</red>';

						}
					
					}
					else
					{
						//on prépare l'erreur à afficher
						$_SESSION['erreur_connection'] = '<red>Votre login ou mot de passe est erroné!</red>';
						
						//renvoi vers la page du formulaire de connection
						header('refresh:3;url=form.php');
						
						$contenu = '<red>'.$pseudo. ', Ce pseudo ou mot de passe n\'existe pas! Veuillez réessayer ou vous inscrire.</red>';
					}
				}
				else{
					$contenu= '<red>Vous n\'êtes pas connecté à la BD, veuillez contacter votre administrateur!</red>';
				}

			}

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
	}
	else
	{
		//accès à la page sans passer par le formulaire -> redirection vers la page d'index
		header('refresh:2;url=index.php');
	}
?>
