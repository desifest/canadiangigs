<?php

/*
  Plugin Name: Links matic
  Plugin URI: https://emelianovip.ru/
  Description: This plugin parsing data from other sites and manages them.
  Author: Brahman  <fb@emelianovip.ru>
  Author URI: https://emelianovip.ru
  Version: 1.0.2
  License: GPLv2
 * 
 * Parser fields:
 * job name
 * job category
 * job type
 * location
 * 
 * date posted
 * expire date
 * 
 * description
 * 
 * company logo
 * company name
 * app email/url
 * 
 * TODO links: 
 * add default category
 * add weight rules (exist/match)
 * show rules result
 * add jobs from reslults
 * 
 */



define('LINKS_MATIC_PLUGIN_DIR', ABSPATH . 'wp-content/plugins/links_matic/');
define('LINKS_MATIC_PLUGIN_URL', plugin_dir_url(__FILE__));

$version = '1.0.2';
if (defined('LASTVERSION')) {
    define('LINKS_MATIC_VERSION', $version . LASTVERSION);
} else {
    define('LINKS_MATIC_VERSION', $version);
}


function include_links_matic() {

    if (!class_exists('LinksMatic')) {
        require_once( LINKS_MATIC_PLUGIN_DIR . 'db/Pdoa.php' );
        require_once( LINKS_MATIC_PLUGIN_DIR . 'db/LinksAbstractFunctions.php' );
        require_once( LINKS_MATIC_PLUGIN_DIR . 'db/LinksAbstractDB.php' );
        require_once( LINKS_MATIC_PLUGIN_DIR . 'LinksMatic.php' );
    }
}

// WP Logic

if (!function_exists('add_action')) {
    return;
}

add_action('init', 'links_matic_init');

function links_matic_init() {
    if (is_admin()) {

        include_links_matic();

        require_once( LINKS_MATIC_PLUGIN_DIR . 'LinksMaticAdmin.php' );
        require_once( LINKS_MATIC_PLUGIN_DIR . '/admin/ItemAdmin.php' );

        $mla = new LinksMaticAdmin();

        // Force activation
        if (isset($_GET['ml_activation']) && $_GET['ml_activation'] == 1) {
            links_matic_plugin_activation();
        }
    }
}

/**
 * Install table structure
 */
register_activation_hook(__FILE__, 'links_matic_plugin_activation');

