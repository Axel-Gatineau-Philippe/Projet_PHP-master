<?php
/**
 * Created by PhpStorm.
 * User: olivier
 * Date: 24/01/2018
 * Time: 14:31
 */
//include ('../view/utilView.php');
include('../model/utilDb.php');

$langue = $_POST['choix'];
$nomLangue = Export::getNameLanguage($langue);
$resultat = Export::getDataLanguage($langue); //récupère toutes les données de la table traduction

//le fichier .po généré sera placé dans le répertoire Download
$monfic = '../Download/traduction_' . $nomLangue->nomLangue . '.po';

$monfichier = fopen($monfic, 'w+');

$lig1 = 'msgid ""' . "\r\n";
$lig2 = 'msgstr ""' . "\r\n";
$lig3 = '"Language:"' . "\r\n";
$lig4 = '"MIME-Version: 1.0"' . "\r\n";
$lig5 = '"Content-Type: text/plain; charset=UTF-8"' . "\r\n";
$lig6 = '"Content-Transfer-Encoding: 8bit"'. "\r\n\r\n";

fputs($monfichier, $lig1);
fputs($monfichier, $lig2);
fputs($monfichier, $lig3);
fputs($monfichier, $lig4);
fputs($monfichier, $lig5);
fputs($monfichier, $lig6);

foreach($resultat as $traduction){
    $ligne1 = 'msgid ' .  '"' . $traduction->Clef . '"' . "\r\n";
    fputs($monfichier, $ligne1);
    $ligne2 = 'msgstr ' .  '"' . $traduction->traduction . '"' . "\r\n\r\n";
    fputs($monfichier, $ligne2);
}

fclose($monfichier);

header('Content-Type: text/plain\n');
header('Content-disposition: attachment; filename='. $monfic);
header('Pragma: no-cache');
header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
header('Expires: 0');
readfile($monfic);

