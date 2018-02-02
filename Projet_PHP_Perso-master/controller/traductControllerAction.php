<?php
session_start();

include ('../view/utilView.php');
include('../model/utilDb.php');

if(isset($_POST['atraduire'],$_POST['choix'])){
    $_SESSION['atraduire'] = $_POST['atraduire'];
    $_SESSION['choix'] = $_POST['choix'];
}

//le cookie "bloque" autorise une recherche toutes les 10 mn pour les utilisateurs non connectés

if(!$_COOKIE['block']){
    if (empty($_POST['atraduire'])){
        header('location:traductionControllerDisplay.php?reponse=vide');
    } else {
        $valeur = htmlspecialchars($_POST['atraduire']);
        $traduction = AskTradModel::findTranslation($valeur, $_POST['choix']);
        if(empty($traduction)){
            header('location:traductionControllerDisplay.php?reponse=nofind');
        } else {
            header('location:traductionControllerDisplay.php?reponse=' . $traduction->traduction . '& cle=' . $valeur);
        }
    }
} else {
    header('location:traductionControllerDisplay.php?reponse=bloque');
}

if(!isset($_SESSION['NumeroUtilisateur'])){
    if(!$_COOKIE['block']){
        setcookie("block", true, time() + 600);
    }
}

?>