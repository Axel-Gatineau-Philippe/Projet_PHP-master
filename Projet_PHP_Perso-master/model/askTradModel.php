<?php
/**
 * Created by PhpStorm.
 * User: olivier
 * Date: 04/01/2018
 * Time: 15:45
 */

class AskTradModel
{
    public static function insertRequest($demande)
    {
        $sql = 'INSERT INTO DemandeTraduction(Valeur, Etat, Date,NumeroUtilisateur) VALUES(:Valeur,:Etat,:Date,:NumeroUtilisateur)';
        $stmt = $GLOBALS['pdo']->prepare($sql);

        $Valeur = $demande;
        $Etat = "EC";
        $Date =  date("Y-m-d");
        echo $Date;
        $NumeroUtilisateur = AskTrad::getNumeroUtilisateur();
        echo $NumeroUtilisateur;

        $stmt->bindValue('Valeur', $Valeur, PDO::PARAM_STR);
        $stmt->bindValue('Etat', $Etat, PDO::PARAM_STR);
        $stmt->bindValue('Date', $Date, PDO::PARAM_STR);
        $stmt->bindValue('NumeroUtilisateur', $NumeroUtilisateur, PDO::PARAM_STR);

        $stmt->execute();
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

    public static function findTranslation($valeur, $idLangue)
    {
        $sql = 'SELECT traduction, Clef
                FROM Traduction
                WHERE Clef LIKE ( SELECT Clef
                                  FROM Traduction
                                  WHERE traduction LIKE :traduction )
                AND idLang = :idLang';

        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->bindParam(':traduction', $valeur, PDO::PARAM_STR);
        $stmt->bindParam(':idLang', $idLangue, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $result = $stmt->fetch();
        return $result;
    }

    public static function selectRequest()
    {
        $sql = 'SELECT  DISTINCT Valeur, Etat, Date, NumeroUtilisateur
                FROM DemandeTraduction
                WHERE NumeroUtilisateur = :id';
        $stmt = $GLOBALS['pdo']->prepare($sql);
        $NumeroUtilisateur = AskTrad::getNumeroUtilisateur();
        $stmt->bindParam(':id', $NumeroUtilisateur, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchall();
        return $result;
    }

    public static function selectALLRequest()
    {
        $sql = 'SELECT NumeroDemande, Valeur, Etat, Date, NumeroUtilisateur
                FROM DemandeTraduction
                WHERE Etat LIKE "EC"';
        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $result = $stmt->fetchAll();//on récupère un tableau d'objets
        return $result;
    }
}