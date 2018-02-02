<?php
session_start();
include ('utilView.php');
start_page(gettext('Mon compte'));
nav_bar();
nav_bar_end();
error_reporting(E_ERROR | E_PARSE);
?>

<h3><?php echo gettext('Mon compte :')?></h3>
<br/>

<form action="../controller/myAccountControllerAction.php" method="post">
    <table>
        <tr>
            <th><?php echo gettext('Champs');?></th>
            <th><?php echo gettext('Actuel');?></th>
            <th><?php echo gettext('Modifier');?></th>
            <th></th>
        </tr>
        <tr>
            <td><?php echo gettext('Identifiant');?></td>
            <td><?php echo $_SESSION['Prenom'];?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo gettext('Email');?></td>
            <td><?php echo $_SESSION['Mail'];?></td>
            <td><input name="email" type="email"/></td>
            <td><input name='action' value="<?php echo gettext('Modifier le mail');?>"  type="submit"/></td>

        </tr>
        <tr>
            <td><?php echo gettext('Mot de passe');?></td>
            <td><?php echo gettext('__Inscrit ton nouveau mot de passe ici ->__')?></td>
            <td><input name="password" type="password"/></td>
            <td><input name='action' value="<?php echo gettext('Modifier le mot de passe');?>" type="submit"/></td>
        </tr>
    </table>
</form>

<table>
    <tr>
        <td><?php echo $_SESSION['message']; ?></td>
    </tr>
</table>

<br/>
<br/>

<?php
if($_SESSION['Statut'] == 'admin')
    echo '<a href="../controller/myRequestControllerDisplay.php">' . gettext('Mes requêtes');
else if($_SESSION['Statut'] == 'traducteur')
    echo '<a href="../controller/myRequestControllerDisplay.php">' . gettext('Mes requêtes');
else if($_SESSION['Statut'] == 'premium')
    echo '<a href="../controller/myRequestControllerDisplay.php">' . gettext('Mes requêtes');
else echo gettext('Vous n\'avez pas accès a vos demandes, vous devez être premium !');
?>

<a href="../controller/traductionControllerDisplay.php"><?php echo gettext('Retour');?></a>

<br/>
<br/>

<a href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fprojet-php2018.alwaysdata.net%2Fcontroller%2FmyAccountControllerDisplay.php#l24c28">
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

