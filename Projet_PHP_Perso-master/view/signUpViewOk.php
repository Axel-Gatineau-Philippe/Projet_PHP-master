<?php
session_start();
include('utilView.php');

$language = $_COOKIE['language'];
setlocale(LC_MESSAGES, $language);
$domain = 'messages';
bindtextdomain($domain, "../locale");
textdomain($domain);
start_page('Validation');
?>

<div>
    <p>
        <b><?php echo gettext('Un mail contenant le lien d\'activation de votre compte vient de vous être envoyé.');?></b>
    </p>
    <a href=../index.php><?php echo gettext('Retour à l\'accueil');?></a>
</div>

<br/>
<br/>

<a href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fprojet-php2018.alwaysdata.net%2Fcontroller%2FsignUpControllerDisplayForm.php">
    <img src="http://www.mickael-martin-nevot.com/img/valid-html5.png" alt="Valid XHTML5"/>
</a>

<br/>

<a href="https://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fprojet-php2018.alwaysdata.net%2FmonCss.html&profile=css3svg&usermedium=all&warning=1&vextwarning=&lang=fr">
    <img src="http://www.mickael-martin-nevot.com/img/valid-css3.png" alt="Valid CSS3"/>
</a>

<br/>

<a class="btn btn2 blankLink" href="https://creativecommons.org/licenses/by-nc-sa/3.0/">
    <img src="http://www.mickael-martin-nevot.com/img/cc-by-nc-sa.png" alt="Creative Commons Attribution-NonCommercial-ShareAlike"/>
</a>

<?php end_page();?>