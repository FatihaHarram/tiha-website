<?php
	//on demarre la session
    session_start();
    //les includes
	include_once('lib/php/fonction.php');
 	
	//on vérifie si l'utilisateur est un admin et s'il est connecté
	if (!isset($_SESSION['id']))
	{
		// l'utilisateur est renvoyé vers la page index
		header('refresh:0;url=index.php');
	}
	elseif ($_SESSION['admin'] == 0) 
	{
		// l'utilisateur est renvoyé vers la page index
		header('refresh:0;url=index.php');
	}

			//s'il y a action et le $_GE['id']
			if(isset($_GET['action']) && isset($_GET['id']))
			{
				//le contenu est vide
				$contenu="";
				//on se connecte à la BD
				$connection = connectBD();

				//si l'action est = à 1
				if($_GET['action'] == 1)
				{
					try{
						//on lance la requête
						$connection->beginTransaction();
						$connection->exec('DELETE FROM orders WHERE id='.$_GET['id']);
						$connection->commit();	

						//on rempli le contenu
						$contenu=" Commandes</h1> <red>La commande n° ".$_GET['id']." à été supprimée!</red>";

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
				header('refresh:2;url=order.php');
				
				}

				if($_GET['action'] == 2)
				{
					try{
						//on lance la requête
						$connection->beginTransaction();
						$connection->exec('DELETE FROM clients WHERE id='.$_GET['id']);
						$connection->commit();	

						//on rempli le contenu
						$contenu=" Clients</h1> <red>Le client n° ".$_GET['id']." à été supprimée!</red>";

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
						header('refresh:2;url=clientsAdmin.php');
				}

				if($_GET['action'] == 3)
				{
					try{
						//on lance la requête
						$connection->beginTransaction();
						$connection->exec('DELETE FROM comments WHERE id='.$_GET['id']);
						$connection->commit();	


						//on rempli le contenu
						$contenu="  Commentaires</h1> <red>Le commentaire n° ".$_GET['id']." dont le contenu est juger <b>inapproprié</b> à été supprimé!</br><b>CONTENU</b> : ".$_GET['comment']."</red>";

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

						header('refresh:2;url=livredor.php');
				}

				if($_GET['action'] == 4)
				{
					try{
						

						//requête de sélection
						$requête = 'SELECT * FROM clients';
						$resultats = $connection->query($requête);
						
						if($resultats->rowCount()>0){
							foreach ($resultats as $key) {
								$user = $key['user'];
								$client = $key['client'];

								if ($user === 1 && $client === 0 ){
									# code...
									//on lance la requête
									$connection->beginTransaction();
									$connection->exec('UPDATE clients SET user = 0, client = 1 WHERE id='.$_GET['id']);
									$connection->commit();	
									//on rempli le contenu
									$contenu="<h3>  Commentaires</h3> <red>L'utilisateur n° ".$_GET['id']." a été modifié en client avec succes!";
								} 
								else {
									# code...

									//on rempli le contenu
									$contenu="<h3>  Commentaires</h3> <red>L'utilisateur n° ".$_GET['id']." est déjà client!";
								}
							}
						} 
						

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

						header('refresh:2;url=clientsAdmin.php');
				}

						
		?>

	
	<title>ORDERTRT</title>
	</head>

		<body>
		<div id="content">
			<div id="container">
				<?php ?>
			<h1>Administration

				<?php 	
				include_once('meta_header.php');
				echo $contenu;
			} 
				?>
			</div><!--container-->
		</div><!--content-->
 	
	</body>
</html>