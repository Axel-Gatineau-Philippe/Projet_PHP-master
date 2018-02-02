<?php
/**
 * Created by PhpStorm.
 * User: Axel1
 * Date: 27/12/2017
 * Time: 11:40
 */
session_start();

//ini_set('error_reporting', E_ALL ^ E_NOTICE);
//error_reporting(E_ALL ^ E_DEPRECATED);
//ini_set('error_reporting', E_ALL ^ E_NOTICE);

include ('view/utilView.php');
include ('localisation.php');

start_page(gettext('Accueil'));

if(! isset($_COOKIE['language']))
{
    setcookie('language', DEFAULT_LOCALE, time() + 365*24*3600, null, null, false, true);
}

nav_bar();
nav_bar_end();

?>

<br>
<h3><?php echo gettext('Bienvenue sur le site de traduction de l\'équipe 2 du groupe 2')?></h3>
<h1>We Translate</h1>
<h5><?php echo gettext('Notre site propose une liste de traductions accessible à tous ainsi que des services plus élaborés pour des utilisateurs particuliers.')?></h5>
<h6><?php echo gettext('Lors de votre inscription, vous serez alors utilisateur standard, ce qui vous donne un accès illimité à toutes les traductions!')?></h6>
<h6><?php echo gettext('Pour récompenser votre fidélité à notre site, les administrateurs peuvent alors vous passer en utilisateur premium, ce qui vous offre, en plus des avantages de l\'utilisateur standard, une recherche améliorée des traductions, ainsi que la possibilité de faire une demande de traduction si le mot souhaité n\'a jamais été traduit.')?></h6>
<h6><?php echo gettext('Les traducteurs, quant à eux, possèdent en plus des autres utilisateurs une interface de traduction. Cette interface leur permet de gérer les demandes des utilisateurs premium, de modifier et de récupérer les fichiers de traduction.')?></h6>
<h5><?php echo gettext('Inscrivez-vous dès maintenant pour avoir accès à ces précieuses traductions.');?></h5>

<br/>
<br/>

<a href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fprojet-php2018.alwaysdata.net%2Findex.php">
    <img src="http://www.mickael-martin-nevot.com/img/valid-html5.png" alt="Valid XHTML5"/>
</a>

<br/>

<a href="https://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fprojet-php2018.alwaysdata.net%2FmonCss.html&profile=css3svg&usermedium=all&warning=1&vextwarning=&lang=fr">
    <img src="http://www.mickael-martin-nevot.com/img/valid-css3.png" alt="Valid CSS3"/>
</a>

<a class="btn btn2 blankLink" href="https://creativecommons.org/licenses/by-nc-sa/3.0/">
    <img src="http://www.mickael-martin-nevot.com/img/cc-by-nc-sa.png" alt="Creative Commons Attribution-NonCommercial-ShareAlike"/>
</a>

<?php
echo end_page();
?>

