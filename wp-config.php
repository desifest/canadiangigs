<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db98g0xvkgovbg' );

/** Database username */
define( 'DB_USER', 'uxvz9a62do8zm' );

/** Database password */
define( 'DB_PASSWORD', '6vzdq6hqos5n' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'LpRO!K.SFt/J;5/P|:@kp!J#*0QM{Nk`HG{WSJ21+S0ol9|~69-9(d5:X.JQE{OY' );
define( 'SECURE_AUTH_KEY',   'a8z*$d-7-2*Sgo}+eO5d9hcX{9-F55n<`GZA5:a*QVS4$LlG2<W[$a)$[H}$v+so' );
define( 'LOGGED_IN_KEY',     '{X8p4yPz=<Xe<phNvhlEmj39Y#HCs$()-|?AY@tBLgUv&H)eSM0hQ)AV54Ng(M]7' );
define( 'NONCE_KEY',         '(ZV:mJKtgkzsW%d;H?66cZl*U%U@yAuI_{bbYG8J_*MOf4M`XecmN2Zg>Ir5yvZ&' );
define( 'AUTH_SALT',         's3Z>.xWH1s5gYiT|8OvF<} =C}%9{JJ~c.l@.B:Q6e|i-aP@@GiJc9%[kJ5XKC!?' );
define( 'SECURE_AUTH_SALT',  'DAjG$AtPz7a-rH8s3>if9iS?ECx}|t_o4U984Huz!(sFGn`YKSf8w0D;*E(3iDge' );
define( 'LOGGED_IN_SALT',    'GA`4,*+s%tY%op3i-Uh3$#Ss%[Mlg8|Cr~-|o%u*by-p~P3za8rDFYb3RIHnNZG$' );
define( 'NONCE_SALT',        '.5Cv];DE`Wx8i]P&2+hEDud%.wpxbH6+;mMu7}6KS}^;LVX5Qvm](2FIqK )a5t[' );
define( 'WP_CACHE_KEY_SALT', 'HRsFF}tKwR/}am3.ucK@x~/esKKpfuMXF[/}VKoDI`2Pjp2likyBm<NS85@tW:$m' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'buf_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
@include_once('/var/lib/sec/wp-settings-pre.php'); // Added by SiteGround WordPress management system
require_once ABSPATH . 'wp-settings.php';
@include_once('/var/lib/sec/wp-settings.php'); // Added by SiteGround WordPress management system
