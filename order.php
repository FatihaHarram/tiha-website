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
		<div id="container_order">

<!--***************************************************************************************************************************************-->

		<div id="order_order">
			<?php

					$conetenu="";

					//on se connecte
					$connection = connectBD();

					if($connection)
					{
						//requête de sélection
						$requête = 'SELECT * FROM orders';

						$resultats = $connection->query($requête);

						if($resultats->rowCount()>0)
						{
							//création d'une table
							echo '
								<table class="profil" >
								<td class="noir" >N° de commande <b>(id)</b></td>
								<td class="noir">ID du Client <b>(id_client)</b></td>
								<td class="noir" id="name_client">nom du client <b>(name_client)</b></td>
								<td class="noir">Type de commande &nbsp;  &nbsp;</td>
								<td class="noir">Description de la commande <span id="txt">jdbfbqjhqbfjFHKEBdfsqfsesfF<span> </td>
								<td class="noir">Niveau de la commande<span id="txt">jdbfbqjhqbfjFHKEBdfsqfs<span>  </td>
								<td class="noir">Valeur Briefing </td>
								<td class="noir">Valeur envoi C.H. </td>
								<td class="noir">Valeur accord C.H. </td>
								<td class="noir">Valeur Design </td>
								<td class="noir">Valeur Production </td>
								<td class="noir">Valeur Livraison </td>
								<td class="noir">Valeur Facturation </td>
								<td class="noir">Facture </td>
								<td class="noir">Date </td>
								<!-- <td class="noir">Modifier </td> -->
								<td class="noir">Effacer </td>';

							//boucle pour récupérer les données	
							foreach ($resultats as $key) 
							{
								$name_client = $key['name_client'];

								//affichage de la commande
								echo '<tr class="tabOrder">
								<legend>
									<td>'.$key['id'].'</td>
									<td>'.$key['id_client'].' </td>
									<td>'.$key['name_client'].' 
										<!--<label id="name_client" for="name_client"></label>
										
										<input id="name_client" style="" type="text" name="name_client"  value="'.$name_client.'" >-->
									</td>


									<td>'.$key['orderType'].' 
										<!--<select id="orderType" name="orderType"  tabindex="3">
												<option value="'.$key['orderType'].'" selected>'.$key['orderType'].'</option>
							    				<option value="web">WEB</option>
							    				<option value="print">PRINT</option>
							    				<option value="strategie">STRATEGIE</option>
							    				<option value="design">DESIGN</option>
							    				<option value="all">PACKAGE : WEB - PRINT - STRATEGIE - DESIGN</option>
										</select>	-->
									</td>

									<td>'.$key['orderDescr'].' <!-- <textarea id="orderDescr" name="orderDescr" spellcheck="true" rows="3" cols="50" >'.$key['orderDescr'].'</textarea> --></td>
									<td>'.$key['orderLevel'].' 
										<!-- <select id="orderLevel" name="orderLevel"  tabindex="3">
												<option value="'.$key['orderLevel'].'" selected>'.$key['orderLevel'].'</option>
							    				<option value="Briefing">Briefing</option>
							    				<option value="EnvoiCH">Envoi du cahier des charges</option>
							    				<option value="AcceptCH">Acceptation du cahier des charges</option>
							    				<option value="design">Réalisation du design/visuel</option>
							    				<option value="production">En production</option>
							    				<option value="livraison">Facturation</option>
										</select>	-->
									</td>

									<td>'.$key['briefingValue'].'% 
										<!-- <input type="text" id="briefingValue" name="briefingValue" value="'.$key['briefingValue'].'" maxlength="200" placeholder=" %" style=" "> -->
									</td>
									<td>'.$key['envoiChValue'].'%
										<!-- <input type="text" id="envoiChValue" name="envoiChValue" value="'.$key['envoiChValue'].'" maxlength="200" placeholder=" %" style=""> -->
									</td>
									<td>'.$key['okChValue'].'%
										<!-- <input type="text" id="okChValue" name="okChValue" value="'.$key['okChValue'].'" maxlength="200" placeholder=" %" style=""> -->
									</td>
									<td>'.$key['designValue'].'%
										<!-- <input type="text" id="designValue" name="designValue" value="'.$key['designValue'].'" maxlength="200" placeholder=" %" style=""> -->
									</td>
									<td>'.$key['prodValue'].'%
										<!-- <input type="text" id="prodValue" name="prodValue" value="'.$key['prodValue'].'" maxlength="200" placeholder=" %" style=" "> -->
									</td>
									<td>'.$key['livraisonValue'].'%
										<!-- <input type="text" id="livraisonValue" name="livraisonValue" value="'.$key['livraisonValue'].'" maxlength="200" placeholder=" %" style=""> -->
									</td>
									<td>'.$key['facturValue'].'%
										<!-- <input type="text" id="facturValue" name="facturValue" value="'.$key['facturValue'].'" maxlength="200" placeholder=" %" style=""> -->
									</td>
									<td>'.$key['facturationData'].'
										<!-- <input type="text" name="facturationData" value="'.$key['facturationData'].'" placeholder="facture" id="facturationData" > -->
									</td>
									<td>'.$key['date'].'</td>
									<!-- <td><a alt="modifier" href="orderTRT.php?action=2&id='.$key['id'].'"" ><img syle="float:right;" src="img/change.png"></a></td>-->
									<td><a alt="Supprimer" href="orderTRT.php?action=1&id='.$key['id'].'"" ><img syle="float:right;" src="img/deleteRed.png"></a></td>
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

		</div>


		</div><!--container-->
	</div><!--fin de la DIV content -->


<?php


include_once('js/script_js.php');
?>

</body>
</html>