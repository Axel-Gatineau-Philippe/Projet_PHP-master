<?php
/**
 * Created by PhpStorm.
 * User: olivier
 * Date: 28/01/2018
 * Time: 11:12
 */

class AddTradModel
{
    public static function insertTranslation($clef, $langue, $traduction, $date, $numeroDemande)
    {
        $sql = 'INSERT INTO Traduction(Clef, idLang, traduction, Date, NumeroDemande) VALUES(:Clef,:idLang,:traduction,:Date, :NumeroDemande)';
        $stmt = $GLOBALS['pdo']->prepare($sql);
        //$Date = date("Y-m-d");
        $stmt->bindValue('Clef', $clef, PDO::PARAM_STR);
        $stmt->bindValue('idLang', $langue, PDO::PARAM_INT);
        $stmt->bindValue('traduction', $traduction, PDO::PARAM_STR);
        $stmt->bindValue('Date', $date, PDO::PARAM_STR);
        $stmt->bindValue('NumeroDemande', $numeroDemande, PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function updateAskTranslation($numerodemande)
    {
        $sql = 'UPDATE DemandeTraduction SET Etat = "traduit" WHERE NumeroDemande = :numerodemande';
        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->bindValue('numerodemande', $numerodemande, PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function isOneTranslation($numerodemande, $valeur)
    {
        $sql = 'SELECT *
                FROM DemandeTraduction
                WHERE NumeroDemande = :numerodemande AND Valeur = :valeur';

        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->bindValue('numerodemande', $numerodemande, PDO::PARAM_INT);
        $stmt->bindValue('valeur', $valeur, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $result = $stmt->fetch();
        if(empty($result)){
            return false;
        } else {
            return true;
        }
    }

    public static function bestQueryForPremium($valeur)
    {
        $sql = 'SELECT traduction
                FROM Traduction
                WHERE traduction LIKE "%":traduction"%"';

        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->bindParam(':traduction', $valeur, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $result = $stmt->fetchAll();
        return $result;
    }
}