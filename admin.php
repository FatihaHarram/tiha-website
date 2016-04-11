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
		<div id="container" class="adminContainer">
	
			<h1>
				Administration
			</h1>
			<?php
			//$mdp = genererMDP ($longueur = 8);
			//echo $mdp;
			?>
			<!--Fiche Client-->
			<!-- <div id="fiche_client" >  -->
				<!--formulaire de la fiche client-->
				<!-- <form  class="" id="add_client" name="add_client" method="POST" action="adminTRT.php" > -->
					<!-- <header> -->
			    		<!-- <h2>Fiche client</h2> -->
			    		<!--Fermeture du formulaire avec la croix-->
			    		<!-- <span class="close" style=" position: absolute; margin-left: 72%; margin-top: -30%;"><img src="img/CloseX64.png"></span> -->
			  		<!-- </header> -->
					<!-- <fieldset> -->
						<!-- <legend><h2 style="font-size:1em;">NOUVEAU CLIENT</h2></legend> -->
						<!-- <label for="name">NAME</label> -->
						<!-- <input class=""  id="name" type="text" name="name" value="" maxlength="200" placeholder=" Name" /><br> -->

						<!-- <label for="firstname">FIRSTNAME</label> -->
						<!-- <input class=""  id="firstname" type="text" name="firstname" value="" maxlength="200" placeholder=" firstname" /><br> -->

						<!-- <label for="adress">ADRESS</label> -->
						<!-- <input class=""  id="adress" type="text" name="adress" value="" maxlength="200" placeholder=" adress" /><br> -->

						<!-- <label for="phone">PHONE</label> -->
						<!-- <input class=""  id="phone" type="text" name="phone" value="" maxlength="200" placeholder=" phone" /><br> -->

						<!-- <label for="email">EMAIL</label> -->
						<!-- <input class=""  id="email" type="email" name="email" value="" maxlength="200" placeholder=" email" /><br> -->

						<!-- <label for="mdp">MOT DE PASSE</label> -->
						<!-- <input class=""  id="mdp" type="password" name="mdp" value="<?php echo $mdp; ?>" maxlength="200" placeholder=" MDP"/><br> -->
						<!--input du formulaire-->
						<!-- <input type="submit" name="add" value="ADD" id="add"> -->
					<!-- </fieldset> -->
				<!-- </form> -->
				<!--Bouton input pour montrer le formulaire-->
				<!-- <input type="submit" name="show_clientForm" value="NOUVEAU CLIENT" id="show_clientForm" class="show_clientForm"> -->
			<!-- </div> -->









