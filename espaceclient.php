<?php
session_start();

include_once('lib/php/fonction.php');
include_once('meta_header.php');
include_once('nav.php'); 
 ?>

<title>ESPACE CLIENT</title>
</head>
<body>
	<div id="content">
		<div id="container">
	
			<h1 id="espcl">
				Espace client
			</h1> 

			<div id="connectionEC">
				<form  class="connectionEC" id="connection" name="connection" method="POST" action="clientTRT.php">
					<fieldset>
						<legend><h2>CONNECTION</h2></legend>

						<!--<label for="name">NAME <span class="erreur_php"><?php if(isset($_SESSION['erreurform_name'])){echo $_SESSION['erreurform_name'];}?></span></label>
						<input class="name"  id="name" type="text" name="name" value="<?php if(isset($_SESSION['form_name'])){ echo $_SESSION['form_name'];} ?>" maxlength="200" placeholder=" Votre nom ici" />
						<span class="erreur_message"></span><br>

						<label for="firstname">FIRSTNAME <span class="erreur_php"><?php if(isset($_SESSION['erreurform_firstname'])){echo $_SESSION['erreurform_firstname'];}?></span></label>
						<input class="firstname"  id="firstname" type="text" name="firstname" value="<?php if(isset($_SESSION['form_firstname'])){ echo $_SESSION['form_firstname'];} ?>" maxlength="200" placeholder=" Votre prénom ici" />
						<span class="erreur_message"></span><br>-->

						<label for="email">EMAIL <span class="erreur_php"><?php if(isset($_SESSION['erreurform_email'])){echo $_SESSION['erreurform_email'];}?></span></label>
						<input class=""  id="email" type="text" name="email" value="<?php if(isset($_SESSION['form_email'])){ echo $_SESSION['form_email'];} ?>" maxlength="200" placeholder=" Votre email ici" />
						<span class="erreur_message"></span>	&nbsp;<span class="msg"></span><br>
					

						<label for="mdp" >MOT DE PASSE <span class="erreur_php"><br><?php if(isset($_SESSION['erreurform_mdp'])){echo $_SESSION['erreurform_mdp'];}?></span> </label>
						<input class="mdp_con"  id="mdp" type="password" name="mdp" value="<?php if(isset($_SESSION['form_mdp'])){ echo $_SESSION['form_mdp'];} ?>" maxlength="200" placeholder=" Votre mot de passe ici" />
						<span class="erreur_message"></span>



						<input type="submit" name="connecte" value="SE CONNECTER" id="connecte">
						<span class="envoi_client"></span>
					</br></br>
						<a href="registration.php"><i><red>pas encore inscrit(e)? s'inscrire</red></a>
					</fieldset>
				</form>
			</div><!--connectionEC-->
				<!--<span class="erreur_php"><br><?php //if(isset($_SESSION['erreurform_pseudo'])){echo $_SESSION['erreurform_pseudo'];} ?></span><br>-->
		</div><!--container-->
	</div> <!--content-->

<?php
include_once('js/script_js.php');
?>
</body>
</html>