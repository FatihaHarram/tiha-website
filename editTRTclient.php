<?php
//on lance la session
session_start();

include_once('lib/php/fonction.php');
include_once('meta_header.php');
//include_once('nav.php');


//quand on appuie sur inscrire
if(isset($_POST['editClient'])){

    //le contenu n'affiche rien
    $contenu = '';

    $id_client			= $_POST['client_id'];
    $name		        = $_POST['name'];
    $firstname			= $_POST['firstname'];
    $phone			    = $_POST['phone'];
    $email 				= secureData($_POST['email']);
    $adress			    = $_POST['adress'];
    $active             =$_POST['active'];

    if(isset($_POST['client_id'])){

        $contenu = '';


        //on se connecte
        $connection = connectBD();

            // si on se connecte
            if($connection){
                //on récupère les données sécurisées du formulaire

                $req=$connection->prepare('UPDATE clients SET adress="'.$adress.'", phone="'.$phone.'", name="'.$name.'", firstname="'.$firstname.'", email="'.$email.'", active="'.$active.'" WHERE id = ?')->execute([$id_client]);

                $contenu = '<red>Votre profil a été modifié avec succès!</red>';

                //on renvoie à la page pour remplir le formulaire de commentaire
                header('refresh:3; url=clientsAdmin.php');
            }else{
                $contenu= '<red>Vous n\'êtes pas connecté à la BD, veuillez contacter votre administrateur!</red>';
            }

    }

    ?>

    <title>editTRTClient</title>
    <div id="content">
        <div id="container">
            <?php
            echo $contenu;
            ?>
        </div> <!--container-->
    </div><!--content-->

    <?php
}
?>