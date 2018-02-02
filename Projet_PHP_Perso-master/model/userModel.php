<?php
/**
 * Created by PhpStorm.
 * User: olivier
 * Date: 03/01/2018
 * Time: 20:41
 */

class UserModel{
    public static function insertUser($aUser)
    {
        $sql = 'INSERT INTO Utilisateur(Nom, Prenom, Mail, Mdp, Statut, CleActivation) VALUES(:nameUser, :firstNameUser, :mailUser, :passUser,:typeUser, :cleActivation)';
        $stmt = $GLOBALS['pdo']->prepare($sql);

        $nameUser = $aUser->getNameUser();
        $firstNameUser = $aUser->getFirstNameUser();
        $mailUser = $aUser->getMailUser();
        $passUser = $aUser->getPassUser();
        $typeUser = $aUser->getTypeUser();
        $cleActivation = $aUser->getCleActivation();

        $stmt->bindValue('nameUser', $nameUser, PDO::PARAM_STR);
        $stmt->bindValue('firstNameUser', $firstNameUser, PDO::PARAM_STR);
        $stmt->bindValue('mailUser', $mailUser, PDO::PARAM_STR);
        $stmt->bindValue('passUser', $passUser, PDO::PARAM_STR);
        $stmt->bindValue('typeUser', $typeUser, PDO::PARAM_STR);
        $stmt->bindValue('cleActivation', $cleActivation, PDO::PARAM_STR);
        $stmt->execute();
    }

    public static function updateEmail($aUser)
    {

        $sql = 'UPDATE Utilisateur SET Mail = :mail';
        $stmt = $GLOBALS['pdo']->prepare($sql);

        $nameUser = $aUser->getNameUser();
        $firstNameUser = $aUser->getFirstNameUser();
        $mailUser = $aUser->getMailUser();
        $passUser = $aUser->getPassUser();
        $typeUser = $aUser->getTypeUser();
        $cleActivation = $aUser->getCleActivation();

        $stmt->bindValue('nameUser', $nameUser, PDO::PARAM_STR);
        $stmt->bindValue('firstNameUser', $firstNameUser, PDO::PARAM_STR);
        $stmt->bindValue('mailUser', $mailUser, PDO::PARAM_STR);
        $stmt->bindValue('passUser', $passUser, PDO::PARAM_STR);
        $stmt->bindValue('typeUser', $typeUser, PDO::PARAM_STR);
        $stmt->bindValue('cleActivation', $cleActivation, PDO::PARAM_STR);
        $stmt->execute();
    }

    public static function isAlreadyExist($mail)
    {
        $sql = 'SELECT NumeroUtilisateur FROM Utilisateur WHERE Mail LIKE :mail';
        $stmt = $GLOBALS['pdo']->prepare($sql);

        if ($stmt->execute(array(':mail' => $mail)) && $row = $stmt->fetch())
        {
            return true;
        }
        return false;
    }

    public static function getActif($mail)
    {
        $sql = 'SELECT ActifActivation FROM Utilisateur WHERE Mail LIKE :mail';
        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->bindParam(':mail', $mail);
        $stmt->execute(array(':mail' => $mail));
        $resultat = $stmt->fetch();
        return $resultat['ActifActivation'];

        if ($stmt->execute(array(':mail' => $mail)) && $row = $stmt->fetch())
        {
            return true;
        }
    }