function links_matic_plugin_activation() {

    include_links_matic();

    //Critic parser
    $sql = "CREATE TABLE IF NOT EXISTS  `links_matic_campaign`(
				`id` int(11) unsigned NOT NULL auto_increment,                                				
                                `date` int(11) NOT NULL DEFAULT '0',
                                `status` int(11) NOT NULL DEFAULT '1',                                                   		
                                `title` varchar(255) NOT NULL default '',                                                                
                                `site` text default NULL,                                
                                `options` longtext default NULL,
				PRIMARY KEY  (`id`)				
				) DEFAULT COLLATE utf8mb4_general_ci;";
    Pdo_wp::db_query($sql);

    $sql = "ALTER TABLE `links_matic_campaign` ADD `type` int(11) NOT NULL DEFAULT '0'";
    Pdo_wp::db_query($sql);

    links_matic_create_index(array('date', 'status', 'type'), 'links_matic_campaign');

    //Critic parser log
    $sql = "CREATE TABLE IF NOT EXISTS  `links_matic_log`(
				`id` int(11) unsigned NOT NULL auto_increment,				
                                `date` int(11) NOT NULL DEFAULT '0',
                                `cid` int(11) NOT NULL DEFAULT '0',
                                `uid` int(11) NOT NULL DEFAULT '0',
                                `type` int(11) NOT NULL DEFAULT '0',
                                `status` int(11) NOT NULL DEFAULT '0',
				`message` varchar(255) NOT NULL default '',				
				PRIMARY KEY  (`id`)				
				) DEFAULT COLLATE utf8mb4_general_ci;";
    Pdo_wp::db_query($sql);
    links_matic_create_index(array('date', 'cid', 'uid', 'type', 'status'), 'links_matic_log');
    /*
     * cid - campaign id
     * pid - post id
     * 
     */
    $sql = "CREATE TABLE IF NOT EXISTS  `links_matic_url`(
				`id` int(11) unsigned NOT NULL auto_increment,
                                `cid` int(11) NOT NULL DEFAULT '0',   
                                `pid` int(11) NOT NULL DEFAULT '0',
                                `status` int(11) NOT NULL DEFAULT '0',
                                `link_hash` varchar(255) NOT NULL default '',                                
                                `link` text default NULL,               
				PRIMARY KEY  (`id`)				
				) DEFAULT COLLATE utf8mb4_general_ci;";
    Pdo_wp::db_query($sql);
    links_matic_create_index(array('cid', 'pid', 'status', 'link_hash'), 'links_matic_url');

    /*
     * uid - url id
     * arhive_hash - arhive hash filename
     */
    $sql = "CREATE TABLE IF NOT EXISTS  `links_matic_arhive`(
				`id` int(11) unsigned NOT NULL auto_increment,
                                `date` int(11) NOT NULL DEFAULT '0',                                    
                                `uid` int(11) NOT NULL DEFAULT '0',                                  
                                `arhive_hash` varchar(255) NOT NULL default '',                                                                
				PRIMARY KEY  (`id`)				
				) DEFAULT COLLATE utf8mb4_general_ci;";
    Pdo_wp::db_query($sql);
    links_matic_create_index(array('date', 'uid', 'arhive_hash'), 'links_matic_arhive');


    /*
     * uid - url id
     * status:
     * 0 - error parse arhive
     * 1 - done
     * options: json array.
     */
    $sql = "CREATE TABLE IF NOT EXISTS  `links_matic_posts`(
				`id` int(11) unsigned NOT NULL auto_increment,
                                `date` int(11) NOT NULL DEFAULT '0',                                    
                                `last_upd` int(11) NOT NULL DEFAULT '0',     
                                `uid` int(11) NOT NULL DEFAULT '0',                                                                  
                                `top_movie` int(11) NOT NULL DEFAULT '0', 
                                `rating` int(11) NOT NULL DEFAULT '0', 
                                `status` int(11) NOT NULL DEFAULT '0',                                                                  
                                `title` varchar(255) NOT NULL default '',   
                                `rel` varchar(255) NOT NULL default '',   
                                `year` int(11) NOT NULL DEFAULT '0',                                                                  
                                `options` text default NULL,           		                                                                
				PRIMARY KEY  (`id`)				
				) DEFAULT COLLATE utf8mb4_general_ci;";
    Pdo_wp::db_query($sql);
    links_matic_create_index(array('date', 'last_upd', 'uid', 'status', 'top_movie', 'rating', 'title', 'rel', 'year'), 'links_matic_posts');

    $sql = "ALTER TABLE `links_matic_posts` ADD `status_links` int(11) NOT NULL DEFAULT '0'";
    Pdo_wp::db_query($sql);
    links_matic_create_index(array('status_links'), 'links_matic_posts');



    /*
     * Tor
     */
    $sql = "CREATE TABLE IF NOT EXISTS  `tor_drivers`(
				`id` int(11) unsigned NOT NULL auto_increment,                                                                                               
                                `last_upd` int(11) NOT NULL DEFAULT '0',
                                `last_reboot` int(11) NOT NULL DEFAULT '0',
                                `status` int(11) NOT NULL DEFAULT '0',
                                `ip` int(11) NOT NULL DEFAULT '0',
                                `agent` int(11) NOT NULL DEFAULT '0',
                                `name` varchar(255) NOT NULL default '',
                                `url` varchar(255) NOT NULL default '',                                
				PRIMARY KEY  (`id`)				
				) DEFAULT COLLATE utf8mb4_general_ci;";
    Pdo_wp::db_query($sql);
    links_matic_create_index(array('last_upd', 'status', 'ip', 'agent'), 'tor_drivers');

    $sql = "ALTER TABLE `tor_drivers` ADD `type` int(11) NOT NULL DEFAULT '0'";
    Pdo_wp::db_query($sql);

    links_matic_create_index(array('type'), 'tor_drivers');


    $sql = "CREATE TABLE IF NOT EXISTS  `tor_ip`(
				`id` int(11) unsigned NOT NULL auto_increment,                                                               
                                `ip` varchar(255) NOT NULL default '',
				PRIMARY KEY  (`id`)				
				) DEFAULT COLLATE utf8mb4_general_ci;";
    Pdo_wp::db_query($sql);

    $sql = "CREATE TABLE IF NOT EXISTS  `tor_dst_url`(
				`id` int(11) unsigned NOT NULL auto_increment,                                                               
                                `url` varchar(255) NOT NULL default '',
				PRIMARY KEY  (`id`)				
				) DEFAULT COLLATE utf8mb4_general_ci;";
    Pdo_wp::db_query($sql);
    links_matic_create_index(array('url'), 'tor_dst_url');

    $sql = "CREATE TABLE IF NOT EXISTS  `tor_user_agents`(
				`id` int(11) unsigned NOT NULL auto_increment,                                                               
                                `user_agent` varchar(255) NOT NULL default '',
				PRIMARY KEY  (`id`)				
				) DEFAULT COLLATE utf8mb4_general_ci;";
    Pdo_wp::db_query($sql);
    links_matic_create_index(array('user_agent'), 'tor_user_agents');

    $sql = "CREATE TABLE IF NOT EXISTS  `tor_ip_meta`(
				`id` int(11) unsigned NOT NULL auto_increment,                                                                                               
                                `ip` int(11) NOT NULL DEFAULT '0',
                                `agent` int(11) NOT NULL DEFAULT '0',
                                `date` int(11) NOT NULL DEFAULT '0',
				PRIMARY KEY  (`id`)				
				) DEFAULT COLLATE utf8mb4_general_ci;";
    Pdo_wp::db_query($sql);
    links_matic_create_index(array('ip', 'agent', 'date'), 'tor_ip_meta');

    // Tor log
    $sql = "CREATE TABLE IF NOT EXISTS  `tor_log`(
				`id` int(11) unsigned NOT NULL auto_increment,				
                                `date` int(11) NOT NULL DEFAULT '0',
                                `driver` int(11) NOT NULL DEFAULT '0',
                                `ip` int(11) NOT NULL DEFAULT '0',
                                `agent` int(11) NOT NULL DEFAULT '0',                                
                                `url` int(11) NOT NULL DEFAULT '0',                                
                                `type` int(11) NOT NULL DEFAULT '0',
                                `status` int(11) NOT NULL DEFAULT '0',                                
				`message` varchar(255) NOT NULL default '',				
                                `dst_url` text default NULL,   			
				PRIMARY KEY  (`id`)				
				) DEFAULT COLLATE utf8mb4_general_ci;";
    Pdo_wp::db_query($sql);
    links_matic_create_index(array('date', 'driver', 'url', 'ip', 'agent', 'type', 'status'), 'tor_log');
    
    /*
     * Company
     */
    $sql = "CREATE TABLE IF NOT EXISTS  `links_matic_company`(
				`id` int(11) unsigned NOT NULL auto_increment,
                                `attachment_id` int(11) NOT NULL DEFAULT '0',
                                `title` varchar(255) NOT NULL default '',
                                `link_hash` varchar(255) NOT NULL default '',                                
                                `link` text default NULL,               
				PRIMARY KEY  (`id`)				
				) DEFAULT COLLATE utf8mb4_general_ci;";
    Pdo_wp::db_query($sql);
    links_matic_create_index(array('attachment_id', 'link_hash'), 'links_matic_company');
}

function links_matic_create_index($names = array(), $table_name = '') {

    if ($names && $table_name) {
        foreach ($names as $name) {
            $index_sql = "SELECT COUNT(*)        
    FROM `INFORMATION_SCHEMA`.`STATISTICS`
    WHERE `TABLE_SCHEMA` = '" . DB_NAME . "' 
    AND `TABLE_NAME` = '$table_name'
    AND `INDEX_NAME` = '$name'";
            $exists = Pdo_wp::db_get_var($index_sql);

            if (!$exists) {
                $sql = "ALTER TABLE `$table_name` ADD INDEX(`$name`)";
                Pdo_wp::db_query($sql);
            }
        }
    }
}
