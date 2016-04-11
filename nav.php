<?php
include_once('lib/php/fonction.php');
include_once('meta_header.php');
?>
<div class="topbar">
	<div class="fill">
		
		<div id="nav" >
			<a href="#" class="header__icon"> <img src="img/navicon.png"></a>
			<ul class="nav">

				<li><a class="a_index" href="index.php#acceuil">ACCUEIL</a></li>
				<li><a class="a_pres" href="index.php#presentation">PRESENTATION</a></li> 
				<li><a class="a_cv" href="index.php#cv">CURRICULUM VITAE</a></li>
				<li><a class="a_cv" href="projet.php">PROJETS</a></li>
				<li><a class="" href="contact.php">CONTACT</a></li>
				<li><a class="" href="livredor.php"><or>LIVRE D'OR</or></a></li>
				
				<?php
				if(isset($_SESSION['id'])){

					echo '
						
						<b><li><a id="deconnecter" href="deconnection.php"><input class="deconnecter" type="submit" value="SE DECONNECTER" ></a></li></b>';

					if($_SESSION['admin'] == 1){
						echo '<li><a class="aNav" href="admin.php">ADMIN</a></li>';
						
					}
					elseif ($_SESSION['client'] == 1 OR $_SESSION['user'] == 1) {
						echo '<li><a class="aNav" href="vip.php">ESPACE CLIENT</a></li>';
					}
				}
				else{
					?>
					<li><a id="espace_client" class="clientIcon" href="espaceclient.php"> <img data-popup="connection" src="img/clientwhite.png"><a/><li/>
					<li><a id="espace_client" class="adminIcon" href="adminCONNECT.php"> <img data-popup="ADMIN" src="img/admin.png"><a/><li/>
					
					<?php

					
					}

				?>
					<!--<li><a class="aNav" href="inscription.php">INSCRIPTION<a/></li>
				<li><a class="aNav" href="connection.php">CONNECTION<a/></li>
				<li><a class="aNav" href="coments.php">COMMENTAIRES<a/></li>-->
			</ul>
		</div>  <!--id nav -->
	
	</div>  <!--fill -->
</div> <!--topbar -->
