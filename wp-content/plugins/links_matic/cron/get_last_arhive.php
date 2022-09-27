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


if (!class_exists('LinksMatic')) {
    require_once( LINKS_MATIC_PLUGIN_DIR . 'db/Pdoa.php' );
    require_once( LINKS_MATIC_PLUGIN_DIR . 'db/LinksAbstractFunctions.php' );
    require_once( LINKS_MATIC_PLUGIN_DIR . 'db/LinksAbstractDB.php' );

    require_once( LINKS_MATIC_PLUGIN_DIR . 'LinksMatic.php' );
    require_once( LINKS_MATIC_PLUGIN_DIR . 'LinksParserCron.php' );
}

$ml = new LinksMatic();
// get parser
$mp = $ml->get_mp();

$company_id = 12;
$start = 0;
$count = 100;

$arhives = $mp->get_last_arhives($company_id, $start, $count);


if ($arhives) {
    foreach ($arhives as $item) {

        $file = $mp->get_arhive_file($company_id, $item->arhive_hash);
        print_r($item);
        print_r($file);
    }
}
