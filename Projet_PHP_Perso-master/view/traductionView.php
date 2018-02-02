<?php
session_start();
include ('utilView.php');
start_page(gettext('Traducteur'));
nav_bar();
nav_bar_end();
$_SESSION['message'] = '_';
$_SESSION['demandesall']='';
?>

<?php
    $message = '';
    if(isset($_GET['reponse'])){
        if($_GET['reponse']=='bloque'){
            $message = "Une recherche toutes les 10 mn !!";
        } else if($_GET['reponse']=='vide'){
            $message = "Saisir une expression";
        } else if($_GET['reponse']=='nofind'){
            $message = "Non trouvé !";
        } else {
            $message = $_GET['reponse'];
            $clef = $_GET['cle'];
        }
    }
?>

<h3><?php echo gettext('Traducteur en ligne :')?></h3>
<br>
<form action="../controller/traductControllerAction.php" method="post">
    <table class="tabtrad">
        <tr>
            <th> <?php echo gettext('Choix de la langue');?></th>
            <th> <?php echo gettext('Saisissez l\'expression à traduire');?></th>
            <th> <?php echo gettext('Traduction')?></th>
        </tr>
        <tr>
            <td>
                <?php include('../controller/generateListLanguageController.php');?>
            </td>
            <td></td>
            <td><input type="text" size="40" name="atraduireBis" value="<?php if(!empty($clef)){echo $clef;}?>"/></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="text" size="40" name="atraduire"/></td>
            <td><input id="traduction" type="text" size="40" name="traduction" value="<?php if(isset($_GET['reponse'])){echo gettext($message);}?>"/></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><input type="submit" name="action" value=<?php echo gettext('Traduire');?>></td>
        </tr>
    </table>
</form>

<?php
    if(isset($_SESSION['Statut']) && $_SESSION['Statut'] == 'premium'){
        include('../controller/bestQueryForPremiumController.php');
    }
?>

<?php
    if(isset($_SESSION['Statut']) && $_SESSION['Statut'] == 'admin') {
        echo gettext('Votre mot n\'est pas encore traduit ? Demandez ici ! ->') . '<a href="../controller/askTradControllerDisplay.php">' . gettext('Demande') . '</a>' . '<br><br>' .
            gettext('Votre rang actuel : ') . '<b>' . $_SESSION['Statut'] . '</b>' . PHP_EOL .
            '<a href="../controller/changeStatutControllerDisplay.php">' . gettext('Administrateur') .
            '</a> <a href="../controller/myAccountControllerDisplay.php">' . gettext('Mon compte') . '</a>';
    }
    else if (isset($_SESSION['Statut']) && $_SESSION['Statut'] == 'traducteur'){
            echo gettext('Votre mot n\'est pas encore traduit ? Demandez ici ! ->') . '<a href="../controller/askTradControllerDisplay.php">' . gettext('Demande') . '</a>' . '<br><br>' .
                gettext('Votre rang actuel : ') . '<b>' . $_SESSION['Statut'] . '</b>' . PHP_EOL .
                '<a href="../controller/addTraductionControllerDisplay.php">' . gettext('Traducteur') .
                '</a> <a href="../controller/myAccountControllerDisplay.php">' . gettext('Mon compte') .
                '</a> <a href="../controller/exportControllerDisplay.php">' . gettext('Exporter') . '</a>';
    }
    else if(isset($_SESSION['Statut']) && $_SESSION['Statut'] == 'standard') {
        echo gettext('Votre rang actuel : ') . '<b>' . $_SESSION['Statut'] . '</b>' . PHP_EOL .
            '<a href="../controller/myAccountControllerDisplay.php">' . gettext('Mon compte') . '</a>';
    }
    else if(isset($_SESSION['Statut']) && $_SESSION['Statut'] == 'premium') {
        echo gettext('Votre mot n\'est pas encore traduit ? Demandez ici ! ->') . '<a href="../controller/askTradControllerDisplay.php">' . gettext('Demande') . '</a>' . '<br><br>' .
            gettext('Votre rang actuel : ') . '<b>' . $_SESSION['Statut'] . '</b>' . PHP_EOL .
            '<a href="../view/../controller/myAccountControllerDisplay.php">' . gettext('Mon compte') . '</a>';
    }
    else echo gettext('Vous n\'êtes pas connecté');
?>

<br/>
<br/>

<a href="../index.php"> <?php echo gettext('Retour')?> </a>

<br/>
<br/>

<a href="https://validator.w3.org/nu/?showsource=yes&doc=http%3A%2F%2Fprojet-php2018.alwaysdata.net%2Fcontroller%2FtraductionControllerDisplay.php">
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

