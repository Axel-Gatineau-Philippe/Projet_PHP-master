<?php
    session_start();
    include ('utilView.php');
    start_page(gettext('Demande traduction'));
    nav_bar();
    nav_bar_end();
?>

<h3><?php echo gettext('Demande de Traduction');?></h3>

<form action="../controller/askTradControllerAction.php" method="post">
    <table>
        <tr>
            <th><?php echo gettext('A traduire');?></th>
        </tr>
        <tr>
            <td><input id="atraduire" type="text" name="atraduire" value="" /></td>
        </tr>
        <tr>
            <td> <input type="submit" name="action" value="demande" /></td>
        </tr>
    </table>
</form>

<?php
    echo $_SESSION['message'];
?>
<br/>
<br/>
<br/>
<?php
    echo gettext('Vos demandes sont accessibles depuis [mon compte] / [mes demandes]');
?>
<br/>
<br/>

<a href="../view/traductionView.php"><?php echo gettext('Retour') ?></a>

<br/>
<br/>

<a href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fprojet-php2018.alwaysdata.net%2Fcontroller%2FaskTradControllerDisplay.php#l93c70">
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