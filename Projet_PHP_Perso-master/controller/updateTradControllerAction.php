<?php
/**
 * Created by PhpStorm.
 * User: Axel1
 * Date: 27/01/2018
 * Time: 16:10
 */

session_start();
include('../model/utilDb.php');

$numTrad = $_POST['numtrad'];
$oldTrad = $_POST['oldTrad'];
$newTrad = $_POST['newTrad'];
$action = $_POST['action'];

if (isset($_POST['numtrad']) && isset($_POST['oldTrad']) && isset($_POST['newTrad']))
{
    if ($action == gettext('Modifier'))
    {
        if (UserModel::isAlreadyExistNumTrad($numTrad))
        {
            if (UserModel::isAlreadyExistTrad($oldTrad)) {
                UserModel::updateTraduction($oldTrad, $newTrad, $numTrad);
                $_SESSION['message'] = gettext('La traduction de ') . $oldTrad . gettext(' a été changée en ') . $newTrad;

                header('location:updateTradControllerDisplay.php');
            }else {
                $_SESSION['message'] = gettext('La traduction est introuvable');

                header('location:updateTradControllerDisplay.php?');
            }
        }
        else {
            $_SESSION['message'] = gettext('La traduction est introuvable');

            header('location:updateTradControllerDisplay.php?');
        }
    }
    else {
        $_SESSION['message'] = gettext('La traduction est introuvable');

        header('location:updateTradControllerDisplay.php?');
    }
}

include "../view/addTraductionView.php";

