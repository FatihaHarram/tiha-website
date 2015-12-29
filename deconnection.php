<?php 
//on demarre la session
    session_start();
   
	 require_once('lib/php/fonction.php');	
	 	

	if( isset($_SESSION['id']) )
	{

		//if ($_SESSION['client'] == 1) 
		//{

			// l'utilisateur est renvoyé vers la page index
			//header('refresh:3;url=index.php');



			//$contenu = '<red>Au revoir <b>'.$_SESSION['name'].' '.$_SESSION['firstname'] .'</b>, vous êtes déconnecté.</red></br></br>';
			
			//effacement des cookies 'login' et 'mdp'		
			//setcookie('mdp',$_SESSION['mdp'],time()-3600,$GLOBALS['chemin'],$GLOBALS['domaine'],$GLOBALS['https'],$GLOBALS['httponly']); 
			//setcookie('name',$_SESSION['name'],$GLOBALS['duree'],$GLOBALS['chemin'],$GLOBALS['domaine'],$GLOBALS['https'],$GLOBALS['httponly']); 
			//setcookie('email',$_SESSION['email'],$GLOBALS['duree'],$GLOBALS['chemin'],$GLOBALS['domaine'],$GLOBALS['https'],$GLOBALS['httponly']);
		
		//}else{
			// l'utilisateur est renvoyé vers la page index
			header('refresh:3;url=index.php');

			$contenu = '<red>Au revoir <b>'.$_SESSION['pseudo'].'</b>, vous êtes déconnecté.</red></br></br>';

			//effacement des cookies 'login' et 'mdp'		
			setcookie('pseudo',$_SESSION['pseudo'],time()-3600,$GLOBALS['chemin'],$GLOBALS['domaine'],$GLOBALS['https'],$GLOBALS['httponly']); 
			setcookie('mdp',$_SESSION['mdp'],time()-3600,$GLOBALS['chemin'],$GLOBALS['domaine'],$GLOBALS['https'],$GLOBALS['httponly']); 
		//}
			//fermeture de la session utilisateur
			session_destroy();    
	}
	else
	{
			// l'utilisateur est renvoyé vers la page index
			header('refresh:3;url=index.php');
			$contenu = '<red>Vous n\'êtes pas connecté!</red></br></br>';
	}
	//header('refresh:3;url=index.php');	

	//ajout des fonctions
  	
  
?>

	<title>Déconnection</title>

</head>
<body>
    <header>
    </header>
   	
	<?php 
	 
	/*include_once('nav.php');*/
	
	 ?>
     <div id="content">
     	<div id="container">
            <h1>déconnection</h1>

			<?php 

			include_once('meta_header.php'); 

			echo $contenu;?>
			
		</div><!--container-->
	</div><!--content-->
</body>
</html>



