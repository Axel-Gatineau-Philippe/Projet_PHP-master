<?php
session_start();
include('utilView.php');
start_page(gettext('Erreur'));
nav_bar();
nav_bar_end();
?>

    <div>
        <p>
            <b><?php echo gettext('Veuillez nous excuser, une erreur inconnue est survenue !');?></b>
        </p>
        <a href=../index.php><?php echo gettext('Retour à l\'accueil')?></a>
    </div>

<?php end_page();?>