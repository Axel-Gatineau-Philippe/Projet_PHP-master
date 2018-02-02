<?php
/**
 * Created by PhpStorm.
 * User: olivier
 * Date: 16/01/2018
 * Time: 23:54
 */

require ('../localisation.php');

if(isset($_GET['message']))
{
    $message = '';
    if($_GET['message']=='ko') {
        $message = '<b>' . gettext('ATTENTION : tous les champs doivent être saisis !!') . '</b>';
    } else if($_GET['message']=='notexist') {
        $message = '<b>' . gettext('ATTENTION : erreur de mail ou de mot de passe ou inscription non activée !!') . '</b>';
    }
}

include('../view/loginViewForm.php');