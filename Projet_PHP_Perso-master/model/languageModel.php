<?php
/**
 * Created by PhpStorm.
 * User: olivier
 * Date: 27/01/2018
 * Time: 21:51
 */

class Language
{
    public static function getAllLanguages()
    {
        $sql = 'SELECT idLangue, nomLangue FROM Langue';

        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $result = $stmt->fetchAll();
        return $result;
    }

    public static function insertLanguage($langue)
    {
        $sql = 'INSERT INTO Langue(nomLangue) VALUES(:langue)';
        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->bindValue('langue', $langue, PDO::PARAM_STR);
        $stmt->execute();
    }

    public static function isAlreadyExist($langue)
    {
        $sql = 'SELECT idLangue FROM Langue WHERE nomLangue LIKE :langue';
        $stmt = $GLOBALS['pdo']->prepare($sql);

        if ($stmt->execute(array(':langue' => $langue)) && $row = $stmt->fetch())
        {
            return true;
        }
        return false;
    }
}