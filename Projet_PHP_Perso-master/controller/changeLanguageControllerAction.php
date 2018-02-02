<?php
/**
 * Created by PhpStorm.
 * User: olivier
 * Date: 27/01/2018
 * Time: 21:48
 */

session_start();

include ('../model/utilDb.php');
include ('../view/utilView.php');

$newLangue = $_POST['newLangue'];

if(Language::isAlreadyExist($newLangue)){
    header('location:changeLanguageControllerDisplay.php?resultatinsertion=ko');
} else {
    Language::insertLanguage($newLangue);
    header('location:changeLanguageControllerDisplay.php?resultatinsertion=ok');
}

