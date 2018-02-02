<?php
/**
 * Created by PhpStorm.
 * User: g16006159
 * Date: 18/01/18
 * Time: 14:00
 */

session_start();
error_reporting(E_ERROR | E_PARSE);

include ('utilView.php');
start_page(gettext('Administration'));
nav_bar();
nav_bar_end();

if(isset($_GET['resultatinsertion'])) {
    if ($_GET['resultatinsertion'] == 'ok') {
        $resultatinsertion = gettext('Nouvelle langue insérée');
    } else {
        $resultatinsertion = gettext('Cette langue existe déjà');
    }
}
?>

<br/>
<header onload="changecss(nb)">
    <div class="titre">
        <h3><?php echo gettext('Bienvenue dans votre espace administrateur !');?></h3>
    </div>
</header>

<br/>

<form method="post" action="../controller/mailControllerAction.php">
    <label for='mail' style="display: inline-block; width: 120px;"><?php echo gettext('Adresse mail de l\'utilisateur');?></label>
    <input type="text" name="mail" label="mail" id="mail"/>
    <br/>
    <br/>
    <input type='submit' name='action' value='<?php echo gettext('Rechercher');?>'/>
</form>

<h3><?php echo gettext('Choisissez le statut que vous voulez attribuer à l\'utilisateur :')?></h3>

<br/>

<form method="post" action="../controller/changeStatutControllerAction.php" >
    <label for='statut' style="display: inline-block; width: 120px;"><?php echo gettext('Nouveau statut de l\'utilisateur : ');?></label>
    <select name ="statut">
        <option><?php echo gettext('standard');?></option>
        <option><?php echo gettext('premium');?></option>
        <option><?php echo gettext('traducteur');?></option>
        <option><?php echo gettext('admin');?></option>
    </select>
    <br/>
    <label for='mail' style="display: inline-block; width: 120px;"><?php echo gettext('Entrez à nouveau le mail de l\'utilisateur pour confirmer :');?></label>
    <input type="text" name="mail" label="mail" id="mail"/>
    <br/>
    <br/>
    <input type='submit' name ="change" value ='<?php echo gettext('Changer le statut');?>'/>
</form>
<br/>
<br/>
<?php
echo $_SESSION['message'];
?>

<br/>
<br/>

<h3><?php echo gettext('Choisissez la langue que vous souhaitez ajouter :')?></h3>
<br/>
<form method="post" action="../controller/changeLanguageControllerAction.php" >
    <label for='statut' style="display: inline-block; width: 120px;"><?php echo gettext('Nouvelle langue : ');?></label>
    <select name ="newLangue">
        <option value="Espagnol"><?php echo gettext('Espagnol');?></option>
        <option value="Allemand"><?php echo gettext('Allemand');?></option>
        <option value="Italien"><?php echo gettext('Italien');?></option>
        <option value="Roumain"><?php echo gettext('Roumain');?></option>
        <option value="Espagnol"><?php echo gettext('Hollandais');?></option>
        <option value="Hollandais"><?php echo gettext('Portuguais');?></option>
    </select>
    <br/>
    <br/>
    <input type='submit' name ="change" value ='<?php echo gettext('Ajouter la langue');?>'/>
</form>

<br/>
<p class="messageErreur"><?php if (isset($resultatinsertion)){echo gettext($resultatinsertion);}?></p>
<br/>
<br/>
<br/>

<a href="../controller/traductionControllerDisplay.php"><?php echo gettext('Retour');?></a>

<?php end_page();?>
