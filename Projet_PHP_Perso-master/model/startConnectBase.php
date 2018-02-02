<?php
/**
 * Created by PhpStorm.
 * User: olivier
 * Date: 09/01/2018
 * Time: 11:50
 */

try
{
    if(!isset($GLOBALS['pdo']))
    {
        $dsn = 'mysql:host=mysql-projet-php2018.alwaysdata.net;dbname=projet-php2018_tables';
        $pdo = new PDO($dsn, '149647','projetphp2018');
        $pdo->exec('SET CHARACTER SET utf8');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
catch(PDOException $e)
{
    die('Error : ' . $e->getMessage());
}