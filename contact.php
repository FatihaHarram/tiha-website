<?php
session_start();

include_once('lib/php/fonction.php');
include_once('meta_header.php');
include_once('nav.php'); 
 ?>

<title>contact</title>
</head>
<body>
	<div id="content">

		<div id="container">
			<div id="header_contact"> 
			  	<h2> Vous avez des questions? </h2>

			  	<p>Vous pouvez me contacter à tout moment, via mon formulaire de contact, par téléphone ou email. </br>
			  	Vous trouverez mes coordonnées complètes. </br>Je serais ravie de répondre à vos questions. </p>   
			  </br>
			  	<p>
			  		<img src="img/phone.png">	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;	0477/89 42 05		
			  	</p>
			  		<p>
			  		<img src="img/mail.png">	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;	info@tiha.be		
			  	</p>
			</div>   
			  
			<div id="contact-wrap">   
				<div id="contact-area">
					<form method="post" action="mailto:info@tiha.be">

			        	<input type="text" name="Name" id="Name" placeholder="Full Name" />
						<input type="text" name="City" id="City" placeholder="City"/>
						<input type="text" name="Email" id="Email" placeholder="Email"/>
						<input type="text" name="Phone" id="Phone" placeholder="Phone"/>							
						<textarea name="Message" rows="20" cols="20" id="Message" placeholder="Message"></textarea>
						<input type="submit" name="submit" value="Submit" class="submit-button"/>
					</form>
			    </div><!--contact-aera-->
		    </div> <!--contact-wrap-->
		</div><!--container-->
	</div> <!--content-->

<?php
include_once('js/script_js.php');
?>
</body>
</html>