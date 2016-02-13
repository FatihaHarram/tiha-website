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
			<a  href="macommande.php" id="show_myOrder" class="show_myOrder uniq">MA COMMANDE</a>

			<div id="myOrderTB">
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