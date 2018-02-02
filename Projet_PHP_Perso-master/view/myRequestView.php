<?php
session_start();
include ('utilView.php');
start_page(gettext('Mes demandes'));
nav_bar();
nav_bar_end();
error_reporting(E_ERROR | E_PARSE);
?>

<h3><?php echo gettext('Mesrequêtes :')?></h3>
<br>
<form action="../controller/myRequestControllerAction.php" method="post">
    <table>
        <tr>
            <td><input name='action' value="<?php echo gettext('Actualiser');?>" type="submit"/></td>
        </tr>
    </table>
</form>
<br>
<?php
        $cpt=0;
if($_SESSION['demandes'][$cpt]['Valeur'] != null){
    while ($_SESSION['demandes'][$cpt]['Valeur'] != null){

        $valeur = $_SESSION['demandes'][$cpt]['Valeur'];
        $etat = $_SESSION['demandes'][$cpt]['Etat'];
        $date = $_SESSION['demandes'][$cpt]['Date'];
        echo $valeur. " - " .  $etat . " - " . $date . '<br>';
        $cpt= $cpt+1;
    }
}
?>
<?php
    echo '<br/>'. gettext('La demande peut être : [En cours] = En attente d\'un traducteur ou bien [Terminée] = Votre demande à été traitée') .'<br/>';
?>
<br/>
<br/>
<a href="../controller/traductionControllerDisplay.php"><?php echo gettext('Retour') ?></a>
<br/>
<br/>
<a href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fprojet-php2018.alwaysdata.net%2Fcontroller%2FmyRequestControllerDisplay.php#l93c70">
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

