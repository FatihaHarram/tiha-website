<?php

//on lance la session
session_start();

include_once('lib/php/fonction.php');


if( isset($_SESSION['id']) )
	{
		// l'utilisateur est connecté, pas besoin de s'inscrire
		header ('refresh:0;url=comments.php');
		//echo'Vous êtes déjà inscrit!</br>';
	}	
	else{

include_once('meta_header.php');
include_once('nav.php'); 

 ?>
 
<title>comments</title>
</head>
<body>
	<!--<h1 id="tiha"><span id="f">F</span><span id="a1">A</span><span id="t">T</span><span id="i">I</span><span id="h">H</span><span id="a">A</span></h1>-->
	<div id="content">
		<div id="container">
		<h1 id="com">
			Laissez un commentaire!
		</h1>
		<div id="formulaires">
				
				<div id="connectionForm">

					<p id="con"></p> 
					<!--<span class="erreur_php"><br><?php //if(isset($_SESSION['erreurform_pseudo'])){echo $_SESSION['erreurform_pseudo'];} ?></span><br>-->
					<form id="connection" name="connection" method="POST" action="connectionTRT.php">
						
						<fieldset>
							<legend><h2>CONNECTION</h2></legend>

							<label for="pseudo" >PSEUDO <span class="erreur_php"><br><?php if(isset($_SESSION['erreurform_pseudo'])){echo $_SESSION['erreurform_pseudo'];}?></span></label>
							<input class="pseudo_con"  id="pseudo" type="text" name="pseudo" value="<?php if(isset($_SESSION['form_pseudo'])){ echo $_SESSION['form_pseudo'];} ?>" maxlength="200" placeholder=" Votre pseudo ici" />
							<span class="erreur_message"></span><br>
							 <span id="msg"></span></br>
							
							<!--<a href="pseudo.php" style="margin-left:60%; font-size:0.9em;"><i><red>Pseudo oublié?</red></i></a>	-->

							<!--<label for="password">Mot de passe</label>
    						<input type="password" id="password" name="password" placeholder="Password" class="password password-hidden">
    						<input type="text" id="password-shown" class="password password-shown" placeholder="Password">
    						<button class="togglepass">Show</button>-->

							<label for="password" >MOT DE PASSE <span class="erreur_php"><br><?php if(isset($_SESSION['erreurform_mdp'])){echo $_SESSION['erreurform_mdp'];}?></span></label>
							<input type="password" class="mdp_con"  id="mdp" name="mdp" value="<?php if(isset($_SESSION['form_mdp'])){ echo $_SESSION['form_mdp'];} ?>" maxlength="200" placeholder=" Votre mot de passe ici" />
							<span class="erreur_message"></span>  

							<input type="submit" name="connecte" value="SE CONNECTER" id="connecte">
							<span class="envoi"></span><span id="#msg"></span>
								<a href="registration.php"><i><red>pas encore inscrit(e)? s'inscrire</red></i></a>
 							

						</fieldset>

					</form>
				</div> <!--connectionForm-->

				
		</div><!--formulaires-->
	</div><!--container-->
</div><!--content-->
<?php 
include_once('js/script_js.php');
}
?>
</body>
</html>