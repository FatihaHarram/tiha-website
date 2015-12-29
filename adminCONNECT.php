<?php

//on lance la session
session_start();

include_once('lib/php/fonction.php');
include_once('meta_header.php');
include_once('nav.php'); 


if( !isset($_SESSION['id']) )
	{
		
 ?>

<title>adminCONNECT</title>
</head>
<body>
	<div id="content">
		<div id="container">
	
			<h1 id="espcl">
				Espace Admin
			</h1>
			<br><br><br><br><br>

				<div id="connectionAdm" >
					
					<form  class="connectionAdm" name="connection" method="POST" action="connectionTRT.php">

						<fieldset>
							<legend><h2>CONNECTION</h2></legend>

							<label for="login">PSEUDO</label> 
							<input class="pseudo_con"  id="pseudo" type="text" name="pseudo" value="" maxlength="200" placeholder=" Votre pseudo" />
							<span class="erreur_message"></span> <br>

							<label for="login" >MOT DE PASSE</label>
							<input class="mdp_con"  id="mdp" type="password" name="mdp" value="" maxlength="200" placeholder=" Votre mot de passe ici" />
							<span class="erreur_message"></span> 

							<input type="submit" name="connecte" value="SE CONNECTER" id="connecte">
							<span class="envoi"></span>

						</fieldset>
					</form>
				</div> <!-- connectionEC-->
		</div> <!--container -->
	</div> <!--content-->
 
<?php 
include_once('js/script_js.php');
}

	
	else{
		// l'utilisateur est connecté, pas besoin de s'inscrire
		header ('refresh:0;url=coment.php');
		//echo'Vous êtes déjà inscrit!</br>';
		}	

?>
</body>
</html>