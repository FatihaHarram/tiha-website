<?php
session_start();
//on vérifie si l'utilisateur est un admin et s'il est connecté
if (!isset($_SESSION['id']))
{
    // l'utilisateur est renvoyé vers la page index
    header('refresh:0;url=index.php');
}

elseif ($_SESSION['admin'] == 1)
{
    //echo "<red>Vous pouvez dès à présent laisser un message</red>";
    // l'utilisateur est renvoyé vers la page index
    header('refresh:0;url=index.php');
}
else{

include_once('lib/php/fonction.php');
include_once('meta_header.php');
include_once('nav.php');
?>
<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css'>

<link rel="stylesheet" href="timeline/css/style.css">
<title>espace client vip</title>
</head>

<body>
<div id="content">
    <div id="container">


        <!--***************************************************************************************************************************************-->




        <!--***************************************************************************************************************************************-->
        <?php
        if ($_SESSION['client'] == 1) {
            ?>
            <div id="maOrder">
         <?php

                    $id_client = $_SESSION['id'];

                    //création de la variable contenu, initialement vide
                    $contenu='';

                    //on se connecte
                    $connection = connectBD();

                    if ($connection) {

                        //on prépare la requête de selection, on l'organise par ordre de date
                        $req='SELECT * FROM orders WHERE id_client='.$id_client.'';

                        //on insere dans la variable results la requête
                        $results = $connection->query($req);

                        //si on trouve un résultat. Si la recherche est plus grande que 0
                        if ($results->rowCount() > 0) {

                            //boucle pour récupérer les données
                            foreach ($results as $key) {

                                //on affiche les COMMENTAIRES
                                echo '	<div id="order">
										<fieldset>
										<legend>Fiche commande</legend>
										client <white><b>n°0000'.$key['id_client'].'</b></white></br>
										Commande <white><b>n°0000'.$key['id'].'</b></white></br><br>
										Mme/Mr :<white> <b>'.$key['name_client'].'</b></white><br>
										Votre commande est de type : <white><b>'.$key['orderType'].'</b></white><br>
										Voici une petite desciption de votre projet : <white><br><b>'.$key['orderDescr'].'</b></white><br>
										<h2>L\'évolution de votre projet</h2>
										Votre commande en est au stade de:<white> <b>'.$key['orderLevel'].'</white>.
										';
                                ?>
                                <ul class="timeline">
                                    <li>
                                        <?php
                                        if($key['briefingValue']==100)
                                        {
                                            echo '<div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>';
                                        }
                                        else if($key['briefingValue']<100 && $key['briefingValue']>0)
                                        {
                                            echo '<div class="timeline-badge warning"><i class="glyphicon glyphicon-thumbs-up"></i></div>';
                                        }
                                        else
                                        {
                                            echo ' <div class="timeline-badge danger"><i class="glyphicon glyphicon-thumbs-down"></i></div>';
                                        }
                                        ?>

                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title">Briefing</h4>
                                                <!--                                <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p>-->
                                            </div>
                                            <div class="timeline-body">
                                                <p>Briefing <?php echo $key['briefingValue']; ?>% complete.</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-inverted">
                                        <?php
                                        if($key['okChValue']==100)
                                        {
                                            echo '<div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>';
                                        }
                                        else if($key['okChValue']<100 && $key['okChValue']>0)
                                        {
                                            echo '<div class="timeline-badge warning"><i class="glyphicon glyphicon-thumbs-up"></i></div>';
                                        }
                                        else
                                        {
                                            echo ' <div class="timeline-badge danger"><i class="glyphicon glyphicon-thumbs-down"></i></div>';
                                        }
                                        ?>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title">Envoi du cahier des charges</h4>
                                            </div>
                                            <div class="timeline-body">
                                                <p>Envoi du cahier des charges <?php echo $key['okChValue']; ?>% complete.</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <?php
                                        if($key['envoiChValue']==100)
                                        {
                                            echo '<div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>';
                                        }
                                        else if($key['envoiChValue']<100 && $key['envoiChValue']>0)
                                        {
                                            echo '<div class="timeline-badge warning"><i class="glyphicon glyphicon-thumbs-up"></i></div>';
                                        }
                                        else
                                        {
                                            echo ' <div class="timeline-badge danger"><i class="glyphicon glyphicon-thumbs-down"></i></div>';
                                        }
                                        ?>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title">Acceptation du cahier des charges</h4>
                                            </div>
                                            <div class="timeline-body">
                                                <p>Acceptation du cahier des charges <?php echo $key['envoiChValue']; ?>% complete.</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-inverted">
                                        <?php
                                        if($key['designValue']==100)
                                        {
                                            echo '<div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>';
                                        }
                                        else if($key['designValue']<100 && $key['designValue']>0)
                                        {
                                            echo '<div class="timeline-badge warning"><i class="glyphicon glyphicon-thumbs-up"></i></div>';
                                        }
                                        else
                                        {
                                            echo ' <div class="timeline-badge danger"><i class="glyphicon glyphicon-thumbs-down"></i></div>';
                                        }
                                        ?>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title">Réalisation du design/visuel</h4>
                                            </div>
                                            <div class="timeline-body">
                                                <p>Réalisation du design/visuel <?php echo $key['designValue']; ?>% complete.</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <?php
                                        if($key['prodValue']==100)
                                        {
                                            echo '<div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>';
                                        }
                                        else if($key['prodValue']<100 && $key['prodValue']>0)
                                        {
                                            echo '<div class="timeline-badge warning"><i class="glyphicon glyphicon-thumbs-up"></i></div>';
                                        }
                                        else
                                        {
                                            echo ' <div class="timeline-badge danger"><i class="glyphicon glyphicon-thumbs-down"></i></div>';
                                        }
                                        ?>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title">En production</h4>
                                            </div>
                                            <div class="timeline-body">
                                                <p>En production <?php echo $key['prodValue']; ?>% complete.</p>

                                            </div>
                                        </div>
                                    </li>

                                    <li class="timeline-inverted">
                                        <?php
                                        if($key['livraisonValue']==100)
                                        {
                                            echo '<div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>';
                                        }
                                        else if($key['livraisonValue']<100 && $key['livraisonValue']>0)
                                        {
                                            echo '<div class="timeline-badge warning"><i class="glyphicon glyphicon-thumbs-up"></i></div>';
                                        }
                                        else
                                        {
                                            echo ' <div class="timeline-badge danger"><i class="glyphicon glyphicon-thumbs-down"></i></div>';
                                        }
                                        ?>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title">En cours de livraison</h4>
                                            </div>
                                            <div class="timeline-body">
                                                <p>En cours de livraison <?php echo $key['livraisonValue']; ?>% complete.</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <?php
                                        if($key['facturValue']==100)
                                        {
                                            echo '<div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>';
                                        }
                                        else if($key['facturValue']<100 && $key['facturValue']>0)
                                        {
                                            echo '<div class="timeline-badge warning"><i class="glyphicon glyphicon-thumbs-up"></i></div>';
                                        }
                                        else
                                        {
                                            echo ' <div class="timeline-badge danger"><i class="glyphicon glyphicon-thumbs-down"></i></div>';
                                        }
                                        ?>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title">Facturation</h4>
                                            </div>
                                            <div class="timeline-body">
                                                <p>Facturation <?php echo $key['facturValue']; ?>% complete.</p>

                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <?php
                                if ($key['briefingValue']==100 || $key['okChValue']==100 || $key['envoiChValue']==100 || $key['designValue']==100 || $key['prodValue']==100 || $key['livraisonValue']==100 || $key['facturValue']==100) {
                                    echo 'Veuillez télécharger votre facture :
											'.($key['facturationData']=='' ? '<white>Pas de facture disponible</white>' : '<white><b><a target="new" href="facture/'.$key['facturationData'].'"> <green>Cliquez pour voir Votre Facture</green></a></b></white>').'
												<br><br>
												<span class="txt"> la date de votre commande à été prise en charge le :<white><b> '.$key['date'].'</b></white></span><br></br>
										</fieldset>
									</div> <!--order-->';
                                }
                                if ($key['briefingValue']==100 || $key['okChValue']==100 || $key['envoiChValue']==100 || $key['designValue']==100 || $key['prodValue']==100 || $key['livraisonValue']==100 || $key['facturValue']==100) {
                                    echo "<span class='txt'><a id='download' style='border-radius: 3px;	color: padding:5px; #8B8590; background-color: #96CA2D;' target='new' href='facture/".$key['facturationData']."'>Téléchargement facture</a></span>";
                                    # code...
                                }

                            }
                        }
                    }
                    else{
                        $contenu = '<red>Erreur : Impossible de se connecter à la BD, veuillez contacter votre administrateur!</red>';
                    }

                    ?>

                </div><!--myOrderTB-->


            </div> <!--maOrder-->
            <?php
        } //fin de if client == 1
        ?>
    </div><!--container-->
</div><!-- content -->



<?php
include_once('js/script_js.php');
}
?>


<script type="text/javascript" src="rotator.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
</html>