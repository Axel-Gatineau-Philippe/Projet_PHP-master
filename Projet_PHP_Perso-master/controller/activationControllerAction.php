<?php
/**
 * Created by PhpStorm.
 * User: olivier
 * Date: 16/01/2018
 * Time: 02:17
 */

session_start();
include ('../view/utilView.php');
include('../model/utilDb.php');

$mail = $_GET['log'];
$cle = $_GET['cle'];
$_SESSION['result'] = UserModel::checkUserForActivation($mail,$cle);
header ('location:./activationControllerDisplay.php');
