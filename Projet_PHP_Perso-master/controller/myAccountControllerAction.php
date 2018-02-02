<?php
/**
 * Created by PhpStorm.
 * User: Backs
 * Date: 25/01/2018
 * Time: 16:20
 */
session_start();
include ('../view/utilView.php');

include('../model/utilDb.php');

$action = $_POST['action'];

$email = $_POST['email'];

$password= $_POST['password'];

if ($action == gettext('Modifier le mot de passe')){
    $password = password_hash($password, PASSWORD_DEFAULT);
    $_SESSION['message'] = gettext('Le mot de passe a été changé');
    UserModel::updateNewPassword($_SESSION['Mail'],$password);
}

if ($action == gettext('Modifier le mail')){
    $numeroutilisateur = $_SESSION['NumeroUtilisateur'];
    $_SESSION['message'] = gettext('L\'adresse mail à été changée');
    UserModel::updateNewMail($email,$numeroutilisateur);
    $_SESSION['Mail'] = $email;
}

header("Location: myAccountControllerDisplay.php");


