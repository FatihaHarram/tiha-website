<?php
session_start();

include_once('meta_header.php');
include_once('nav.php');   
include_once('lib/php/fonction.php');    
?>
<title>commentaires</title>
</head>
<body>
	<div id="content">
		<div id="container">
			<?php 
				//si l'utilisateur est connecté, il a accèes au formulaire pour écrire son commentaire
				if( isset($_SESSION['id'])){
					if (isset($_SESSION['pseudo'])) {
						$user_pseudo = $_SESSION['pseudo'];
					}//else{
						//$user_pseudo = $_SESSION['firstname'];
					//}

					echo '<red><h3 id="titreComent">Hello '.$user_pseudo.', laissez votre commentaire!</h3></red>';

			?>
			<div id="formulaires">
				<form id="formCom" name="formCom" method="POST" action="comTRT.php">
					<fieldset>
						<legend><?php echo '<h3>Commentaire</h3>'; ?></legend>

						<textarea name="comment" id="comment" rows="15" cols="100" placeholder=" Votre commentaire ici"></textarea>
						<span class="erreur_message" style="margin-left:25%;"></span>
														
						<input type="submit" name="validCom" value="ENVOYER" id="validCom">
						
						<span class="envoi"></span>

					</fieldset>	
				</form>
			</div> <!--formulaires-->
		</div><!--container-->			
	</div><!--content-->
	
			<?php 
			include_once('js/script_js.php');
				} else{
					// l'utilisateur n'est pas connecté, il est rediriger vers la page avec les formulaires d'inscription et/ou de connection
					header ('refresh:0;url=espaceclient.php');
				}
			?>
</body>
</html>