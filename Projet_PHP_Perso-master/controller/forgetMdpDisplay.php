<?php
/**
 * Created by PhpStorm.
 * User: f15003938
 * Date: 18/01/18
 * Time: 14:08
 */

require ('../localisation.php');
if(isset ($_GET['message']))
{
    $message = '';
    if($_GET['message']=='ko') {
        $message = '<b>' . gettext('ATTENTION : tous les champs doivent être saisis !!') . '</b>';

    }
    if($_GET['message']=='exist') {
        include('../view/sentMailView.php');
    }
    else if($_GET['message']=='non') {
        $message = '<b>' . gettext('ATTENTION : mail non existant') . '</b>';

    }
}
include ("../view/forgetMdpView.php");