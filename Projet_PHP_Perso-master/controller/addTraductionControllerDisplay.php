<?php
/**
 * Created by PhpStorm.
 * User: Axel1
 * Date: 27/01/2018
 * Time: 11:41
 */

require ('../localisation.php');

if(isset ($_GET['res']))
{
    $message = '';
    if($_GET['res']=='cko') {
        $message = '<b>' . gettext('Pas d\'insertion !!') . '</b>';
    } else if($_GET['res']=='cok') {
        $message = '<b>' . gettext('Traduction insérée') . '</b>';
    }
}

include '../view/addTraductionView.php';

?>