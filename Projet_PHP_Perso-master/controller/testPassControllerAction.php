<?php
/**
 * Created by PhpStorm.
 * User: Axel1
 * Date: 27/12/2017
 * Time: 12:28
 */

include '../model/utilDb.php';

if(empty($_POST['mail']) || empty($_POST['mdp']))
{
    header('location:loginControllerDisplayForm.php?message=ko');
}
else if (!userModel::isAlreadyExist($_POST['mail']))
{
    header('location:loginControllerDisplayForm.php?message=notexist');
}
else
{
    $mail = htmlspecialchars($_POST['mail']);
    $mdp = htmlspecialchars($_POST['mdp']);

    try
    {
        if(userModel::findUserForConnexion($mail, $mdp) && 1 == userModel::getActif($mail)){
            $resultat = userModel::findDataUserConnected($mail);
            session_start();
            $_SESSION['NumeroUtilisateur'] = $resultat['NumeroUtilisateur'];
            $_SESSION['Nom'] = $resultat['Nom'];
            $_SESSION['Prenom'] = $resultat['Prenom'];
            $_SESSION['Statut'] = $resultat['Statut'];
            $_SESSION['Mail'] = $resultat['Mail'];
            $_SESSION['Mail'] = $resultat['Mail'];
            $_SESSION['Mdp'] = $resultat['Mdp'];
            if(isset($_COOKIE['block'])){
                unset($_COOKIE['block']);
                setcookie('block', '', time() - 3600);
            }
            include('loginControllerDisplayFormOk.php');

        } else {
            header('location:loginControllerDisplayForm.php?message=notexist');
        }
    }
    catch(PDOException $e)
    {
        die('Error : ' . $e->getMessage());
    }
}
?>