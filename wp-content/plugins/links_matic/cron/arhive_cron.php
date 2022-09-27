<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-config.php');
nocache_headers();

if (!function_exists('links_matic_init')) {
    return;
}

$p = '8ggD_23_2D0DSF-F';

if ($_GET['p'] != $p) {
    return;
}

// Arhive cron type
$cron_type = 1;
if ($_GET['t']) {
    $cron_type = (int) $_GET['t'];
}

$debug = false;
if ($_GET['debug']) {
    $debug=true;
}

$force = false;
if ($_GET['force']) {
    $force=true;
}

if (!class_exists('LinksMatic')) {
    require_once( LINKS_MATIC_PLUGIN_DIR . 'db/Pdoa.php' );
    require_once( LINKS_MATIC_PLUGIN_DIR . 'db/LinksAbstractFunctions.php' );
    require_once( LINKS_MATIC_PLUGIN_DIR . 'db/LinksAbstractDB.php' );
    
    require_once( LINKS_MATIC_PLUGIN_DIR . 'LinksMatic.php' );
    require_once( LINKS_MATIC_PLUGIN_DIR . 'LinksParserCron.php' );
}

$mpc = new LinksParserCron();
$mpc->run_cron($cron_type, $debug, $force);


