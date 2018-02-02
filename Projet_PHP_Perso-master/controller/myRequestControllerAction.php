<?php
session_start();
include ('../view/utilView.php');
include('../model/utilDb.php');

unset($_SESSION['valeur']);
unset($_SESSION['etat']);
unset($_SESSION['date']);
$action = $_POST['action'];
if ($action == gettext('Actualiser')){
    $_SESSION['message'] = gettext('Le tableau de requêtes c est actualisé !');
    $demandes = askTradModel::selectRequest();
    $_SESSION['demandes'] = $demandes;
    header("Location: myRequestControllerDisplay.php");
}
?>