<?php
/**
 * Created by PhpStorm.
 * User: Axel1
 * Date: 27/12/2017
 * Time: 11:40
 */
session_start();
include ('utilView.php');

start_page(gettext('S\'inscrire'));
nav_bar();
nav_bar_end(); 
?>
<br/>
    <header onload="changecss(nb)">
        <div class="titre">
            <h3><?php echo gettext('Formulaire d\'inscription');?></h3>
        </div>
    </header>

    <br/>

    <form action="../controller/signUpControllerAction.php" method="post">
        <p>
            <label for="name" style="display: inline-block; width: 120px;"><?php echo gettext('Nom');?> : </label>
            <input type="text" name="name" id="name"/>
        </p>

        <p>
            <label for="firstname" style="display: inline-block; width: 120px;"><?php echo gettext('Prénom');?> : </label>
            <input type="text" name="firstname" id="firstname"/>
        </p>

        <p>
            <label for="password" style="display: inline-block; width: 120px;"><?php echo gettext('Mot de passe');?> : </label>
            <input type="password" name="password" id="password"/>
        </p>

        <p>
            <label for="mail" style="display: inline-block; width: 120px;">Email : </label>
            <input type="text" name="mail" id="mail"/>
        </p>

        <p>
            <label for="typeUser" style="display: inline-block; width: 120px;">Type : </label>
            <input type="text" name="typeUser" id="typeUser" value="<?php echo gettext('standard');?>" readonly/>
        </p>

        <br/>

        <p>
            <input type="submit" name="action" value="<?php echo gettext('S\'inscrire')?>"/>
        </p>

        <br/>

        <p class="messageErreur">
            <?php if (isset($message)){echo $message;} ?>
        </p>

    </form>

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