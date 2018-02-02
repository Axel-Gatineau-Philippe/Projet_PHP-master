<?php
/**
 * Created by PhpStorm.
 * User: g16006159
 * Date: 18/01/18
 * Time: 14:53
 */

session_start();

include ('../view/utilView.php');

include "../model/utilDb.php";
$statut = $_POST['statut'];
$mail = $_POST['mail'];

if (isset($_POST['statut']) && isset($_POST['mail']))
{

    if(UserModel::isAlreadyExist($mail) == true) {
        UserModel::updateStatus($mail, $statut);
        $_SESSION['message'] = gettext('Le rang de ') . $mail . gettext(' a été changé à ') . $statut;

        header('location:changeStatutControllerDisplay.php');
  }
   else{
       $_SESSION['message'] = gettext('L\'utilisateur est introuvable');

        header('location:changeStatutControllerDisplay.php?');
   }

include "../view/administratorView.php";
}