    public static function findUserForConnexion($mail, $mdp)
    {

        $sql = 'SELECT NumeroUtilisateur, Mdp FROM Utilisateur WHERE Mail LIKE :mail';
        $stmt = $GLOBALS['pdo']->prepare($sql);

        if ($stmt->execute(array(':mail' => $mail)) && $resultat = $stmt->fetch())
        {
            if (password_verify($mdp, $resultat['Mdp']))
            {
                return true;
            }
            else
            {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function findDataUserConnected($mail)
    {
        $sql = 'SELECT NumeroUtilisateur, Nom, Prenom, Statut, Mail, Mdp FROM Utilisateur WHERE Mail LIKE :mail';
        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->bindParam(':mail', $mail);
        $stmt->execute(array(':mail' => $mail));
        $resultat = $stmt->fetch();
        return $resultat;
    }

    public static function checkUserForActivation($mail, $cle)
    {
        $sql = 'SELECT CleActivation, ActifActivation FROM Utilisateur WHERE Mail LIKE :mail';
        $stmt = $GLOBALS['pdo']->prepare($sql);

        if ($stmt->execute(array(':mail' => $mail)) && $row = $stmt->fetch())
        {
            $clebdd = $row['CleActivation'];
            $actif = $row['ActifActivation'];
        }

        if ($actif == '1')
        {
            //$result = "Votre compte est déjà actif !";
            $result =  gettext('Votre compte est déjà actif !');
        }
        else
        {
            if ($cle == $clebdd)
            {
                //$result =  "Votre compte a bien été activé !";
                $result = gettext('Votre compte a bien été activé !');
                $stmt = $GLOBALS['pdo']->prepare("UPDATE Utilisateur SET ActifActivation = 1 WHERE Mail like :mail ");
                $stmt->bindParam(':mail', $mail);
                $stmt->execute();
            }
            else
            {
                $result = gettext('Erreur ! Votre compte ne peut être activé...');
                //$result = "Erreur ! Votre compte ne peut être activé...";
            }
        }
        return $result;
    }

    public static function sendMailActivation($aUser)
    {
        $to = $aUser->getMailUser();
        $from = 'dut83470@gmail.com';
        $reply = 'iutphp@gmail.com';
        $subject = 'Activer votre compte';
        $bndary = md5(uniqid(mt_rand()));
        $headers = 'From: Name <' . $from . '>' . "\n";
        $headers .= 'Return-Path: <' . $reply . '>' . "\n";
        $headers .= 'Content-type: multipart/alternative; boundary="' . $bndary. '"';
        //$message_text = 'Pour activer votre compte, veuillez cliquer sur le lien ci-dessous ou copier/coller dans votre navigateur internet.' . "\n\n";
        $message_text = gettext('Pour activer votre compte, veuillez cliquer sur le lien ci-dessous ou copier/coller dans votre navigateur internet.') . "\n\n";
        $message_text .= 'http://projet-php2018.alwaysdata.net/controller/activationControllerAction.php?log=' . urlencode($aUser->getMailUser()) . '&cle=' . urlencode($aUser->getCleActivation()) . "\n\n";
        //$message_html = '<html><body><p><strong>Pour activer votre compte, veuillez cliquer sur le lien ci-dessous ou copier/coller dans votre navigateur internet.</strong></p><p>http://projet-php2018.alwaysdata.net/controller/activationControllerAction.php?log=' . urlencode($aUser->getMailUser()) . '&cle=' . urlencode($aUser->getCleActivation()) . '</p></body></html>';
        $message_html = '<html><body><p><strong>' . gettext('Pour activer votre compte, veuillez cliquer sur le lien ci-dessous ou copier/coller dans votre navigateur internet.') . '</strong></p><p>http://projet-php2018.alwaysdata.net/controller/activationControllerAction.php?log=' . urlencode($aUser->getMailUser()) . '&cle=' . urlencode($aUser->getCleActivation()) . '</p></body></html>';
        $message = '--' . $bndary . "\n";
        $message .= 'Content-Type: text/plain; charset=utf-8' . "\n\n";
        $message .= $message_text . "\n\n";
        $message .= '--' . $bndary . "\n";
        $message .= 'Content-Type: text/html; charset=utf-8' . "\n\n";
        $message .= $message_html . "\n\n";
        mail($to, $subject, $message, $headers);
    }

    public static function getStatus($mail)
    {
        $sql = 'SELECT Statut FROM Utilisateur WHERE Mail LIKE :mail';
        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->execute(array(':mail' => $mail));
        $resultat = $stmt->fetch();
        return $resultat;
    }

    public static function updateStatus($mail, $statut)
    {
        $sql = 'UPDATE Utilisateur SET Statut = :statut WHERE Mail = :mail';
        $stmt = $GLOBALS['pdo']->prepare($sql);

        $stmt->bindValue('statut', $statut, PDO::PARAM_STR);
        $stmt->bindValue('mail', $mail, PDO::PARAM_STR);
        $stmt->execute();

    }

    public static function Genere_Password($size)
    {
        $password = '';
        $characters = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");

        for($i=0;$i<$size;$i++)
        {
            $password .= ($i%2) ? strtoupper($characters[array_rand($characters)]) : $characters[array_rand($characters)];
        }

        return $password;
    }

    public static function sendMailPassword($mail, $password)
    {
        $to = $mail;
        $from = 'dut83470@gmail.com';
        $reply = 'iutphp@gmail.com';
        $subject = 'Nouveau mot de passe ';
        $bndary = md5(uniqid(mt_rand()));
        $headers = 'From: Name <' . $from . '>' . "\n";
        $headers .= 'Return-Path: <' . $reply . '>' . "\n";
        $headers .= 'Content-type: multipart/alternative; boundary="' . $bndary. '"';
        //$message_text = 'Pour activer votre compte, veuillez cliquer sur le lien ci-dessous ou copier/coller dans votre navigateur internet.' . "\n\n";
        $message = "Votre nouveau mot de passe est " . $password;
        mail($to, $subject, $message, $headers);
    }

    public static function updateNewPassword($mail, $mdp)
    {
        $sql = 'UPDATE Utilisateur SET Mdp = :mdp WHERE Mail = :mail';
        $stmt = $GLOBALS['pdo']->prepare($sql);

        $stmt->bindValue('mdp', $mdp, PDO::PARAM_STR);
        $stmt->bindValue('mail', $mail, PDO::PARAM_STR);
        $stmt->execute();

    }

    public static function updateNewMail($mail,$numeroutilisateur)
    {
        $sql = 'UPDATE Utilisateur SET Mail = :mail WHERE NumeroUtilisateur= :numeroutilisateur';
        $stmt = $GLOBALS['pdo']->prepare($sql);

        $stmt->bindValue('mail', $mail, PDO::PARAM_STR);
        $stmt->bindValue('numeroutilisateur', $numeroutilisateur, PDO::PARAM_STR);
        $stmt->execute();

    }

    public static function getTraduction()
    {
        $sql = 'SELECT Valeur FROM DemandeTraduction WHERE Etat = "EC" AND NumeroDemande = NumeroDemande';
        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->execute();
        $resultat = $stmt->fetchAll();
        return $resultat;
    }

    public static function updateNewTraduction($traduction, $numDemande)
    {
        $sql = "UPDATE Traduction SET traduction = :traduction WHERE NumeroDemande = :numDemande";
        $stmt = $GLOBALS['pdo']->prepare($sql);

        $stmt->bindValue('traduction', $traduction, PDO::PARAM_STR);
        $stmt->bindValue('numDemande', $numDemande, PDO::PARAM_STR);
        $stmt->excute();
    }

    public static function updateTraduction($oldTraduction, $newTraduction, $numTrad)
    {
        $sql = 'UPDATE Traduction SET traduction = :newTraduction WHERE traduction = :oldTraduction  AND NumeroTraduction = :numTrad';
        $stmt = $GLOBALS['pdo']->prepare($sql);

        $stmt->bindValue('newTraduction', $newTraduction, PDO::PARAM_STR);
        $stmt->bindValue('oldTraduction', $oldTraduction, PDO::PARAM_STR);
        $stmt->bindValue('numTrad', $numTrad, PDO::PARAM_STR);
        $stmt->execute();
    }

    public static function isAlreadyExistNumTrad($numTrad)
    {
        $sql = 'SELECT NumeroTraduction FROM Traduction WHERE NumeroTraduction LIKE :numTrad';
        $stmt = $GLOBALS['pdo']->prepare($sql);

        if ($stmt->execute(array(':numTrad' => $numTrad)) && $row = $stmt->fetch())
        {
            return true;
        }
        return false;
    }

    public static function isAlreadyExistTrad($oldTrad)
    {
        $sql = 'SELECT traduction FROM Traduction WHERE traduction LIKE :oldTrad';
        $stmt = $GLOBALS['pdo']->prepare($sql);

        if ($stmt->execute(array(':oldTrad' => $oldTrad)) && $row = $stmt->fetch())
        {
            return true;
        }
        return false;
    }
}
?>