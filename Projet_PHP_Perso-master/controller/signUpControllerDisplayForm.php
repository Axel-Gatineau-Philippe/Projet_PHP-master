<?php
/**
 * Created by PhpStorm.
 * User: olivier
 * Date: 09/01/2018
 * Time: 10:48
 */

require ('../localisation.php');

if(isset ($_GET['message']))
{
    $message = '';
    if($_GET['message']=='ko') {
        $message = '<b>' . gettext('ATTENTION : tous les champs doivent être saisis !!') . '</b>';
    } else if($_GET['message']=='exist') {
        $message = '<b>' . gettext('ATTENTION : l\'adresse mail existe déjà !!') . '</b>';
    }
}

include('../view/signUpViewForm.php');