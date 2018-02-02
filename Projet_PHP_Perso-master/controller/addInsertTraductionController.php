<?php
/**
 * Created by PhpStorm.
 * User: olivier
 * Date: 28/01/2018
 * Time: 11:55
 */

session_start();
require ('../localisation.php');
include ('../view/utilView.php');
include('../model/utilDb.php');

if(!empty($_POST['NumeroDemande']) && !empty($_POST['Clef'])){
    if(AddTradModel::isOneTranslation($_POST['NumeroDemande'], $_POST['Clef'])){
        AddTradModel::insertTranslation($_POST['Clef'], $_POST['idLang'], $_POST['traduction'], $_POST['Date'], $_POST['NumeroDemande']);
        AddTradModel::updateAskTranslation($_POST['NumeroDemande']);
        header("Location: addTraductionControllerDisplay.php?res=cok");
    } else {
        header("Location: addTraductionControllerDisplay.php?res=cko");
    }
} else {
    header("Location: addTraductionControllerDisplay.php?res=cko");
}