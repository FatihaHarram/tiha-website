// JavaScript Document
$(document).ready(function(){

/***********************************************************************************************************************************
													DEBUT
************************************************************************************************************************************/	



/***********************************************************************************************************************************
													NAVIGATION
************************************************************************************************************************************/	
	$('#nav a').mouseover( function(){
		//alert('vouvou!');
		$(this).css('font-family', 'Sketch Rockwell');
		$(this).css('font-size', '1.1em');
	});

	$('#nav a').mouseleave( function(){
		//alert('vouvou!');
		$(this).css('font-family', '');
		$(this).css('font-size', '');
	});
/***********************************************************************************************************************************
													CITATIONS
************************************************************************************************************************************/	

	 function cit3(){
		$('#cit3').animate({ 'top' : 0 + '%', 'left' : -80 + '%'}, 3500, 'linear');
	}
	$('#cit1').animate({
		'top' : 42 + '%',
		'left':90 + '%'
	}, 3000, "swing",  function() {
  		$('#cit2').fadeIn(3000);
  		setTimeout(cit3, 3000);
	});

	function citation(){
		$('#citation').fadeOut(3000);
	}

/***********************************************************************************************************************************
													IMAGE PICTURE
************************************************************************************************************************************/	

	function pic(){
		if(screen > 1200+'px'){
			$('#pic').animate({'top': 35 +'%'}, 2500, 'linear');
			$('body').css('overflow:hidden;')
		}else{$('#pic').animate({'top': -65 +'%'}, 2500, 'linear');}
	}
	setTimeout(citation,10000);

	setTimeout(pic, 10500);


	/*$('#pic').mouseover(function(){
		$(this).css('border',' black solid 1px');
	});
	$('#pic').mouseleave(function(){
		$(this).css('border','');
	});*/

/***********************************************************************************************************************************
												scroll + arrow
************************************************************************************************************************************/	
	$(".a_index").click(function() {
		$("html, body").animate({scrollTop: -Math.round($("#presentation").offset().top) + "%"}, 2500);
		//$("html, body").animate({scrollLeft: Math.round($("#acceuil").offset().left) + "px"}, 2000);
		//$("#vide").animate({'top': 0 + '%'}, 2500, 'swing');
	});
	$(".a_pres").click(function() {
		$("html, body").animate({scrollTop: Math.round($("#presentation").offset().top) + "px"}, 2500);
		//$("html, body").animate({scrollLeft: Math.round($("#presentation").offset().left) + "px"}, 2000);
		//$('#presentation').fadeIn('fast');
		//$('#cv').fadeOut('fast');
	});
	$(".a_cv").click(function() {
		$("html, body").animate({scrollTop: Math.round($("#cv").offset().top) + "%"}, 2500);
		//$('#presentation').fadeOut('fast');
		$("#cv").css('display', 'block'); 
	});

	
/***********************************************************************************************************************************
													TITRE MOI(HARRAM FATIHA) EN PAGE D'acceuil
************************************************************************************************************************************/	

	$('#h2').mouseover( function(){
		//$(this).css('font-family', 'Sketch Rockwell');
		//$(this).animate({ fontSize: '1.1em'}, slow)
		//$(this).css('font-size', '1.05em');
		$(this).css('color', '#4430C6');
	});
	$('#h2').mouseleave( function(){
		//$(this).css('font-family', '');
		$(this).css('font-size', '');
		$(this).css('color', '');
	});

	$('#a_nom').mouseover( function(){
		//$(this).css('font-family', 'Sketch Rockwell');
		//$(this).animate({ fontSize: '1.1em'}, 200)
		//$(this).css('font-size', '1.1em');
		$(this).css('color', '#4430C6');
	});
	$('#a_nom').mouseleave( function(){
		//$(this).css('font-family', '');
		$(this).css('font-size', '');
		$(this).css('color', '');
	});

	$('#r').mouseover( function(){
		//$(this).css('font-family', 'Sketch Rockwell');
		//$(this).animate({ fontSize: '1.1em'}, 200)
		//$(this).css('font-size', '1.1em');
		$(this).css('color', '#4430C6');
	});
	$('#r').mouseleave( function(){
		//$(this).css('font-family', '');
		$(this).css('font-size', '');
		$(this).css('color', '');
	});

	$('#r2').mouseover( function(){
		//$(this).css('font-family', 'Sketch Rockwell');
		//$(this).animate({ fontSize: '1.1em'}, 200)
		//$(this).css('font-size', '1.1em');
		$(this).css('color', '#4430C6');
	});
	$('#r2').mouseleave( function(){
		//$(this).css('font-family', '');
		$(this).css('font-size', '');
		$(this).css('color', '');
	});
	$('#a_nom2').mouseover( function(){
		//$(this).css('font-family', 'Sketch Rockwell');
		//$(this).animate({ fontSize: '1.1em'}, 200)
		//$(this).css('font-size', '1.1em');
		$(this).css('color', '#4430C6');
	});

	$('#a_nom2').mouseleave( function(){
		//$(this).css('font-family', '');
		//$(this).animate({ fontSize: '1.1em'}, 200)
		//$(this).css('font-size', '');
		$(this).css('color', '');
	});
	$('#m').mouseover( function(){
		//$(this).css('font-family', 'Sketch Rockwell');
		//$(this).animate({ fontSize: '1.1em'}, 200)
		//$(this).css('font-size', '1.1em');
		$(this).css('color', '#4430C6');
	});

	$('#m').mouseleave( function(){
		//$(this).css('font-family', '');
		$(this).css('font-size', '');
		$(this).css('color', '');
	});

	$('#f').mouseover( function(){
		//$(this).css('font-family', 'Sketch Rockwell');
		//$(this).animate({ fontSize: '1.1em'}, 200)
		$(this).css('font-size', '1.1em');
		$(this).css('color', '#4430C6');
	});
	$('#f').mouseleave( function(){
		//$(this).css('font-family', '');
		$(this).css('font-size', '');
		$(this).css('color', '');
	});

	$('#a1').mouseover( function(){
		//$(this).css('font-family', 'Sketch Rockwell');
		//$(this).css('font-size', '1.1em');
		$(this).css('color', '#4430C6');
	});
	$('#a1').mouseleave( function(){
		//$(this).css('font-family', '');
		$(this).css('font-size', '');
		$(this).css('color', '');
	});

	$('#t').mouseover( function(){
		//$(this).css('font-family', 'Sketch Rockwell');
		//$(this).css('font-size', '1.1em');
		$(this).css('color', '#4430C6');
	});
	$('#t').mouseleave( function(){
		//$(this).css('font-family', '');
		$(this).css('font-size', '');
		$(this).css('color', '');
	});

	$('#i').mouseover( function(){
		//$(this).css('font-family', 'Sketch Rockwell');
		//$(this).css('font-size', '1.1em');
		$(this).css('color', '#4430C6');
	});
	$('#i').mouseleave( function(){
		//$(this).css('font-family', '');
		$(this).css('font-size', '');
		$(this).css('color', '');
	});

	$('#h').mouseover( function(){
		//$(this).css('font-family', 'Sketch Rockwell');
		//$(this).css('font-size', '1.1em');
		$(this).css('color', '#4430C6');
	});
	$('#h').mouseleave( function(){
		//$(this).css('font-family', '');
		$(this).css('font-size', '');
		$(this).css('color', '');
	});

	$('#a3').mouseover( function(){
		//$(this).css('font-family', 'Sketch Rockwell');
		//$(this).css('font-size', '1.1em');
		$(this).css('color', '#4430C6');
	});
	$('#a3').mouseleave( function(){
		//$(this).css('font-family', '');
		$(this).css('font-size', '');
		$(this).css('color', '');
	});

/***********************************************************************************************************************************
													COMMENT INSCRIPTION / CONNECTION
************************************************************************************************************************************/		
	//changement de formulaires en cliquant sur les mentions
	$('#inscr').click(function(){
		$(this).fadeOut('slow');
		$('#inscriptionForm').css('display','none');
		$('#connectionForm').css('display','block');
		$('#con').css('display','block'); // mention connection
	});

	$('#con').click(function(){
		$(this).fadeOut('slow');
		$('#connectionForm').css('display','none');
		$('#inscriptionForm').css('display','block');
		$('#inscr').css('display','block'); // mention inscription
	});

	$('.com a').mouseover(function(){
		$(this).css('color', 'blue');
	});
	$('.com acceuil').mouseleave(function(){
		$(this).css('color', '');
	});

/***********************************************************************************************************************************
													ANIMATION DU POPUP SUR L'ICONE ESPACE CLIENT / ADMIN
************************************************************************************************************************************/	
	
	$(document).ready(function(){
			popup();
	});

	function popup(){
		$("*[data-popup]").hover(function(){	//quand on survol les data du popup (càd l'icone)
				var data = $(this).attr("data-popup"), //on initialise une variable "data" avec l'attribut des data ainsi que son positionnement top et left
							offsetDataTop = $(this).offset().top,
							offsetDataLeft = $(this).offset().left;

			if(data != ""){ //si la variable data est vide ou n'existe pas
				// .popup creation
				$("body").prepend("<div class='popup'>"+data+"</div>");
				// .popup properties
				var popupWidth = $(".popup").innerWidth(),
					thisWith = $(this).innerWidth(),
					marginLeft = (thisWith - popupWidth)/2;
				// .popup init
				$(".popup").css({
					opacity : 0,
					top : offsetDataTop - 40,
					left : offsetDataLeft + marginLeft+50
				});
				// .popup animation
				$(".popup").animate({
					opacity : 1,
					marginTop : 20,
					marginLeft: -50
				}, "fast");
			}
		}, function(){ $(".popup").remove(); }); // .popup removed
	}
/***********************************************************************************************************************************
													VALIDATION DU FORMULAIRE
************************************************************************************************************************************/	
	$(function(){
		/*********Inscription*********/
		//fonction de validation du pseudo de l'inscription "user"
		$(".pseudo_Inscr").blur(function(){
			if(!$(".pseudo_Inscr").val().match(/^[^ -][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð\s'-]+([a-zA-Z0-9])+$/i))
				{
					$(".pseudo_Inscr").next(".erreur_message").show().text("Pseudo non valide : 3 lettres minimum");
				}
			else
				{
					$(".pseudo_Inscr").next(".erreur_message").hide().text("");
				}

				valid = true;

				   $.ajax({ // fonction permettant de faire de l'ajax
				   type: "POST", // methode de transmission des données au fichier php
				   url: "verif.php", // url du fichier php
				   data: "pseudo="+$(".pseudo_Inscr").val(), // données à transmettre 
				   success: function(msg){ // si l'appel a bien fonctionné
						if(msg == '1') { // si le login a ete trouve

							$("#msgbox").fadeTo(200,0.1,function()
									{	// on affiche un message d'erreur dans le span prévu à cet effet
										$(this).html('<red>pseudo déjà existant! Veuillez en choisir un autre! </red>').addClass('busy').fadeTo(900,1);
									});

							valid == false;
						}
						else { // si le login n'a ete trouve

							$("#msgbox").fadeTo(200,0.1,function()
								{	// on affiche un message d'erreur dans le span prévu à cet effet
									$(this).html('<green>Ce pseudo est disponible!</green>').addClass('dispo').fadeTo(900,1);
								});
						}
				   }
				});
				return false; // permet de rester sur la même page à la soumission du formulaire
		})

		//fonction de validation du mail "user"
		$("#email").blur(function(){
			if(!$("#email").val().match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9])+([a-zA-Z0-9\._-])*\.([a-zA-Z])+$/))
			{
				$("#email").next(".erreur_message").show().text('Email non valide. ex :"tiha@mail.com"');
			}
			else
			{
				$("#email").next(".erreur_message").hide().text("");
			}


			valid = true;

				   $.ajax({ // fonction permettant de faire de l'ajax
				   type: "POST", // methode de transmission des données au fichier php
				   url: "verif.php", // url du fichier php
				   data: "email="+$("#email").val(), // données à transmettre
				   success: function(msg){ // si l'appel a bien fonctionné
						if(msg == '1') { // si le login a ete trouve

							$(".msgbox").fadeTo(200,0.1,function()
									{	// on affiche un message d'erreur dans le span prévu à cet effet
										$(this).html('<red>Email déjà existant! Veuillez en choisir un autre! </red>').addClass('busy').fadeTo(900,1);
									});
							$(".msg").fadeTo(200,0.1,function()
									{	// on affiche un message d'erreur dans le span prévu à cet effet
										$(this).html('<green>Email existant!</green>').addClass('busy').fadeTo(900,1);
									});

							valid == false;
						}
						else { // si le login n'a ete trouve

							$(".msgbox").fadeTo(200,0.1,function()
								{	// on affiche un message d'erreur dans le span prévu à cet effet
									$(this).html('<green>Cet email est disponible!</green>').addClass('dispo').fadeTo(900,1);
								});
							$(".msg").fadeTo(200,0.1,function()
								{	// on affiche un message d'erreur dans le span prévu à cet effet
									$(this).html('<red>Cet email n\'existe pas. Veuillez réesayer. </red>').addClass('dispo').fadeTo(900,1);
								});
						}
				   }
				});
				return false; // permet de rester sur la même page à la soumission du formulaire


		})
		//fonction de validation du mot de passe de l'inscription "User"

			$(".mdp_inscr").blur(function(){
			if(!$(".mdp_inscr").val().match(/^[^ -][a-zA-Z]{3,10}$/))
				{
					$(".mdp_inscr").next(".erreur_message").show().text("Mot de passe non valide : minimum 3 lettres");
				}
			else
				{
					$(".mdp_inscr").next(".erreur_message").hide().text("");
				}
		})
/***********************************************************************************************************************************
													CONNECTION
************************************************************************************************************************************/	
		//fonction de validation du pseudo de la connection "user"
		$(".pseudo_con").blur(function(){

			if(!$(".pseudo_con").val().match(/^[^ -][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð'-]+([a-zA-Z0-9])+$/i))
				{
					$(".pseudo_con").next(".erreur_message").show().text("Pseudo non valide : 3 lettres minimum");
				}
			else
				{
					$(".pseudo_con").next(".erreur_message").hide().text("");

				}
					valid = true;

				   $.ajax({ // fonction permettant de faire de l'ajax
				   type: "POST", // methode de transmission des données au fichier php
				   url: "verif.php", // url du fichier php
				   data: "pseudo="+$(".pseudo_con").val(), // données à transmettre
				   success: function(msg){ // si l'appel a bien fonctionné
						if(msg == '1') { // si le login a ete trouve

							$("#msg").fadeTo(200,0.1,function()
									{	// on affiche un message d'erreur dans le span prévu à cet effet
										$(this).html('<green>pseudo existant!</green>').addClass('busy').fadeTo(900,1);
									});

							valid == false;
						}
						else { // si le login n'a ete trouve

							$("#msg").fadeTo(200,0.1,function()
								{	// on affiche un message d'erreur dans le span prévu à cet effet
									$(this).html('<red>Ce pseudo n\'existe pas! Veuillez réessayer.</red>').addClass('dispo').fadeTo(900,1);
								});
						}
				   }
				});
				return false; // permet de rester sur la même page à la soumission du formulaire




		})//FIN function blur


			
		//fonction de validation du mot de passe de la connection "User"
		$(".mdp_con").blur(function(){
			if(!$(".mdp_con").val().match(/^[^ -][a-zA-Z]{2,20}$/))
				{
					$(".mdp_con").next(".erreur_message").show().text("Mot de passe non valide : minimum  de 3 lettres");
				}
			else
				{
					$(".mdp_con").next(".erreur_message").hide().text("");
				}
		})

		//fonction de validation du nom de la connection "client"
		$(".name").blur(function(){
			if(!$(".name").val().match(/^[^ -][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð'i-\s]{2,20}$/))
				{
					$(".name").next(".erreur_message").show().text("Nom non valide : minimum 3 lettres");
				}
			else
				{
					$(".name").next(".erreur_message").hide().text("");
				}
		})
			//fonction de validation du nom de la connection "client"
		$(".firstname").blur(function(){
			if(!$(".firstname").val().match(/^[^ -][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð\s '-]{2,20}$/))
				{
					$(".firstname").next(".erreur_message").show().text("Prénom non valide : minimum 3 lettres");
				}
			else
				{
					$(".firstname").next(".erreur_message").hide().text("");
				}
		})
		$("#comment").blur(function(){
			if(!$("#comment").val().match(/^[^ -][a-zA-Z]{2,20}$/))
				{
					$("#comment").next(".erreur_message").show().text("Vous êtes libre d'écrire un commentaire, rien n'a été remplis!");
				}
			else
				{
					$("#comment").next(".erreur_message").hide().text("");
				}
		})

	})
/***********************************************************************************************************************************
				FONCTIONS POUR QUE L'ENVOIE DU FORMULAIRE NE SE FASSE PAS SI LES CHAMPS SONT VIDES
************************************************************************************************************************************/	
							
/***********************************************************************************************************************************
													CONNECTION
************************************************************************************************************************************/	
	/*****************Connection*******************/
	function Conect(){
			var result = true; //variable du résultat est initialisé à vrai
			$('#connection').submit(function(){
				if($('.pseudo_con').val() == "" ){ //si la valeur de l'input est vide
					$('.pseudo_con').css('border-color','#990066'); //créer un cadre rouge
					$('.envoi').fadeIn('fast').text('Veuillez remplir tout les champs du formulaire!');
					//si la div login_con est vide (donc si le champ est vide), la couleur du cadre devient rouge et la classe "envoi" apparait en fadeIn

					//La fonction ne retourne rien, donc le formulaire n'est pas envoyé 	
					result=false;
				}

				if($('.mdp_con').val() == ""){ 
					$('.mdp_con').css('border-color','#990066');
					$('.envoi').fadeIn('fast').text('Veuillez remplir tout les champs du formulaire!');
					//si la div mdp_con est vide (donc si le champ est vide), la couleur du cadre devient rouge et la classe "envoi" apparait en fadeIn

					//La fonction ne retourne rien, dobnc le formulaire n'est pas envoyé 	
					result=false;
				}
				return result;
			});	
	}
/***********************************************************************************************************************************
													INSCRIPTION
************************************************************************************************************************************/		

  	function Registr(){
		var result = true; //variable du résultat est initialisé à vrai
		$('#inscription').submit(function(){
			if($('.pseudo_Inscr').val() == "" ){ //si la valeur de l'input est vide
				$('.pseudo_Inscr').css('border-color','#990066'); //créer un cadre rouge
				$('.envoi_inscr').fadeIn('fast').text('Veuillez remplir tout les champs du formulaire!');
				//si la div login_con est vide (donc si le champ est vide), la couleur du cadre devient rouge et la classe "envoi" apparait en fadeIn

				//La fonction ne retourne rien, donc le formulaire n'est pas envoyé 	
				result=false;
			}
			if($('.email_inscr').val() == "" ){ //si la valeur de l'input est vide
				$('.email_inscr').css('border-color','#990066'); //créer un cadre rouge
				$('.envoi_inscr').fadeIn('fast').text('Veuillez remplir tout les champs du formulaire!');
				//si la div login_con est vide (donc si le champ est vide), la couleur du cadre devient rouge et la classe "envoi" apparait en fadeIn

				//La fonction ne retourne rien, donc le formulaire n'est pas envoyé 	
				result=false;
			}
			if($('.mdp_inscr').val() == ""){ 
					$('.mdp_inscr').css('border-color','#990066');
					$('.envoi_inscr').fadeIn('fast').text('Veuillez remplir tout les champs du formulaire!');
					//si la div mdp_con est vide (donc si le champ est vide), la couleur du cadre devient rouge et la classe "envoi" apparait en fadeIn

					//La fonction ne retourne rien, dobnc le formulaire n'est pas envoyé 	
					result=false;
			}
			return result;
		});	
	}

/***********************************************************************************************************************************
													CONNECTION CLIENTS
************************************************************************************************************************************/		

	function ClientConnect(){
			var result = true; //variable du résultat est initialisé à vrai
			$('.connectionEC').submit(function(){
				if($('#name').val() == ""){ 
					$('#name').css('border-color','#990066');
					$('.envoi_client').fadeIn('fast').text('Veuillez remplir tout les champs du formulaire!');
					//si la div mdp_con est vide (donc si le champ est vide), la couleur du cadre devient rouge et la classe "envoi" apparait en fadeIn

					//La fonction ne retourne rien, dobnc le formulaire n'est pas envoyé 	
					result=false;
				}
				if($('#firstname').val() == ""){
					$('#firstname').css('border-color','#990066');
					$('.envoi_client').fadeIn('fast').text('Veuillez remplir tout les champs du formulaire!');
					//si la div mdp_con est vide (donc si le champ est vide), la couleur du cadre devient rouge et la classe "envoi" apparait en fadeIn

					//La fonction ne retourne rien, dobnc le formulaire n'est pas envoyé 	
					result=false;

				}
				if($('#email').val() == ""){
					$('#email').css('border-color','#990066');
					$('.envoi_client').fadeIn('fast').text('Veuillez remplir tout les champs du formulaire!');
					//si la div mdp_con est vide (donc si le champ est vide), la couleur du cadre devient rouge et la classe "envoi" apparait en fadeIn

					//La fonction ne retourne rien, dobnc le formulaire n'est pas envoyé 	
					result=false;

				}
				if($('#mdp').val() == ""){
					$('#mdp').css('border-color','#990066');
					$('.envoi_client').fadeIn('fast').text('Veuillez remplir tout les champs du formulaire!');
					//si la div mdp_con est vide (donc si le champ est vide), la couleur du cadre devient rouge et la classe "envoi" apparait en fadeIn

					//La fonction ne retourne rien, dobnc le formulaire n'est pas envoyé 	
					result=false;

				}

				if($('.pseudo_con').val() == "" ){ //si la valeur de l'input est vide
					$('.pseudo_con').css('border-color','#990066'); //créer un cadre rouge
					$('.envoi').fadeIn('fast').text('Veuillez remplir tout les champs du formulaire!');
					//si la div login_con est vide (donc si le champ est vide), la couleur du cadre devient rouge et la classe "envoi" apparait en fadeIn

					//La fonction ne retourne rien, donc le formulaire n'est pas envoyé 	
					result=false;
				}

				if($('.mdp_con').val() == ""){ 
					$('.mdp_con').css('border-color','#990066');
					$('.envoi').fadeIn('fast').text('Veuillez remplir tout les champs du formulaire!');
					//si la div mdp_con est vide (donc si le champ est vide), la couleur du cadre devient rouge et la classe "envoi" apparait en fadeIn

					//La fonction ne retourne rien, dobnc le formulaire n'est pas envoyé 	
					result=false;
				}

				return result;

			});	
	}
/***********************************************************************************************************************************
													COMMANTAIRES
************************************************************************************************************************************/	

	function comments(){
		var result = true; //variable du résultat est initialisé à vrai
		$('#formCom').submit(function(){
			if($('#comment').val() == "" ){ //si la valeur de l'input est vide
				$('#comment').css('border-color','#990066'); //créer un cadre rouge
				$('#comment').fadeIn('fast').text('Nous n\'avons repéré aucun commentaire à enregistrer');
				$('.erreur_message').fadeIn('fast').text('Nous n\'avons repéré aucun commentaire à enregistrer');
				//si la div login_con est vide (donc si le champ est vide), la couleur du cadre devient rouge et la classe "envoi" apparait en fadeIn

				//La fonction ne retourne rien, donc le formulaire n'est pas envoyé 	
				result=false;
			}

			return result;
		});	
	}

/***********************************************************************************************************************************
													INITIALISER  PSEUDO
************************************************************************************************************************************/	
	function iniPseudo(){
		var result = true; //variable du résultat est initialisé à vrai
		$('#ini_pseudo').submit(function(){
			if($('#email').val() == "" ){ //si la valeur de l'input est vide
				$('#email').css('border-color','#990066'); //créer un cadre rouge
				$('.erreur_message').fadeIn('fast').text('Veuillez remplir tout les champs du formulaire!');
				//si la div login_con est vide (donc si le champ est vide), la couleur du cadre devient rouge et la classe "envoi" apparait en fadeIn

				//La fonction ne retourne rien, donc le formulaire n'est pas envoyé 	
				result=false;
			}

			return result;
		});	
	}
/***********************************************************************************************************************************
									APPEL DES FONCTIONS POUR NON ENVOI DU FORMULAIRE
************************************************************************************************************************************/	

	//Connection (users)
  	Conect();
	//Inscription (users + client)
	Registr();
	//Connection Client
	ClientConnect();
	//Commentaires
	comments();
	//initiation pseudo
	iniPseudo();

	/*effet sur le bouton du formulaire orderForm*/
	$('#saveForm').mouseenter(function() {
        $('#saveForm').fadeTo('fast', 0.8);
    });
	    $('#saveForm').mouseleave(function() {
        $('#saveForm').fadeTo('fast', 1);
    });

/***********************************************************************************************************************************
													SHOW / HIDDEN THE ADD CLIENT FORM IN admin.php
************************************************************************************************************************************/	
/*formulaire ajouter client*/
	$('#show_clientForm').on('click', function(){ /*nouveau client*/
		//Show form next to the button clicked
  		$( this ).prev().fadeIn(2000);
  		//Hide button
  		$( this ).hide('slow');
  		$('.clients').hide('slow'); /*page client*/
  		$('.show_clientOrder').hide('slow'); /*nouvelle commande*/
  		$('.show_changeOrder').hide('slow'); /*modifier commande*/
  		$('.commandes').hide('slow'); /*page commandes*/
  		$('#deleteCom').hide('slow');/*page des commentaires*/
	});
	// the cross have 0 for the opacity (ajouter client)
	$('.close').css('opacity', '0');

	//When the cross is pressed
	$( ".close" ).click(function(){
  		//Hide form.
   		$('#add_client').hide().fadeOut();
  		//Show the button
   		$( '#add_client' ).next().fadeIn();/*nouveau client*/
   		$('.clients').show('slow'); /*page client*/
   		$('.show_clientOrder').show('slow');/*nouvelle commande*/
  		$('.show_changeOrder').show('slow');/*modifier commande*/
  		$('.commandes').show('slow'); /*page commande*/
  		$('#deleteCom').show('slow');/*page des commentaires*/
	});

	//show the cross when mouseover (opacity 1)
	$('.close').mouseover(function(){
		$(this).css('opacity','1');
	});
	//hide the cross when mouseleave (opacity 0)
	$('.close').mouseleave(function(){
		$(this).css('opacity','0');
	});

/***********************************************************************************************************************************
													SHOW / HIDDEN THE ADD ORDER FORM IN admin.php
************************************************************************************************************************************/	
/*formulaire ajouter nouvelle commande*/
	$('#show_clientOrder').on('click', function(){
		//Show form next to the button clicked
  		$(this).prev().fadeIn(2000);
  		//Hide button
  		$(this).hide('slow');
  		$('#modifCommande').hide('slow');/*modifier commande*/
  		$('.commandes').hide('slow'); /*page commande*/
  		$('.clients').hide('slow'); /*page client*/
  		$('#show_clientForm').hide('slow');/*ajouter client*/
  		$('#deleteCom').hide('slow');/*page des commentaires*/

	});
	// the cross have 0 for the opacity (nouvelle commande)
	$('.close1').css('opacity', '0');

	//When the cross is pressed
	$( ".close1" ).click(function(){
  		//Hide form.
   		$('#add_order').hide().fadeOut();
  		//Show the button
   		$( '#add_order' ).next().fadeIn();/*nouvelle commande*/
   		$('#modifCommande').show('slow');/*modifier commande*/
   		$('.commandes').show('slow');/*page commande*/
   		$('.clients').show('slow'); /*page client*/
  		$('#show_clientForm').show('slow');/*ajouter client*/
  		$('#deleteCom').show('slow');/*page des commentaires*/
	});
	//show the cross when mouseover (opacity 1)
	$('.close1').mouseover(function(){
		$(this).css('opacity','1');
	});
	//hide the cross when mouseleave (opacity 0)
	$('.close1').mouseleave(function(){
		$(this).css('opacity','0');
	});

/***********************************************************************************************************************************
													SHOW / HIDDEN THE CHANGE ORDER FORM IN admin.php
************************************************************************************************************************************/	
/*formulaire modification de commande*/

		/*hide the order section (where content order)*/
	$('#changeOrderForm').hide();
	$('#changeOrder').on('click', function(){ /*modifier commande*/
		//Show div next to the button clicked
  		$( '#changeOrderForm' ).fadeIn();
  		//Hide button
  		$( this).hide('slow');
  		$( '#commande_client').hide('slow'); /*nouvelle commande*/
  		$('.commandes').hide('slow');/*page commande*/
  		$('.clients').hide('slow'); /*page client*/
  		$('#show_clientForm').hide('slow');/*ajouter client*/
  		$('#deleteCom').hide('slow');/*page des commentaires*/
  		
	});
	
	// the cross have 0 for the opacity
	$('.close2').css('opacity', '0');

	//When the cross is pressed
	$( ".close2" ).click(function(){
  		//Hide form.
   		$('#changeOrderForm').hide().fadeOut();/*modifier commande*/
  		//Show the button
   		$( '#add_order' ).next().fadeIn();/**/
   		$('#commande_client').show('slow');/*nouvelle commande*/
   		$('#changeOrder').show('slow');/*changer commande*/
   		$('.commandes').show('slow');/*pagecommande*/
   		$('.clients').show('slow'); /*page client*/
  		$('#show_clientForm').show('slow');/*ajouter client*/
  		$('#deleteCom').show('slow');/*page des commentaires*/

	});
	//show the cross when mouseover (opacity 1)
	$('.close2').mouseover(function(){
		$(this).css('opacity','1');
	});
	//hide the cross when mouseleave (opacity 0)
	$('.close2').mouseleave(function(){
		$(this).css('opacity','0');
	});

/***********************************************************************************************************************************
												SHOW / HIDDEN THE PERSONNAL DATA TABLE IN vip.php
************************************************************************************************************************************/	

	/*THE PERSONNAL DATA table is hide*/
	$('#personanDataTB').hide();
	/*Show/hidden the personnal data of client in vip.php*/
	$('#show_pd').on('click', function(){
		//Show form next to the button clicked
  		$( this ).prev().fadeIn(2000);
  		//Hide button
  		$( this ).hide('slow');
  		$('#myOrder').hide();
	});
	// the cross have 0 for the opacity
	$('.close2').css('opacity', '0');
	//When the cross is pressed
	$( ".close2" ).click(function(){
  		//Hide form.
   		$('#personanDataTB').hide().fadeOut();
  		//Show the button
   		$( '#personanDataTB').next().fadeIn();
   		$('#myOrder').show();
	});
	$('.close2').mouseover(function(){
		$(this).css('opacity','1');
	});
	//hide the cross when mouseleave (opacity 0)
	$('.close2').mouseleave(function(){
		$(this).css('opacity','0');
	});
	

/***********************************************************************************************************************************
													SHOW / HIDDEN THE "MY ORDER" SECTION IN vip.php
************************************************************************************************************************************/	
	/*hide the order section (where content order)*/
	$('#myOrderTB').hide();
	$('#show_myOrder').on('click', function(){
		//Show div next to the button clicked
  		$( '#myOrderTB' ).fadeIn();
  		//Hide button
  		$( this ).hide('slow');
  		$('#personanData').hide('slow');
  		
	});
	// the cross have 0 for the opacity
	$('.close3').css('opacity', '0');
	//When the cross is pressed
	$( ".close3" ).click(function(){
  		//Hide form.
   		$('#myOrderTB').hide().fadeOut();
  		//Show the button
   		$( '#show_myOrder').fadeIn();
   		$('#personanData').show();
	});
	$('.close3').mouseover(function(){
		$(this).css('opacity','1');
	});
	//hide the cross when mouseleave (opacity 0)
	$('.close3').mouseleave(function(){
		$(this).css('opacity','0');
	});


/***********************************************************************************************************************************
													PROGRESS BAR (vip.php)
************************************************************************************************************************************/	

	$('#show_myOrder').on('click', function(){
	  var val = document.getElementById("percent").value;

	  var $circle = $('#svg #bar');
	  
	  if (isNaN(val)) {
	   val = 100; 
	  }
	  else{
	    var r = $circle.attr('r');
	    var c = Math.PI*(r*2);
	   
	    if (val < 0) { val = 0;}
	    if (val =="") {val = 0;}
	    if (val > 100) { val = 100;}
	    
	    var pct = ((100-val)/100)*c;
	    
	    $circle.css({ strokeDashoffset: pct});
	    
	    $('#cont').attr('data-pct',val);
	  }
	});
	$('#show_myOrder').on('click', function(){
	  var val = document.getElementById("percent1").value;
	  var $circle = $('#svg1 #bar1');
	  
	  if (isNaN(val)) {
	   val = 100; 
	  }
	  else{
	    var r = $circle.attr('r');
	    var c = Math.PI*(r*2);
	   
	    if (val < 0) { val = 0;}
	    if (val =="") {val = 0;}
	    if (val > 100) { val = 100;}
	    
	    var pct = ((100-val)/100)*c;
	    
	    $circle.css({ strokeDashoffset: pct});
	    
	    $('#cont1').attr('data-pct',val);
	  }
	});
	$('#show_myOrder').on('click', function(){
	  var val = document.getElementById("percent2").value;
	  var $circle = $('#svg2 #bar2');
	  
	  if (isNaN(val)) {
	   val = 100; 
	  }
	  else{
	    var r = $circle.attr('r');
	    var c = Math.PI*(r*2);
	   
	    if (val < 0) { val = 0;}
	    if (val =="") {val = 0;}
	    if (val > 100) { val = 100;}
	    
	    var pct = ((100-val)/100)*c;
	    
	    $circle.css({ strokeDashoffset: pct});
	    
	    $('#cont2').attr('data-pct',val);
	  }
	});
	$('#show_myOrder').on('click', function(){
	  var val3 = document.getElementById("percent3").value;
	  var $circle = $('#svg3 #bar3');
	  
	  if (isNaN(val3)) {
	   val3 = 100; 
	  }
	  else{
	    var r = $circle.attr('r');
	    var c = Math.PI*(r*2);
	   
	    if (val3 < 0) { val3 = 0;}
	    if (val3 =="") {val = 0;}
	    if (val3 > 100) { val3 = 100;}
	    
	    var pct3 = ((100-val3)/100)*c;
	    
	    $circle.css({ strokeDashoffset: pct3});
	    
	    $('#cont3').attr('data-pct',val3);
	  }
	});
	$('#show_myOrder').on('click', function(){
	  var val = document.getElementById("percent4").value;
	  var $circle = $('#svg4 #bar4');
	  
	  if (isNaN(val)) {
	   val3 = 100; 
	  }
	  else{
	    var r = $circle.attr('r');
	    var c = Math.PI*(r*2);
	   
	    if (val < 0) { val = 0;}
	    if (val =="") {val = 0;}
	    if (val > 100) { val = 100;}
	    
	    var pct4 = ((100-val)/100)*c;
	    
	    $circle.css({ strokeDashoffset: pct4});
	    
	    $('#cont4').attr('data-pct',val);
	  }
	});
	$('#show_myOrder').on('click', function(){
	  var val = document.getElementById("percent5").value;
	  var $circle = $('#svg5 #bar5');
	  
	  if (isNaN(val)) {
	   val3 = 100; 
	  }
	  else{
	    var r = $circle.attr('r');
	    var c = Math.PI*(r*2);
	   
	    if (val < 0) { val = 0;}
	    if (val =="") {val = 0;}
	    if (val > 100) { val = 100;}
	    
	    var pct5 = ((100-val)/100)*c;
	    
	    $circle.css({ strokeDashoffset: pct5});
	    
	    $('#cont5').attr('data-pct',val);
	  }
	});
	$('#show_myOrder').on('click', function(){
	  var val = document.getElementById("percent6").value;
	  var $circle = $('#svg6 #bar6');
	  
	  if (isNaN(val)) {
	   val3 = 100; 
	  }
	  else{
	    var r = $circle.attr('r');
	    var c = Math.PI*(r*2);
	   
	    if (val < 0) { val = 0;}
	    if (val =="") {val = 0;}
	    if (val > 100) { val = 100;}
	    
	    var pct6 = ((100-val)/100)*c;
	    
	    $circle.css({ strokeDashoffset: pct6});
	    
	    $('#cont6').attr('data-pct',val);
	  }
	});
	/***********************************************************************************************************************************
												VERIFICATION SI LE CLIENT EXISTE (AJAX)
	************************************************************************************************************************************/

	$("#id_client").blur(function() {
	       valid = true;
	 
		   $.ajax({ // fonction permettant de faire de l'ajax
		   type: "POST", // methode de transmission des données au fichier php
		   url: "verif_clientID.php", // url du fichier php
		   data: "id_client="+$("#id_client").val(), // données à transmettre
		   success: function(msg){ // si l'appel a bien fonctionné
				if(msg == '1') { // si le login a ete trouve

					$("#msgbox").fadeTo(200,0.1,function()
							{	// on affiche un message d'erreur dans le span prévu à cet effet
								$(this).html('<green>ID existant!</green>').addClass('busy').fadeTo(900,1);
							});

					valid == false;
				}
				else { // si le login n'a ete trouve

					$("#msgbox").fadeTo(200,0.1,function()
						{	// on affiche un message d'erreur dans le span prévu à cet effet
							$(this).html('<red>Ce ID n\'existe pas! Veuillez réessayer.</red>').addClass('dispo').fadeTo(900,1);
						});
				}
		   }
		});
		return false; // permet de rester sur la même page à la soumission du formulaire
	});

	//Autocomplete
	$('.name_client').autocomplete({
		source:'autocomplete.php'//, 
		//minLength:2,
		
	});

	//pré-remplir l'ID client 
	$('#name_clientU').blur(function(){
		//var nom = $(this).val();
		 //$( 'p' ).text( nom );
		var name_client = $('#name_clientU').val();
		// var id_client = $('#id_client').val();
		var id_client = "";
		// alert($(this).val());
			valid = true;
	 
		   $.ajax({ // fonction permettant de faire de l'ajax
			   type: "POST", // methode de transmission des données au fichier php
			   url: "autoId.php", // url du fichier php
			   data: {name_client: name_client, id_client: id_client} , // données à transmettre
			   success: function(results){ // si l'appel a bien fonctionné
				   if (results){
				   	// $('p').text(results);
				   	$('#id_client').val(results);
				   		valid == false;

				   	}
		
				 				
			   }
		});
		return false; // permet de rester sur la même page à la soumission du formulaire

	});

	//pré-remplir l'ID client 
	$('#name_clientL').blur(function(){
		//var nom = $(this).val();
		 //$( 'p' ).text( nom );
		var name_client = $('#name_clientL').val();
		// var id_client = $('#id_client').val();
		var id_client = "";
		// alert($(this).val());
			valid = true;
	 
		   $.ajax({ // fonction permettant de faire de l'ajax
			   type: "POST", // methode de transmission des données au fichier php
			   url: "autoId.php", // url du fichier php
			   data: {name_client: name_client, id_client: id_client} , // données à transmettre
			   success: function(results){ // si l'appel a bien fonctionné
				   if (results){
				   	// $('p').text(results);
				   	$('#id_clientL').val(results);
				   		valid == false;

				   	}
		
				 				
			   }
		});
		return false; // permet de rester sur la même page à la soumission du formulaire

	});





/*
			
		$('#search').keyup(function(){//Démarre le script lorqu'on appuie sur n'importe quel touche
        var search = $(this).val();
        search = $.trim(search);
        if(search !== ""){ //si la recherche est différent de rien
            $.ajax({
                type: "POST",
                url: "produit/script/post.php",
                data: {
                        search : search
                },
                success: function (data){
                    $('#resultat ul').html(data).show(); //affiche le choix dans la barre de recherche
                    $('#loader').hide(); //cache l'icone à la fin du traîtement
                    $('a').click(function(){ //lorsqu'on clique sur un des choix
                        var lien = $(this).text();
                        $('#loader').show(); //affiche l'icone load le temps du chargement
                        $('#search').attr('value',lien);
                        $.ajax({
                            type: "POST",
                            url: "produit/script/show.php",
                            data: {
                                    search : search
                            },
                            success: function (data){
                                $('#feedback').html(data); //affiche le contenu de la donné
                                $('#loader').hide(); //cache le load
                                $('#resultat ul').hide(); //cache la vignette des résultats
                            }
                        });
                    });
                }
            });
        }
    });
 
});*/

	

		
	
		



/***********************************************************************************************************************************
													PORTFOLIO
************************************************************************************************************************************/	
/* Jquery Portfolio wall by Mohamed Abo El-Ghranek - fb.com/midoghranek no need to plugins */
  $('.hidden').css('display','none');

  $( "#filter button" ).each(function() {

    $(this).on("click", function(){

         var filter = $(this).attr('class');         

      if ( $(this).attr('class') == 'all' ) {
         $('.hidden').contents().appendTo('#posts').hide().show('slow');
         $( "#filter button" ).removeClass('active');
         $(this).addClass('active');
         $("#filter button").attr("disabled", false);
         $(this).attr("disabled", true);
      }
      else {
         $('.post').appendTo('.hidden');
         $('.hidden').contents().appendTo('#posts').hide().show('slow');
         $('.post:not(.' + filter + ')').appendTo('.hidden').hide('slow');
         $( "#filter button" ).removeClass('active');
         $(this).addClass('active');
         $("#filter button").attr("disabled", false);
         $(this).attr("disabled", true);
      };
      
      });

  });

/********************************************************************************************************************
										RESPONSIVE
*********************************************************************************************************************/	
$('.header__icon').on('click',function(){
	$('.nav').toggle();
		$('.container').click(function(){
			$('.nav').css('display', 'none');
		})

});



	


	/*Show/Hidden password****** a faire plus tard!!!/
	/*$('.password-hidden').on('keyup', function(){
	  var val = $(this).val();
	  setTimeout(function(){
	    $('.password-shown').val(val);
	  }, 300);
	});
	$('.password-shown').on('keyup', function(){
	  var val = $(this).val();
	  setTimeout(function(){
	    $('.password-hidden').val(val);
	  }, 300);
	});

	$('.togglepass').on('click', function(e){
	  e.preventDefault();
		$('.password-shown, .password-hidden').toggle();
		$(this).text(function(i, text){
			return text === "Hide" ? "Show" : "Hide";
		})
	});*/


	

});
/***********************************************************************************************************************************
													FIN
************************************************************************************************************************************/	
	



  

