<?php
//include('../model/utilDb.php');
//$action = $_POST['action'];
//$atraduire= $_POST['atraduire'];
//
//include '../model/askTradModel.php';
//
//if($action == 'demande') {
//
//    insertRequest($atraduire);
//
//}
//
//header('../controller/askTradControllerDisplay.php');
//
//?>
<?php
/**
 * Created by PhpStorm.
 * User: olivier
 * Date: 04/01/2018
 * Time: 15:57
 */
session_start();
include ('../view/utilView.php');
include('../model/utilDb.php');

$action = $_POST['action'];
$atraduire = $_POST['atraduire'];

if (($action == 'demande') AND ($atraduire != '') AND ($atraduire != " ")AND ($atraduire != "  ") AND ($atraduire != "   ")){
    $_SESSION['message'] = gettext('Votre demande :') . $atraduire . gettext(' a été envoyée !');
    askTradModel::insertRequest($atraduire);
}
else
{
    $_SESSION['message'] = "Entrer une demande !";
}

header('Location: ../view/askTradView.php');
?>
