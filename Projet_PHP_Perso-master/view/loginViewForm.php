<?php
/**
 * Created by PhpStorm.
 * User: Axel1
 * Date: 27/12/2017
 * Time: 11:40
 */
session_start();
include ('utilView.php');

start_page(gettext('Authentification'));
nav_bar();
nav_bar_end();
?>
<br/>
<header onload="changecss(nb)">
    <div class="titre">
        <h3><?php echo gettext('Connectez-vous pour vous authentifier');?></h3>
    </div>
</header>

<br/>

<form method="post" action="../controller/testPassControllerAction.php">
    <label for='mail' style="display: inline-block; width: 120px;"><?php echo gettext("Nom d'utilisateur");?></label>
    <input type="text" name="mail"  id="mail"/>
    <br/>
    <br/>
    <label for='mdp' style="display: inline-block; width: 120px;"><?php echo gettext("Mot de passe");?></label>
    <input type="password" name="mdp" id="mdp"/>
    <br/>
    <br/>
    <input type='submit' value='<?php echo gettext("Se connecter");?>'/>
    <input type="button" value='<?php echo gettext('Mot de passe oublié ?');?>' onclick="window.location.href='../controller/forgetMdpDisplay.php'"/>
</form>

<br/>

<p class="messageErreur">
    <?php if (isset($message)){echo $message;} ?>
</p>

<a href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fprojet-php2018.alwaysdata.net%2Fcontroller%2FloginControllerDisplayForm.php">
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