<!--*******************************************************COMMANDE********************************************************************************-->

	
		<!--Commande client-->
			<div id="commande_client">
				<!--Formulaire de la fiche commande-->
				<form class="" id="add_order" name="add_order" method="POST" action="adminTRTorder.php" enctype="multipart/form-data" >
					<!--Fermeture du formulaire avec la croix-->
					<span class="close1" style=" position: absolute; margin-left: 85%; margin-top: -3%;"><img src="img/CloseX64.png"></span>
			 
			    	<h2>Fiche commande</h2>
					<label id="" for="clients">n° de client</label> <!--id client -->
					<input type="text" class="client" id="id_client" name="id_client"  value="" placeholder=" ID du client" tabindex="1">
					<span id="msgbox"></span><br>


					<label id="name_client" for="name_client">Nom client</label>
					<input type="text" id="name_clientU" class="name_client" name="name_client"  list="frameworks" value="" placeholder=" Nom du client" tabindex="2">
					<p></p>


					<fieldset>
						<legend>Type de commandes</legend>
					    <label for="orderType" id="orderType"> </label>
						<select id="orderType" name="orderType"  tabindex="3">
						    <option value="web">WEB</option>
						    <option value="print">PRINT</option>
						    <option value="strategie">STRATEGIE</option>
						    <option value="design">DESIGN</option>
						    <option value="all">PACKAGE : WEB - PRINT - STRATEGIE - DESIGN</option>
						</select>	
					</fieldset> 
				 	
				 	<fieldset>
				 		<legend>Descriptif commande</legend>
		    			<label for="orderDescr" id="orderDescr" ></label>
					    <textarea id="orderDescr" name="orderDescr" spellcheck="true" rows="10" cols="50" tabindex="4"></textarea>
					</fieldset>

					<fieldset>
						<legend id="orderLevel" class="desc">Niveau de la commande</legend>
						<select id="orderLevelU" name="orderLevel" style="color:black;" tabindex="4">
								<option value="option" style="color:black;">Choisir une option</option> <!-- 0% de la commande  -->
							    <option value="1" style="color:black;">Briefing</option>	<!-- 20% de la commande  -->
							    <option value="2" style="color:black;">Envoi du cahier des charges</option>	<!-- 40% de la commande  -->
							    <option value="3" style="color:black;">Acceptation du cahier des charges</option>	<!-- 60% de la commande  -->
							    <option value="4" style="color:black;">En production</option>	<!-- 80% de la commande  -->
							    <option value="5" style="color:black;">Réalisation du design/visuel</option>
							    <option value="6" style="color:black;">En cours de livraison</option>	<!-- 90% de la commande  -->
							    <option value="7" style="color:black;">Facturation</option>	<!-- 100% de la commande  -->
						</select>	
					</fieldset> 


					<fieldset>
						<legend id="orderValue" class="desc">Percentage</legend>
						<select id="orderValueU" name="orderValue" style="color:black;" tabindex="4">
								<?php
								for ($i=1; $i <= 100 ; $i++) { 
									echo "<option value='";
									echo $i;
									echo "'>";
									echo $i;
									echo "</option>";
								}
								?>
						</select>	
					</fieldset>

					<fieldset>
						<legend>Facturation</legend>
						<input type="hidden" name="MAX_FILE_SIZE" value="100000"/> Ajout d'une facture <input type="file" name="facture" id="facture" tabindex="11"/>
						<input type="hidden" name="facturationData" value="facture/" placeholder="facture" id="facturationData"> 
				
					</fieldset>
					<!--Submit du formulaire-->
					<input type="submit" id="saveForm" name="saveForm" value="SAVE" tabindex="15">
				</form>
				<!--Bouton input pour monter le formulaire-->
				<input type="submit" name="show_clientOrder" value="NOUVELLE COMMANDE" id="show_clientOrder" class="show_clientOrder">
			</div>



