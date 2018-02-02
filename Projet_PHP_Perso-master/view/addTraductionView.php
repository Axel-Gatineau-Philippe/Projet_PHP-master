<?php
session_start();
include ('utilView.php');
include('../model/utilDb.php');
start_page(gettext('Traducteur'));
nav_bar();
nav_bar_end();
?>

<br/>
<h3><?php echo gettext('Voici la liste des traductions en attente :')?></h3>
<br/>
    <form action="../controller/addTraductionControllerAction.php" method="post">
        <table>
            <tr>
                <td><input name='action' value="<?php echo gettext('Actualiser');?>" type="submit"/></td>
            </tr>
        </table>
    </form>
<br/>
<?php

if ($_SESSION['demandesall'] != ''){
    $resultat = $_SESSION['demandesall'];
    foreach($resultat as $demandetrad){
        $NumeroDemande = $demandetrad->NumeroDemande;
        $Valeur= $demandetrad->Valeur;
        $Etat = $demandetrad->Etat;
        $NumeroUtilisateur = $demandetrad->NumeroUtilisateur;
        echo $NumeroDemande . " - " . $Valeur . " - " . $Etat . " - " . $NumeroUtilisateur . '<br>';
    }}

?>
<br/>
<h3><?php echo gettext('Effectuer une traduction demandée :')?></h3>
<br/>

<form method="post" class="trad" action="../controller/addInsertTraductionController.php">
    <label for='Clef' style="display: inline-block; width: 120px;"><?php echo gettext("Expression");?></label>
    <input type="text" name="Clef" id="Clef"/>
    <br/>
    <label style="display: inline-block; width: 120px;"><?php echo gettext("Langue");?></label>
    <?php
    $toutesLesLangues = Language::getAllLanguages();
    echo '<select name ="idLang">' . PHP_EOL;
    foreach($toutesLesLangues as $uneLangue){
        echo '<option value="' . $uneLangue->idLangue . '">' . gettext($uneLangue->nomLangue) . '</option>' . PHP_EOL;
    }
    echo '</select>';
    ?>
    <br/>
    <label for='traduction' style="display: inline-block; width: 120px;"><?php echo gettext("Traduction");?></label>
    <input type="text" name="traduction" id="traduction"/>
    <br/>
    <label for='Date' style="display: inline-block; width: 120px;"><?php echo gettext("Date");?></label>
    <input type="text" name="Date" id="Date" value="<?php echo date("Y-m-d");?>" readonly/>
    <br/>
    <label for='NumeroDemande' style="display: inline-block; width: 120px;"><?php echo gettext("Numéro demande");?></label>
    <input type="text" name="NumeroDemande" id="NumeroDemande"/>
    <br/>
    <input type='submit' value='<?php echo gettext("Insérer traduction");?>'/>
</form>

<br/>

<h3><?php echo gettext('Entrez la traduction que vous souhaitez modifier :')?></h3>

<br/>

<form method="post" class="trad" action="../controller/updateTradControllerAction.php">
    <label for='numtrad' style="display: inline-block; width: 120px;"><?php echo gettext('Numéro de traduction');?></label>
    <input type="text" name="numtrad" id="numtrad"/>
    <br/>
    <label for='oldTrad' style="display: inline-block; width: 120px;"><?php echo gettext('Ancienne traduction');?></label>
    <input type="text" name="oldTrad" id="oldTrad"/>
    <br/>
    <label for='newTrad' style="display: inline-block; width: 120px;"><?php echo gettext('Nouvelle traduction');?></label>
    <input type="text" name="newTrad" id="newTrad"/>
    <br/>
    <input type='submit' name='action' value='<?php echo gettext('Modifier');?>'/>
</form>

<?php
echo $_SESSION['message'];
?>
<br/>

<a href="../controller/traductionControllerDisplay.php"><?php echo gettext('Retour')?></a>

<br/>
<br/>

<a href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fprojet-php2018.alwaysdata.net%2Fcontroller%2FaddTraductionControllerDisplay.php#l93c70">
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