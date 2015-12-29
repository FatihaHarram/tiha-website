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
			<h1 id="espcl">
				Espace client
			</h1> 
			<div id="inscriptionForm">
				<form class="connectionEC" id="inscription" name="inscription" method="POST" action="adminTRT.php">
				
					<fieldset>
						<legend><h2>INSCRIPTION</h2></legend>

						<label for="pseudo" >PSEUDO <span class="erreur_php"><br><?php if(isset($_SESSION['erreurform_pseudo'])){echo $_SESSION['erreurform_pseudo'];}?></span></label>
						<input class="pseudo_Inscr"  id="pseudo" type="text" name="pseudo" value="<?php if(isset($_SESSION['form_pseudo'])){ echo $_SESSION['form_pseudo'];} ?>" maxlength="200" placeholder=" Votre pseudo ici" />
						<span class="erreur_message"></span>
						<span id="msgbox"></span></br>

						<label for="name">NOM</label>
						<input class=""  id="name" type="text" name="name" value="" maxlength="200" placeholder=" Votre nom ici" /><br>

						<label for="firstname">PRENOM</label>
						<input class=""  id="firstname" type="text" name="firstname" value="" maxlength="200" placeholder=" Votre prénom ici" /><br>

						<label for="adress">ADRESSE</label>
						<input class=""  id="adress" type="text" name="adress" value="" maxlength="200" placeholder=" Votre adresse ici" /><br>

						<label for="phone">TELEPHONE</label>
						<input class=""  id="phone" type="text" name="phone" value="" maxlength="200" placeholder=" Votre téléphone ici" /><br>

						<label for="email" >E-MAIL <span class="erreur_php"><br><?php if(isset($_SESSION['erreurform_email'])){echo $_SESSION['erreurform_email'];}?></span></label>
						<input class="email_inscr"  id="email" type="mail" name="email" value="<?php if(isset($_SESSION['form_email'])){ echo $_SESSION['form_email'];} ?>" maxlength="200" placeholder=" Votre mail ici" />
						<span class="erreur_message"></span> 
						<span class="msgbox"></span></br>

						<label for="password">MOT DE PASSE  <span class="erreur_php"><br><?php if(isset($_SESSION['erreurform_mdp'])){echo $_SESSION['erreurform_mdp'];}?></span></label>
						<input class="mdp_inscr"  id="mdp" type="password" name="mdp" value="<?php if(isset($_SESSION['form_mdp'])){ echo $_SESSION['form_mdp'];} ?>" maxlength="200" placeholder=" Votre mot de passe ici" />
						<span class="erreur_message"></span>

						
						<!--input du formulaire-->
						<input type="submit" name="add" value="ADD" id="add">
						<!--<input type="submit" name="add" value="S'INSCRIRE" id="add">-->
					</br></br>
						<a href="espaceclient.php"><i><red>déja inscrit(e)? Se connecter</red></a>

					</fieldset>
				</form>
			
			</div> <!--inscriptionForm-->
	</div><!--container-->
</div><!--content-->
<?php 
include_once('js/script_js.php');
}
?>
</body>
</html>