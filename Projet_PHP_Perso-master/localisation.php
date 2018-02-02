<?php

if (!defined('PROJECT_DIR')){ define('PROJECT_DIR', realpath('./'));}
if (!defined('LOCALE_DIR')){ define('LOCALE_DIR', PROJECT_DIR .'/locale');}
if (!defined('DEFAULT_LOCALE')){ define('DEFAULT_LOCALE', 'fr_FR.UTF-8');}

//define('PROJECT_DIR', realpath('./'));
//define('LOCALE_DIR', PROJECT_DIR .'/locale');
//define('DEFAULT_LOCALE', 'fr_FR.UTF-8');

require_once('lib/gettext/gettext.inc');

$supported_locales = array('en_US.UTF-8', 'fr_FR.UTF-8');
$encoding = 'UTF-8';

$locale = (isset($_COOKIE['language']))? $_COOKIE['language'] : DEFAULT_LOCALE;

T_setlocale(LC_MESSAGES, $locale);

$domain = 'messages';
bindtextdomain($domain, LOCALE_DIR);

if (function_exists('bind_textdomain_codeset'))
    bind_textdomain_codeset($domain, $encoding);
textdomain($domain);

header("Content-type: text/html; charset=$encoding");
?>
