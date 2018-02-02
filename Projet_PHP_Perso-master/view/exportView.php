<?php
/**
 * Created by PhpStorm.
 * User: Axel1
 * Date: 27/12/2017
 * Time: 11:40
 */
session_start();
include ('utilView.php');

start_page(gettext('Exportation'));
nav_bar();
nav_bar_end();
?>
    <br/>
    <header onload="changecss(nb)">
        <div class="titre">
            <h3><?php echo gettext('Sélectionnez une langue depuis laquelle exporter un fichier de traduction');?></h3>
        </div>
    </header>

    <br/>

    <form method="post" action="../controller/exportControllerAction.php">
        <input type='submit' name="action" value='<?php echo gettext('Exporter le fichier');?>'/>
        <br/>
        <br/>
        <?php include('../controller/generateListLanguageController.php');?>
    </form>

    <br/>
    <br/>

    <a href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fprojet-php2018.alwaysdata.net%2Fcontroller%2FexportControllerDisplay.php#l93c70">
        <img src="http://www.mickael-martin-nevot.com/img/valid-html5.png" alt="Valid XHTML5"/>
    </a>

    <br/>

    <a href="https://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fprojet-php2018.alwaysdata.net%2FmonCss.html&profile=css3svg&usermedium=all&warning=1&vextwarning=&lang=fr">
        <img src="http://www.mickael-martin-nevot.com/img/valid-css3.png" alt="Valid CSS3"/>
    </a>

    <a class="btn btn2 blankLink" href="https://creativecommons.org/licenses/by-nc-sa/3.0/">
        <img src="http://www.mickael-martin-nevot.com/img/cc-by-nc-sa.png" alt="Creative Commons Attribution-NonCommercial-ShareAlike"/>
    </a>

<?php end_page();?>