<!--***********************************************************MODIFIER COMMANDE****************************************************************************-->

			<!--Modifier une commande-->
			<div id="modifCommande">
				<!--Bouton input pour montrer le formulaire-->
				<input type="submit" name="changeOrder" id="changeOrder" value="MODIFIER COMMANDE EXISTANTE"  class="show_changeOrder">
				
				<!--Formulaire de la fiche commande-->
				<form class="" id="changeOrderForm" name="add_order" method="POST" action="adminTRTchange.php" enctype="multipart/form-data" >
					<!--Fermeture du formulaire avec la croix-->
					<span class="close2" style=" position: absolute; margin-left: 85%; margin-top: -3%;"><img src="img/CloseX64.png"></span>
			 		
			    	<h2>Modification commande</h2>
					<label id="orders" for="orders">n° de commande</label> <!--id client -->
					<input type="text" class="" id="id_clientL" name="id"  value="" placeholder=" ID de la commande" tabindex="1">
					<span id="msgbox"></span><br>

					<label id="name_client" for="name_client">Nom client</label>
					<input type="text" id="name_clientL"  class="name_client" name="name_client"  value="" placeholder=" Nom du client" tabindex="2">

					<fieldset>
						<legend>Type de commandes</legend>
					    <label for="orderType" id="orderType"> </label>
						<select id="orderType" name="orderType"  tabindex="3">
						    <option value="web">WEB</option>
						    <option value="print">PRINT</option>
						    <option value="strategie">STRATEGIE</option>
						    <option value="design">DESIGN</option>
						    <option value="all">PACKAGE : WEB - PRINT - STRATEGIE - DESIGN</option>
						</select>	
					</fieldset>
				 	
				 	<fieldset>
				 		<legend>Descriptif commande</legend>
		    			<label for="orderDescr" id="orderDescr" ></label>
					    <textarea id="orderDescr" name="orderDescr" spellcheck="true" rows="10" cols="50" tabindex="4"></textarea>
					</fieldset>

					<fieldset>
						<legend id="orderLevel" class="desc">Niveau de la commande</legend>
						<select id="orderLevelL" name="orderLevel" style="color:black;" tabindex="4">
								<option value="option" style="color:black;">Choisir une option</option> <!-- 0% de la commande  -->
							    <option value="1" style="color:black;">Briefing</option>	<!-- 20% de la commande  -->
							    <option value="2" style="color:black;">Envoi du cahier des charges</option>	<!-- 40% de la commande  -->
							    <option value="3" style="color:black;">Acceptation du cahier des charges</option>	<!-- 60% de la commande  -->
							    <option value="4" style="color:black;">En production</option>	<!-- 80% de la commande  -->
							    <option value="5" style="color:black;">Réalisation du design/visuel</option>
							    <option value="6" style="color:black;">En cours de livraison</option>	<!-- 90% de la commande  -->
							    <option value="7" style="color:black;">Facturation</option>	<!-- 100% de la commande  -->
						</select>	
					</fieldset> 


					<fieldset>
						<legend id="orderValue" class="desc">Percentage</legend>
						<select id="orderValueL" name="orderValue" style="color:black;" tabindex="4">
								<?php
								for ($i=1; $i <= 100 ; $i++) { 
									echo "<option value='";
									echo $i;
									echo "'>";
									echo $i;
									echo "</option>";
								}
								?>
						</select>	
					</fieldset>

					<fieldset>
						<legend>Facturation</legend>
						 <input type="hidden" name="MAX_FILE_SIZE" value="100000"/> Ajout d'une facture <input type="file" name="facture" id="facture" tabindex="11"/>
						<input type="hidden" name="facturationData" value="facture/" placeholder="facture" id="facturationData">
					</fieldset>
					<!--Submit du formulaire-->
					<input type="submit" id="change" name="change" value="MODIFIER" tabindex="15">
				</form>
			 
			</div>







<!--***************************************************ADMINISTRATION COMMANDES************************************************************************************-->

			<div id="modifCommande" class="orders">
				<form class="" id="" name="order" method="POST" action="order.php"  >
					<!--Bouton input pour montrer le formulaire-->
					<input type="submit" name="changeOrder" class="commandes" id="changeOrder" value="ADMINISTRATION COMMANDES"  >
				</form>
			</div>



<!--*******************************************************ADMINISTRATION CLIENTS********************************************************************************-->

			<div id="fiche_client" class="orders">
				<form class="" id="" name="client" method="POST" action="clientsAdmin.php"  >
					<!--Bouton input pour montrer le formulaire-->
					<input type="submit" name="changeClient" class="clients" id="changeOrder" value="ADMINISTRATION CLIENTS"   >
				</form>
			</div>


<!--******************************************************ADMINISTRATION COMMENTAIRES*********************************************************************************-->

			<div id="fiche_com" class="orders">
				<form class="" id="" name="client" method="POST" action="livredor.php"  >
					<!--Bouton input pour montrer le formulaire-->
					<input type="submit" name="deleteCom" class="deleteCom" id="deleteCom" value="ADMINISTRATION COMMENTAIRES"   >
				</form>
			</div>

		</div> <!--container-->
	</div><!--fin de la DIV content -->
	<?php
			include_once('js/script_js.php');
	?>
</body>
</html>