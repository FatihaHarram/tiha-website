<?php
session_start();
//on vérifie si l'utilisateur est un admin et s'il est connecté
	if (!isset($_SESSION['id']))
	{
		// l'utilisateur est renvoyé vers la page index
		header('refresh:0;url=index.php');
	}

	elseif ($_SESSION['admin'] == 1) 
	{
		//echo "<red>Vous pouvez dès à présent laisser un message</red>";
		// l'utilisateur est renvoyé vers la page index
		header('refresh:0;url=index.php');
	}
	else{  

		include_once('lib/php/fonction.php');
		include_once('meta_header.php');
		include_once('nav.php'); 
		 ?>
 
<title>espace client vip</title>
</head>

<body>
	<div id="content">
		<div id="container">
			<h1>
				Votre Espace VIP
			</h1>
			<div id="pVIP">
			<p><?php 
				echo 'Bonjour '.$_SESSION['name'].', '.$_SESSION['firstname'].', <br> Ceci est votre espace personnel. Vous y trouverez l\'état de votre commande, vos données personnelles ainsi 
				que vos factures payées et/ou impayées.';
				?>
			</p>
			</div>
			<div id="personanData">
				<div id="personanDataTB">
					<span class="close2" id="close_PD" style=" position: absolute; margin-left: 85%; margin-top: -5%;"><img src="img/CloseX64.png"></span>
					<form class="" id="changeClient" name="changeClient" method="POST" action="clientTRT.php">
					<fieldset >
					<legend>Fiche personnelle</legend>
					<table class="">
								
						<tr class="">
							<td class="">n° de client :</td>
							<td><?php echo '0000'.$_SESSION['id']; ?></td>
						</tr>	
						<tr><td></td><td></td></tr>		

						<tr class="">
							<td class="">Nom :</td>
							<td><?php echo $_SESSION['name']; ?></td>
						</tr>
						<tr><td></td><td></td></tr>
									
						<tr class="">
							<td class="">Prénom :</td>
							<td><?php echo $_SESSION['firstname']; ?></td>
						</tr>
						<tr><td></td><td></td></tr>
									
						<tr class="">
							<td class="">Adresse :</td>
							<td><?php echo $_SESSION['adress']; ?></td>
						</tr>

						<td class=""><red>Modifier</red></td>
						<td> <input class=""  id="adress" type="text" name="adress" value="<?php echo ' '.$_SESSION['adress'] ; ?>" maxlength="200" placeholder=" Modifier votre adresse" /><br></td>

						<tr><td></td><td></td></tr>

						<tr class="">
							<td class="">Téléphone :</td>
							<td><?php echo $_SESSION['phone']; ?></td>
						</tr>
						<td class="" ><red>Modifier</red></td>
						<td> <input class=""  id="phone" type="text" name="phone" value="<?php echo ' '.$_SESSION['phone'] ; ?>" maxlength="200" placeholder=" Modifier votre téléphone" /><br></td>
						<tr><td></td><td></td></tr>

						<tr class="">
							<td class="">Email :</td>
							<td><?php echo $_SESSION['email']; ?></td>
						</tr>
						<td class="" ><red>Modifier</red></td>
						<td><input class=""  id="email" type="email" name="email" value="<?php echo ' '.$_SESSION['email'] ; ?>" maxlength="200" placeholder=" email" /></td>
						<tr><td></td><td></td></tr>
					</table></br>

					<input type="submit" id="changeClient" name="changeClient" value="MODIFIER" style="width: 50%; margin-left: 25%;">
					</fieldset>
				</form>
			</div><!-- personanDataTB-->
			<input type="submit" name="show_pd" value="DONNEES PERSONNELLES" id="show_pd" class="show_personalData">
		</div> <!--personanData-->

<!--***************************************************************************************************************************************-->




<!--***************************************************************************************************************************************-->
	<?php 
	if ($_SESSION['client'] == 1) {	
	?>
		<div id="myOrder">
			<input type="submit" name="show_myOrder" value="MA COMMANDE" id="show_myOrder" class="show_myOrder">

			<div id="myOrderTB">
				<span class="close3" id="close3" style=" position: absolute; margin-left:85%; margin-top: -2%;"><img src="img/CloseX64.png"></span>
				<?php

				$id_client = $_SESSION['id'];

				//création de la variable contenu, initialement vide
				$contenu='';

				//on se connecte
				$connection = connectBD();

				if ($connection) {

					//on prépare la requête de selection, on l'organise par ordre de date
					$req='SELECT * FROM orders WHERE id_client='.$id_client.'';
							
					//on insere dans la variable results la requête
					$results = $connection->query($req);

					//si on trouve un résultat. Si la recherche est plus grande que 0
					if ($results->rowCount() > 0) {	

						//boucle pour récupérer les données
						foreach ($results as $key) {

							//on affiche les COMMENTAIRES
							echo '	<div id="order">
										<fieldset>	
										<legend>Fiche commande</legend>
										client <white><b>n°0000'.$key['id_client'].'</b></white></br>
										Commande <white><b>n°0000'.$key['id'].'</b></white></br><br>
										Mme/Mr :<white> <b>'.$key['name_client'].'</b></white><br>
										Votre commande est de type : <white><b>'.$key['orderType'].'</b></white><br>
										Voici une petite desciption de votre projet : <white><br><b>'.$key['orderDescr'].'</b></white><br>
										<h2>L\'évolution de votre projet</h2>
										Votre commande en est au stade de:<white> <b>'.$key['orderLevel'].'</white>.
										<table class="profil">
											<tr class="">
												<td class="">Briefing</td>
												<td>
													<div id="cont" data-pct="'.$key['briefingValue'].'" >
														<svg id="svg" width="100" height="100" viewPort="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
									  						<circle r="45" cx="50" cy="50" fill="transparent" stroke-dasharray="282.74" stroke-dashoffset="0"></circle>
									  						<circle id="bar" r="45" cx="50" cy="50" fill="transparent" stroke-dasharray="282.74" stroke-dashoffset="0"></circle>
														</svg>
													</div>
												<input type="hidden" id="percent" name="percent" value="'.$key['briefingValue'].'">
												</td>
											</tr>	
											<tr><td></td><td></td></tr>		

											<tr class="">
												<td class="">Envoi du cahier des charges</td>
												<td>
													<div id="cont1" data-pct="'.$key['envoiChValue'].'" >
														<svg id="svg1" width="100" height="100" viewPort="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
									  						<circle r="45" cx="50" cy="50" fill="transparent" stroke-dasharray="282.74" stroke-dashoffset="0"></circle>
									  						<circle id="bar1" r="45" cx="50" cy="50" fill="transparent" stroke-dasharray="282.74" stroke-dashoffset="0"></circle>
														</svg>
													</div>
												<input type="hidden" id="percent1" name="percent" value="'.$key['envoiChValue'].'">
												</td>
											</tr>
											<tr><td></td><td></td></tr>
																
											<tr class="">
												<td class="">Acceptation du cahier des charges</td>
												<td>
													<div id="cont2" data-pct="'.$key['okChValue'].'" >
														<svg id="svg2" width="100" height="100" viewPort="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
									  						<circle r="45" cx="50" cy="50" fill="transparent" stroke-dasharray="282.74" stroke-dashoffset="0"></circle>
									  						<circle id="bar2" r="45" cx="50" cy="50" fill="transparent" stroke-dasharray="282.74" stroke-dashoffset="0"></circle>
														</svg>
													</div>
													<input type="hidden" id="percent2" name="percent" value="'.$key['okChValue'].'">
												</td>
											</tr>
											<tr><td></td><td></td></tr>
																
											<tr class="">
												<td class="">Réalisation du design/visuel</td>
												<td>
													<div id="cont3" data-pct="'.$key['designValue'].'" >
														<svg id="svg3" width="100" height="100" viewPort="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
									  						<circle r="45" cx="50" cy="50" fill="transparent" stroke-dasharray="282.74" stroke-dashoffset="0"></circle>
									  						<circle id="bar3" r="45" cx="50" cy="50" fill="transparent" stroke-dasharray="282.74" stroke-dashoffset="0"></circle>
														</svg>
													</div>
													<input type="hidden" id="percent3" name="percent" value="'.$key['designValue'].'">
												</td>
											</tr>
											<tr><td></td><td></td></tr>

											<tr class="">
												<td class="">En production</td>
												<td>	
													<div id="cont4" data-pct="'.$key['prodValue'].'" >
														<svg id="svg4" width="100" height="100" viewPort="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
															<circle r="45" cx="50" cy="50" fill="transparent" stroke-dasharray="282.74" stroke-dashoffset="0"></circle>
									  						<circle id="bar4" r="45" cx="50" cy="50" fill="transparent" stroke-dasharray="282.74" stroke-dashoffset="0"></circle>
														</svg>
													</div>
													<input type="hidden" id="percent4" name="percent" value="'.$key['prodValue'].'">
												</td>
											</tr>
											<tr><td></td><td></td></tr>

											<tr class="">
												<td class="">En cours de livraison:</td>
												<td>
													<div id="cont5" data-pct="'.$key['livraisonValue'].'" >
														<svg id="svg5" width="100" height="100" viewPort="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
									  						<circle r="45" cx="50" cy="50" fill="transparent" stroke-dasharray="282.74" stroke-dashoffset="0"></circle>
									  						<circle id="bar5" r="45" cx="50" cy="50" fill="transparent" stroke-dasharray="282.74" stroke-dashoffset="0"></circle>
														</svg>
													</div>
													<input type="hidden" id="percent5" name="percent" value="'.$key['livraisonValue'].'">
												</td>
											</tr>
											<tr class="">
												<td class="">Facturation</td>
												<td>	
													<div id="cont6" data-pct="'.$key['facturValue'].'" >
														<svg id="svg6" width="100" height="100" viewPort="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
									  						<circle r="45" cx="50" cy="50" fill="transparent" stroke-dasharray="282.74" stroke-dashoffset="0"></circle>
									  						<circle id="bar6" r="45" cx="50" cy="50" fill="transparent" stroke-dasharray="282.74" stroke-dashoffset="0"></circle>
														</svg>
													</div>
													<input type="hidden" id="percent6" name="percent" value="'.$key['facturValue'].'">
												</td>
											</tr>				
										</table>
										</br>';
										if ($key['briefingValue']==100 || $key['okChValue']==100 || $key['envoiChValue']==100 || $key['designValue']==100 || $key['prodValue']==100 || $key['livraisonValue']==100 || $key['facturValue']==100) {				
										echo 'Veuillez télécharger votre facture :
											'.($key['facturationData']=='' ? '<white>Pas de facture disponible</white>' : '<white><b><a target="new" href="facture/'.$key['facturationData'].'"> <green>Cliquez pour voir Votre Facture</green></a></b></white>').'
												<br><br>
												<span class="txt"> la date de votre commande à été prise en charge le :<white><b> '.$key['date'].'</b></white></span><br></br>
										</fieldset> 
									</div> <!--order-->';
								}
									if ($key['briefingValue']==100 || $key['okChValue']==100 || $key['envoiChValue']==100 || $key['designValue']==100 || $key['prodValue']==100 || $key['livraisonValue']==100 || $key['facturValue']==100) {
										echo "<span class='txt'><a id='download' style='border-radius: 3px;	color: padding:5px; #8B8590; background-color: #96CA2D;' target='new' href='facture/".$key['facturationData']."'>Téléchargement facture</a></span>";
										# code...
									}
										}	
								}	
							}
							else{
									$contenu = '<red>Erreur : Impossible de se connecter à la BD, veuillez contacter votre administrateur!</red>';
							}

							?>
						</div><!--myOrderTB-->


					</div> <!--myOrder-->
	<?php				
	} //fin de if client == 1
	?>		
			</div><!--container-->
			</div><!-- content -->

					

		<?php
		include_once('js/script_js.php');
 	}
?>


    <script type="text/javascript" src="rotator.js"></script>
</body>
</html>