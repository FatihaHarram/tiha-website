<?php
session_start();

include_once('lib/php/fonction.php');
include_once('meta_header.php');
include_once('nav.php'); 
 ?>

<title>Acceuil</title>
</head>
<body id="index">
	<!--<h1 id="tiha"><span id="f">F</span><span id="a1">A</span><span id="t">T</span><span id="i">I</span><span id="h">H</span><span id="a">A</span></h1>-->

	<div id="content" class="container" >
		<!--<div id="container" class="container_index">-->
			<div id="acceuil" class="">
				<div class="">
					<h1 id="moi" class="text-center">
						Hi, I'm<br> 
						<span id="h2">H</span><span id="a_nom">A</span><span id="r">R</span><span id="r2">R</span><span id="a_nom2">A</span><span id="m">M</span> 
						<span id="f">f</span><span id="a1">a</span><span id="t">t</span><span id="i">i</span><span id="h">h</span><span id="a3">a</span><span>.</span>
					</h1>
				</div> <!--col-->
				<!--DIV Test -->
				<div id="citation">
					<h2 id="cit1">« Un peu de passion augmente l’esprit, beaucoup l’éteint. »<br>
					<i>Stendhal</i></h2>

					<h2 id="cit2">« La vocation, c'est avoir pour métier sa passion. »<br>
					<i>Stendhal</i></h2>
				

					<h2 id="cit3">« Rien de grand ne s’est accompli dans le monde sans passion. »<br>
					<i>Friedrich Hegel</i></h2>
									</div> <!-- citation -->
				<div id="citation1">
					<h2 id="cit4" syle="display:none;">« Un peu de passion augmente l’esprit, beaucoup l’éteint. »<br>
					<i>Stendhal</i></h2>

					<h2 id="cit5">« La vocation, c'est avoir pour métier sa passion. »<br>
					<i>Stendhal</i></h2>
					
					<h2 id="cit6">« Rien de grand ne s’est accompli dans le monde sans passion. »<br>
					<i>Friedrich Hegel</i></h2>
				</div>
				
				<div id="pic">
					 <div id="profile-container"> 
						<figure>
			  				<div class="parker"></div>
						</figure>
	  				</div>
	  			</div> <!-- picture -->

  			</div> <!--acceuil-->
  		
			<!--
				<div id="pic1">
						<img src="img/fh.jpg" alt="profil" >
					</div>
				-->
		<!--vide-->
		<span id="vide" class="parallax-window" data-parallax="scroll" data-image-src="img/Movie7.1.png"></span>

		<!-- présentation -->

		<div id="presentation">
			<h2 class="titre"><red>présentation</red></h2>
			
			<p> Je suis actuellement étudiante en <red> Web Development</red>. <br><br>
				Bruxelloise de <red>38 ans</red>, maman de deux enfants, j'ai décidé de me ré-orienter et de reprendre mes études. <red>Le Web</red> a été une évidence pour moi, cela représente
				la continuité logique de mon parcours professionnel. </p>
				<p><red>Ayant travaillé</red> dans la publicité en tant que Print Production Manager et Account Manager, j’ai toujours aimé allier <red>technique et créativité</red>. <br></br>
				<red>A présent</red>, je souhaite percer en tant que <red>Web Developer Front-End</red> pour un aboutissement complet de mon expérience et pour l'ouverture qu’offre ce métier sur <red>les technologies de l’information et de la communication</red>.<br>
				<red>Passion, </red>apprentissage continu, intégrité, challenge, sont mes maîtres-mots pour un épanouissement au travail.</p>
				<p>Je suis actuellement à la recherche d'un <red>emploi</red>, en tant que Web Developer Front-end.</p>
				<p>Ouverte à toute proposition de projet, vous pouvez me joindre par mail et/ou via mon formulaire de contact ici <a href="contact.php"><red>contactez-moi!</red></a>
			</p>

			<div id="branding" class="pres">
				<h2 class="titre"><red>Branding</red></h2> <P class="lign"><red>Identité et Logotype</red></P>
				<!-- <p>Nous créons chaque jour notre identité en nous habillant d'une certaine façon, par notre démarche, par notre
				attitude. Nous le faisons car nous avons besoin d'être identifié, tout comme votre marque, votre société, ou votre projet qui se doit d'avoir une image unique.
				</p> -->
			</div>

			<div id="webd" class="pres">
				<h2 class="titre"><red>Web</red></h2><P class="lign"><red>HTML / CSS / PHP / JAVASCRIPT/JS/AJAX</red></P>
				<!--<p>Grâce aux nouvelles technologies web, votre site peut être à la fois créatif, esthétique, original, pratique et ergonomique. Mes
				compétences en web develoment et en infographie me permettent la création de vos sites en leur donnant un fonctionnement et une accessiubilité aisée ainsi qu'un impact visuel fort et moderne.
				</p> -->
			</div>

			<div id="identity" class="pres">
				<h2 class="titre"><red>Print</red></h2><p class="lign"><red>COMMUNICATION VISUELLE</red></p>
				<!--<p>Grâce aux nouvelles technologies web, votre site peut être à la fois créatif, esthétique, original, pratique et ergonomique. Mes
				compétences en web develoment et en infographie me permettent la création de vos sites en leur donnant un fonctionnement et une accessiubilité aisée ainsi qu'un impact visuel fort et moderne.
				</p> -->
			</div>
		
		</div> <!--presentation-->

		<span id="vide2" class="parallax-window" data-parallax="scroll" data-image-src="img/Movie7.1.png"></span>

		<div id="cv">
			<h2 class="titre"><red>Curiculum Vitae</red></h2>
			<a href="img/cv.pdf"> <span id="telecharger"><red>Visionner le CV</red></span><img id="img_cv" src="img/cv.png"   alt="cv"></a>
		</div><!--cv-->

	<!--</div>-->
</div><!--content container-->

<?php
include_once('js/script_js.php');
?>
</body>
</html>