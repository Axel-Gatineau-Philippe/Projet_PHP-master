<?php
/**
 * Created by PhpStorm.
 * User: olivier
 * Date: 03/01/2018
 * Time: 18:16
 */

include('../model/utilDb.php');

if(empty($_POST['name']) || empty($_POST['firstname']) || empty($_POST['password']) || empty($_POST['mail']) || empty($_POST['typeUser']))
{
    header('location:signUpControllerDisplayForm.php?message=ko');
}
else if (userModel::isAlreadyExist($_POST['mail']))
{
    header('location:signUpControllerDisplayForm.php?message=exist');
}
else
{
    $nameUser = htmlspecialchars($_POST['name']);
    $firstNameUser = htmlspecialchars($_POST['firstname']);
    $passUser = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $mailUser = htmlspecialchars($_POST['mail']);
    $typeUser = htmlspecialchars($_POST['typeUser']);
    $cleActivation = md5(microtime(TRUE)*100000);

    $aUser = new User($nameUser, $firstNameUser, $mailUser, $passUser, $typeUser, $cleActivation);

    try
    {
        UserModel::insertUser($aUser);
        UserModel::sendMailActivation($aUser);
        include('./signUpControllerDisplayOk.php');
    }
    catch(PDOException $e)
    {
        die('Error : ' . $e->getMessage());
    }
}