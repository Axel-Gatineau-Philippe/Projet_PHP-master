<?php

include('utilView.php');
start_page(gettext('Connexion'));
?>
<div>
    <p>
        <b><?php echo gettext('Vous êtes connecté.');?></b>
    </p>
    <a href=../index.php><?php echo gettext('Retour à l\'accueil');?></a>
</div>

<?php end_page();?>