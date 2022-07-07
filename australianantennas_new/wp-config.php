<?php

//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL

# Database Configuration

define( 'DB_NAME', 'australi_livewbesite' );
define( 'DB_USER', 'australi_liveuse' );
define( 'DB_PASSWORD', 'u$E*y*QR7HX(ctubKeQTn?8K-N+&C*OtIpgC' );
define( 'DB_HOST', 'localhost' );
define( 'DB_HOST_SLAVE', 'localhost' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', 'utf8_unicode_ci' );
$table_prefix = 'rhofwwja_';

/* WP Memory Limit */
define('WP_MEMORY_LIMIT', '512M');
define( 'WP_MAX_MEMORY_LIMIT', '512M' );

# Security Salts, Keys, Etc
define( 'AUTH_KEY', '**[&XP|YdwZur,?^bdBaF} R7DsW!E zD6ekI1r5X||2s&c9F4Ifp/$-$h,qL+O0' );
define( 'SECURE_AUTH_KEY', ':50*=X1>jD@BdG}ZsJnw@d<!#zX+a:-S<<x-n(fb7f<x1sVB+(ctS&_H*TzNDRma' );
define( 'LOGGED_IN_KEY', 'u&bpy@0n3QR:&icjG }hwWTLH[QjZR<sLW;ws>S8Ct_Pf|0g9%UCMqHF<#[GGrWf' );
define( 'NONCE_KEY', '_*)%/iUXGbI`e]TUpZ#u{+o|aV2aJ@3~+x;<tq +bPX,;p3=O_&NinGG-,h6[PM~' );
define( 'AUTH_SALT', 'Xnq3)XJyX)S4q0G5TM!$yK~2MJ9f9)-u)A).peKx7 8Fcd%@/eCh"0`n*oi~)8Ss' );
define( 'SECURE_AUTH_SALT', 'CO$ln=mqLrIjZ]~3GaXp5fR<5h"8RD4eO$_6?7r>fOT-T^s|nV5~"IuR0n`sJtsd' );
define( 'LOGGED_IN_SALT', '?mzO(I|- MmU[Osd-WW*Ld^ gmnn_eY+2w!KJC(sW 4Yx/IsbG:YgBFOf`I,[+!3' );
define( 'NONCE_SALT', 'l@}Yp.md`9?+b|l:3S8gJmoN<-N5RP}z8|`d}d6H{^GJ+OQcNf*fcIF6VJ0)%8,Z' );

/*

# Localized Language Stuff


define('WP_AUTO_UPDATE_CORE', 'minor');

define( 'PWP_NAME', 'australianant' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', '857deda664db95e85b81ec23c4f4da704c460a96' );

define( 'WPE_FOOTER_HTML', "" );

define( 'WPE_CLUSTER_ID', '34957' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

// SSLSTART 
if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on';
//SSLEND

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'australianantennas.com.au', 1 => 'australianant.wpengine.com', 2 => 'www.australianantennas.com.au', );

$wpe_varnish_servers=array ( 0 => 'pod-34957', );

$wpe_special_ips=array ( 0 => '119.9.30.75', );

$wpe_ec_servers=array ( );

$wpe_largefs=array ( );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( );

define('WP_SITEURL','https://www.australianantennas.com.au' );

define('WP_HOME','https://www.australianantennas.com.au' );
define( 'WPLANG', '' );



# WP Engine Settings





define( 'WPE_CACHE_TYPE', 'generational' );

define( 'WP_MEMORY_LIMIT', '256M'

*/

// define( 'WP_DEBUG', false );


/*SSLSTART*/
if ( isset( $_SERVER['HTTP_X_WPE_SSL'] ) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on';
/*SSLEND*/



# Custom Settings




# That's It. Pencils down
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', dirname(__FILE__) . '/' );
}
require_once( ABSPATH . 'wp-settings.php' );

