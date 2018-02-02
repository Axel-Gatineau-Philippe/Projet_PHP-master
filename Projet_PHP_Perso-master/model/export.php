<?php

class Export
{
    public static function getDataLanguage($langue)
    {

        $sql = 'SELECT Clef, traduction FROM Traduction WHERE idLang = :idLang';
        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->bindParam(':idLang', $langue, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $result = $stmt->fetchAll();//on récupère un tableau d'objets
        return $result;
    }

    public static function getNameLanguage($idLangue)
    {
        $sql = 'SELECT nomLangue FROM Langue WHERE idLangue = :idLang';
        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->bindParam(':idLang', $idLangue, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $result = $stmt->fetch();
        return $result;
    }
}