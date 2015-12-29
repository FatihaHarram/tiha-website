<?php

//on lance la session
session_start();

include_once('lib/php/fonction.php');
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
			Modifier mot de passe
		</h1>
	
		
		
			<div id="connectionEC" >

				<form  class="connectionEC" name="connection" method="POST" action="clientTRT.php">

					<fieldset>
						<legend><h2>MODIFICATION</h2></legend>

						<label for="email">EMAIL <span class="erreur_php"><?php if(isset($_SESSION['erreurform_email'])){echo $_SESSION['erreurform_email'];}?></span></label>
						<input class=""  id="email" type="text" name="email" value="<?php if(isset($_SESSION['form_email'])){ echo $_SESSION['form_email'];} ?>" maxlength="200" placeholder=" Votre prénom ici" />
						<span class="erreur_message"></span>&nbsp;<span class="msg"></span><br>


						<label for="mdp" >NOUVEAU MOT DE PASSE <span class="erreur_php"><br><?php if(isset($_SESSION['erreurform_mdp'])){echo $_SESSION['erreurform_mdp'];}?></span> </label>
						<input class="mdp_con"  id="mdp" type="password" name="mdp" value="<?php if(isset($_SESSION['form_mdp'])){ echo $_SESSION['form_mdp'];} ?>" maxlength="200" placeholder=" Votre mot de passe ici" />
						<span class="erreur_message"></span>

						<input type="submit" name="ini" value="MODIFIER" id="ini">

						<span class="envoi_client"></span>

					</fieldset>
				</form>
			</div>


	
	</div><!--coontainer-->
		
</div><!--content-->
 
<?php 
include_once('js/script_js.php');
?>
</body>
</html>