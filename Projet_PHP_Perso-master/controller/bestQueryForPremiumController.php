<?php
/**
 * Created by PhpStorm.
 * User: olivier
 * Date: 28/01/2018
 * Time: 00:00
 */

include('../model/utilDb.php');

if(isset($_SESSION['atraduire'])){
    if(!empty($_SESSION['atraduire'])){
        $traduction = AskTradModel::findTranslation($_SESSION['atraduire'], $_SESSION['choix']);
        if (empty($traduction)) {
            $resultat = AskTradModel::bestQueryForPremium($_SESSION['atraduire']);
            echo '<hr>';
            echo '<p>Recherche améliorée par pertinence pour les utilisateurs premium :</p>';
            echo '<p>Les mots suivants sont présents dans notre base de données :</p>';
            echo '<p>Vous vouliez peut être dire :</p>';
            foreach ($resultat as $trad) {
                echo '--> ' . $trad->traduction . '<br/>';
            }
            echo '<hr>';
        }
    }
}