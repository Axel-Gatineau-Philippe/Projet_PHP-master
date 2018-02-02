<?php
/**
 * Created by PhpStorm.
 * User: olivier
 * Date: 27/01/2018
 * Time: 22:45
 */

require ('../localisation.php');
include '../model/utilDb.php';

$toutesLesLangues = Language::getAllLanguages();

echo '<select name ="choix">' . PHP_EOL;

foreach($toutesLesLangues as $uneLangue){
    echo '<option value="' . $uneLangue->idLangue . '">' . gettext($uneLangue->nomLangue) . '</option>' . PHP_EOL;
}
echo '</select>';
