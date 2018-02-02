<?php
include ('../view/utilView.php');
include('../model/utilDb.php');

if (userModel::isAlreadyExist($_POST['mail']))
{

    $monMail =$_POST['mail'];
    $nouveauMdp = userModel::Genere_Password(10);
    #UserModel::sendMailPassword($monMail,$nouveauMdp);

    #header('location:forgetMdpDisplay.php?message=exist');
    try
    {
        UserModel::sendMailPassword($monMail,$nouveauMdp);
        $mdp = password_hash($nouveauMdp, PASSWORD_DEFAULT);
        UserModel::updateNewPassword($monMail,$mdp);


        header("Location: ../view/forgetMdpOkView.php");
    }
    catch(PDOException $e)
    {
        die('Error : ' . $e->getMessage());
    }
}
elseif (empty($_POST['mail']))
{
    header('location:forgetMdpDisplay.php?message=ko');
}
else
{
    header('location:forgetMdpDisplay.php?message=non');
}