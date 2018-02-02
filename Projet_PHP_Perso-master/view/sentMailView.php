<?php
/**
 * Created by PhpStorm.
 * User: f15003938
 * Date: 18/01/18
 * Time: 14:22
 */
session_start();
include ('utilView.php');
include('../model/utilDb.php');
require ('../localisation.php');

echo gettext('Mail envoyé');