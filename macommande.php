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
    <div id="container_order" >
        <div id="client_client">
           jjdjdjjsja
        </div> <!--order-->
    </div><!--container-->
</div><!--fin de la DIV content -->


<?php


include_once('js/script_js.php');
?>

</body>
</html>