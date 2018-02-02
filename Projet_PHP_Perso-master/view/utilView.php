<?php
/**
 * Created by PhpStorm.
 * User: g16006159
 * Date: 05/12/17
 * Time: 10:32
 */

include('../localisation.php');

function start_page($title)
{
    echo '<!DOCTYPE html>
            <html lang="fr">
                <head>
                    <title>' . PHP_EOL . $title . '</title>
                    <meta charset="UTF-8">
                    <meta name="author" content="Groupe 2A équipe 2">
                    <meta name="description" CONTENT="Projet PHP">
                    <meta name="keywords" CONTENT="Projet, Université, PHP">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <link rel="icon" type="image/x-icon" href="../favicon.ico" />
                    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                    <link rel="stylesheet" type="text/css" href="../CSS.css">
                </head>
                <body class="w3-light-grey">';
}

function nav_bar(){
    echo '<div class="flex-container">
          <div>
			    <a href="../controller/selectLanguageControllerDisplay.php" class="active">' . gettext('Accueil') . '</a>
			    <a href="../controller/traductionControllerDisplay.php">' . gettext('Traduire') . '</a>
		   </div>
           <div></div>
           <div class="right-corner">
                <ul id="nav" class="nav nav-pills nav-justified">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">';
                if (!isset($_COOKIE['language'])) {
                    echo '<img src="../flag-fr.png" width="15" height="15" alt="fr"/>
                        <span>Français</span>';
                }
                else if ($_COOKIE['language'] == 'fr_FR.UTF-8'){
                    echo '<img src="../flag-fr.png" width="15" height="15" alt="fr"/>
                        <span>Français</span>';
                }
                else {
                    echo '<img src="../flag-uk.png" width="15" height="15" alt="enr"/>
                                <span>English</span>';}
    echo'<span class="caret"></span></a>
                <ul class="dropdown-menu pull-right">
                    <li><a href="../controller/selectLanguageControllerAction.php?lang=fr_FR.UTF-8">
						<img src="../flag-fr.png" width="15" height="15" alt="fr"/>
						<span>Français</span>
					  </a></li>
                    <li class="active-language"><a href="../controller/selectLanguageControllerAction.php?lang=en_US.UTF-8">
						<img src="../flag-uk.png" width="15" height="15" alt="uk"/>
						<span>English</span>
					  </a></li>
                </ul>';
    if(!isset($_SESSION['Statut'])) {
        echo '<a href=\'http://projet-php2018.alwaysdata.net/controller/signUpControllerDisplayForm.php\'>' . gettext('Inscription') . '</a>';
        echo '<a href=\'http://projet-php2018.alwaysdata.net/controller/loginControllerDisplayForm.php\'>' . gettext('Connexion') . '</a></li>';
    }
    else{
        echo '<a href=\'http://projet-php2018.alwaysdata.net/controller/disconectController.php\'>' . gettext('Déconnexion') . '</a>';
    }
    echo'</ul>';
}

function nav_bar_end()
{
    echo '</div>   
    </div>';
}

function end_page()
{
    echo '<br/><br/>';
    echo gettext('© Tous droits réservés 2018 WeTranslate') .  '.<br/>';
    echo gettext('Les images W3C et CC sont issues du site de Mickael Martin-Nevot, enseignant à l\'IUT d\'Aix-Marseille') . '<br/>';
    echo '<br/>';
    echo '<a class="bas" href="http://www.mickael-martin-nevot.com">' . gettext('cliquez ici pour accéder au site de Mickael Martin-Nevot') . '</a>';
    echo '</body> </html>';
}
?>