<?php

include('utilView.php');
start_page(gettext('Mail envoyé'));
?>
<div>
    <p>
        <b><?php echo gettext('Un mail vous a été envoyé.');?></b>
    </p>
    <a href=../index.php><?php echo gettext('Retour à l\'accueil');?></a>
</div>
<?php end_page();?>
