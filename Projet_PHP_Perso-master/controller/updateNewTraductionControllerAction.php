<?php
/**
 * Created by PhpStorm.
 * User: Axel1
 * Date: 27/01/2018
 * Time: 12:03
 */

session_start();

include ('../view/utilView.php');
include('../model/utilDb.php');

$action = $_POST['action'];

//Il faut récuperer le numéro de demande du tableau pour pouvoir l'utiliser dans la requête