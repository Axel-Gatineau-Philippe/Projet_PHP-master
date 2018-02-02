<?php
/**
 * Created by PhpStorm.
 * User: Axel1
 * Date: 27/12/2017
 * Time: 19:32
 */
session_start();
include '../view/utilView.php';

start_page(gettext('Déconnexion'));

unset($_SESSION);
session_destroy();
header('location:../index.php');

end_page();