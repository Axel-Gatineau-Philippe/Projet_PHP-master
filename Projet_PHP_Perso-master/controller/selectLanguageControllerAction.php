<?php
/**
 * Created by PhpStorm.
 * User: f15003938
 * Date: 17/01/18
 * Time: 14:48
 */
include ('../view/utilView.php');

$language=$_GET['lang'];
setcookie('language', $language, time() + 365*24*3600, null, null, false, true);
header ('location:selectLanguageControllerDisplay.php');

?>