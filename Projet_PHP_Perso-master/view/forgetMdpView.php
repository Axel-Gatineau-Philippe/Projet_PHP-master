<?php
/**
 * Created by PhpStorm.
 * User: f15003938
 * Date: 18/01/18
 * Time: 14:07
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
            <h3><?php echo gettext('Veuillez renseigner votre adresse mail');?></h3>
        </div>
    </header>

    <br/>

    <form method="post" action="../controller/forgetMdpAction.php">
        <label for='mail' style="display: inline-block; width: 120px;"><?php echo gettext("Mail");?></label>
        <input type="text" name="mail" label="mail" id="mail"/>
        <br/>
        <br/>
        <input type='submit' value='<?php echo gettext('Envoyer un mail');?>'/>
    </form>

    <br/>

    <p>
        <?php if(isset ($_GET['message']))
        {
            $message = '';
            if($_GET['message']=='ko') {
                $message = '<b>' . gettext('ATTENTION : tous les champs doivent être saisis !!') . '</b>';
            }

            else if($_GET['message']=='non') {
                $message = '<b>' . gettext('ATTENTION : mail non existant') . '</b>';

            }
            echo $message;
        } ?>
    </p>

<?php end_page();?>