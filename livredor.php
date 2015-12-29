<?php
session_start();

include_once('meta_header.php');
include_once('nav.php');   
include_once('lib/php/fonction.php');    
?>
<title>commentaires</title>
		</head>
		<body>
			<!--<h1 id="tiha"><span id="f">F</span><span id="a1">A</span><span id="t">T</span><span id="i">I</span><span id="h">H</span><span id="a">A</span></h1>-->

			
			<div id="content">
			<form id="laisserCom" name="laisserCom" method="POST" action="comments.php"><input type="submit" value="Laisser un commentaire?" ></form>
			<!--test commentaires  -->

			
			<div id="affichage">
				<h1 id="orTitle" >LIVRE D'OR</h1>
				<?php 

				//création de la variable contenu, initialement vide
				$contenu='';

				//on se connecte
				$connection = connectBD();
				if ($connection) {
					//on prépare la requête de selection, on l'organise par ordre de date
					$req='SELECT * FROM comments INNER JOIN clients ON comments.user_id = clients.id ORDER BY datecomments DESC';
					//$req='SELECT * FROM comments ORDER BY datecomments DESC';
					
					//on insere dans la variable results la requête
					$results = $connection->query($req);

					//si on trouve un résultat. Si la recherche est plus grande que 0
					if ($results->rowCount() > 0) {	

						//boucle pour récupérer les données
						foreach ($results as $key) {

								//on affiche les COMMENTAIRES

							//($key['facturationData']=='' ? '<white>Pas de facture disponible</white>' : '<white><b><a href="'.$key['facturationData'].'"> <green>Cliquez pour voir Votre Facture</green></a></b></white>')
								//($_SESSION['client'] == 1 ? '<or><b>'.$key['user_pseudo'].'</b></or>' : '<b><red>'.$key['user_pseudo'].'</b></red></br>')
								echo '	<div id="affichCom"><red>'.($key['client'] == 1 ? '<or><b>'.$key['user_pseudo'].'</b></or>' :'<red><b>'.$key['user_pseudo'].'</b></red>').'</br>
										<ul id="arrows">
										<li class="top-left">
										<span class="txt"><i><black>'.$key['comment'].'</black></span> <br></li></ul> <span class="marge" style="font-size:0.8em;"> <black> le '.$key['datecomments'].'</i> </black> </span></br></br> </div>';
							
								
									if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
										echo '<td><a class="marge" alt="Supprimer" href="orderTRT.php?action=3&id='.$key['id'].'&comment='.$key['comment'].'" ><img syle="float:right;" src="img/deleteRed.png"></a></td>';
									}
								

							

						}	
					}	
				}
				else{
						$contenu = '<red>Erreur : Impossible de se connecter à la BD, veuillez contacter votre administrateur!</red>';
				}
			?>
			</div>
			<?php


include_once('js/script_js.php');
?>

</body>
</html>