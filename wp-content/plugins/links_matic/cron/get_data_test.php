<?php

if (!defined('ABSPATH'))
    define('ABSPATH', $_SERVER['DOCUMENT_ROOT'] . '/');

$mid = (int) $_GET['mid'];
$cid = (int) $_GET['cid'];

if (!$mid || !$cid) {
    return;
}

//Movies links rating
if (!function_exists('include_links_matic')) {
    include ABSPATH . 'wp-content/plugins/links_matic/links_matic.php';
}

include_links_matic();

$ml = new LinksMatic();

$post = $ml->get_post_data($mid, $cid);
print '<pre>';
print_r($post);
print '</pre>';

if ($post) {
    $mp = $ml->get_mp();
    $arhive = $mp->get_arhive_by_url_id($post->uid);

    if ($arhive) {
        $content = $mp->get_arhive_file($cid, $arhive->arhive_hash);
        print "Arhive len: " . strlen($content);
    }
}