<?php
session_start();
//on vérifie si l'utilisateur est un admin et s'il est connecté
if (!isset($_SESSION['id']))
{
    // l'utilisateur est renvoyé vers la page index
    header('refresh:0;url=index.php');
}

elseif ($_SESSION['admin'] == 0)
{
    // l'utilisateur est renvoyé vers la page index
    header('refresh:0;url=index.php');
}

include_once('lib/php/fonction.php');
include_once('meta_header.php');
include_once('nav.php');
?>

<title>admin</title>
</head>
<body>



<div id="content">
    <div id="container" class="adminContainer" >
        <!--Edit Client-->
        <div id="client_client">
        <?php

        $conetenu="";

        //on se connecte
        $connection = connectBD();

        if($connection)
        {
            //requête de sélection
            $c_id=$_REQUEST['id'];
            $requête = 'SELECT * FROM clients WHERE id='.$c_id;

            $resultats = $connection->query($requête);

            if($resultats->rowCount()==1)
            {

                //boucle pour récupérer les données
                foreach ($resultats as $key)
                {
                    //affichage de la commande
                    $_SESSION['client_id']=$key['id'];
                    $_SESSION['cname']=$key['name'];
                    $_SESSION['cfirstname']=$key['firstname'];
                    $_SESSION['cadress']=$key['adress'];
                    $_SESSION['cphone']=$key['phone'];
                    $_SESSION['cemail']=$key['email'];
                }

            }
        }
        ?>
    </div> <!--order-->
        <?php if(isset($_SESSION['client_id'])){ ?>
         <div id="fiche_client" >
         <form  class="" id="edit_client" name="edit_client" method="POST" action="editTRTclient.php" >
         <header>
<!--         <h2>Edit client</h2>-->
<!--             Fermeture du formulaire avec la croix-->
         <span class="close" style=" position: absolute; margin-left: 72%; margin-top: -30%;"><img src="img/CloseX64.png"></span>
         </header>
         <fieldset>
         <legend><h2 style="font-size:1em;">EDIT CLIENT</h2></legend>
             <input type='hidden' id="client_id" name="client_id" value="<?php echo $_SESSION['client_id']; ?>"/>
         <label for="name">NAME</label>
         <input class=""  id="name" type="text" name="name" value="<?php echo $_SESSION['cname'];?>" maxlength="200" placeholder=" Name" /><br>

         <label for="firstname">FIRSTNAME</label>
         <input class=""  id="firstname" type="text" name="firstname" value="<?php echo $_SESSION['cfirstname'];?>" maxlength="200" placeholder=" firstname" /><br>

         <label for="adress">ADRESS</label>
         <input class=""  id="adress" type="text" name="adress" value="<?php echo $_SESSION['cadress'];?>" maxlength="200" placeholder=" adress" /><br>

         <label for="phone">PHONE</label>
         <input class=""  id="phone" type="text" name="phone" value="<?php echo $_SESSION['cphone'];?>" maxlength="200" placeholder=" phone" /><br>

         <label for="email">EMAIL</label>
         <input class=""  id="email" type="email" name="email" value="<?php echo $_SESSION['cemail'];?>" maxlength="200" placeholder=" email" /><br>
             <label for="state">Status</label><br>
                 <select id="active" name="active" >
                     <option value="1">Active</option>
                     <option value="0">Inactive</option>
                 </select><br>


<!--         <label for="mdp">MOT DE PASSE</label>-->
<!--         <input class=""  id="mdp" type="password" name="mdp" value="--><?php //echo $mdp; ?><!--" maxlength="200" placeholder=" MDP"/><br>-->
<!--        input du formulaire-->
         <input type="submit" name="editClient" value="UPDATE DETAILS" id="add">
         </fieldset>
         </form>
<!--        Bouton input pour montrer le formulaire-->
<!--         <input type="submit" name="show_clientForm" value="NOUVEAU CLIENT" id="show_clientForm" class="show_clientForm">-->
        </div>
<?php }
?>
    </div><!--container-->
</div><!--fin de la DIV content -->


<?php


include_once('js/script_js.php');
?>

</body>
</html>