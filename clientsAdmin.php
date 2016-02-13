<?php
session_start();
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

include_once('lib/php/fonction.php');
include_once('meta_header.php');
include_once('nav.php'); 
 ?>

<title>admin</title>
</head>
<body>
 


	<div id="content">
		<div id="container_order" >
			<div id="client_client">
				<?php

						$conetenu="";

						//on se connecte
						$connection = connectBD();

						if($connection)
						{
							//requête de sélection
							$requête = 'SELECT * FROM clients';

							$resultats = $connection->query($requête);

							if($resultats->rowCount()>0)
							{
								//création d'une table
								echo '
									<table class="profil" >
									<td class="noir" >N° de client <b>(id)</b></td>
									<td class="noir">Nom </td>
									<td class="noir" id="name_client">Prénom <b>(name_client)</b></td>
									<td class="noir">Adresse &nbsp;  &nbsp;</td>
									<td class="noir">Téléphone </td>
									<td class="noir">E-mail  </td>
									<td class="noir">Mot de passe </td>
									<td class="noir">Date d\'inscription </td>
									<td class="noir">Admin  </td></td>
									<td class="noir">Client   </td>
									<td class="noir">User   </td>
									<td class="noir">Active </td>
									<td class="noir">Modifier </td>
									<td class="noir">Effacer </td>
									<td class="noir">Edit </td>';

								//boucle pour récupérer les données	
								foreach ($resultats as $key) 
								{
									//affichage de la commande
									echo '<tr class="tabOrder">
									<legend>
										<td>'.$key['id'].'</td>
										<td>'.$key['name'].' </td>
										<td>'.$key['firstname'].'</td>
										<td>'.$key['adress'].' </td>
										<td>'.$key['phone'].'</td>
										<td>'.$key['email'].' </td>
										<td>'.$key['mdp'].'</td>
										<td>'.$key['dateinscription'].'</td>
										<td>'.$key['admin'].'</td>
										<td>'.$key['client'].'</td>
										<td>'.$key['user'].'</td>
										<td>'.($key['active']=='' ? '0' : ''.$key['active']).'</td>
										<td><a alt="modifier" href="orderTRT.php?action=4&id='.$key['id'].'"" ><img syle="float:right;" src="img/change.png"></a></td>
										<td><a alt="Supprimer" href="orderTRT.php?action=2&id='.$key['id'].'"" ><img syle="float:right;" src="img/deleteRed.png"></a></td>
										<td><a alt="edit" href="editClient.php?edit=4&id='.$key['id'].'"" ><img syle="float:right;" src="img/change.png"></a></td>
									</legend>

										</tr>';
								}
							
								echo'</table>'; 
								
							}
						}
						else
						{
							$contenu = '<erreur>Erreur : Impossible de se connecter à la BD, veuillez contacter votre administrateur!</erreur>';
						}
					?>
			</div> <!--order-->
		</div><!--container-->
	</div><!--fin de la DIV content -->


<?php


include_once('js/script_js.php');
?>

</body>
</html>