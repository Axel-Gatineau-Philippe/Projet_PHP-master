<?php
/**
 * Created by PhpStorm.
 * User: g16006159
 * Date: 18/01/18
 * Time: 14:11
 */
session_start();
include ('../view/utilView.php');

include('../model/utilDb.php');
$mail = $_POST['mail'];
$action = $_POST['action'];

if ($action == gettext('Rechercher')) {
    if (UserModel::isAlreadyExist($mail) == true) {

        $stat = UserModel::getStatus($mail);
        $_SESSION['statututil'] = $stat['Statut'];

        $_SESSION['message'] = gettext('L\'utilisateur à le rang =') . $_SESSION['statututil'];
    } else {
        $_SESSION['message'] = gettext('utilisateur est introuvable');
    }
}

header('Location: mailControllerDisplay.php');

?>