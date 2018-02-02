<?php session_start()?>
<?php include ('utilView.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo gettext('Activation');?></title>
</head>
<body>
    <p>
        <b><?php echo gettext($_SESSION['result'])?></b>
    </p>
    <a href=../index.php><?php echo gettext('Retour à l\'accueil');?></a>
<br/>
<br/>
<a href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fprojet-php2018.alwaysdata.net%2Findex.php">
    <img src="http://www.mickael-martin-nevot.com/img/valid-html5.png" alt="Valid XHTML5"/>
</a>
<br/>
<a class="btn btn2 blankLink" href="https://creativecommons.org/licenses/by-nc-sa/3.0/">
    <img src="http://www.mickael-martin-nevot.com/img/cc-by-nc-sa.png" alt="Creative Commons Attribution-NonCommercial-ShareAlike"/>
</a>

<?php end_page();?>