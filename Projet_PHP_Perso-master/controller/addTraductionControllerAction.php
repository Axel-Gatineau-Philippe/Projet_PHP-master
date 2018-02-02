<?php
/**
 * Created by PhpStorm.
 * User: g16006159
 * Date: 26/01/18
 * Time: 17:20
 */

session_start();
include ('../view/utilView.php');
include('../model/utilDb.php');

$demandesall = askTradModel::selectAllRequest();
$_SESSION['demandesall'] = $demandesall;
header("Location: addTraductionControllerDisplay.php");
