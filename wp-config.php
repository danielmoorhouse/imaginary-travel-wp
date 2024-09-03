<?php
define( 'WP_CACHE', true );
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
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',          'ji^F%}`wR-Q5+TDC(/EJ+ePh1`asRBU?q3UlNm#+_VI+i>5S]+C.XL1XmZ>sp< g' );
define( 'SECURE_AUTH_KEY',   'f}(|2X$.?K~`91JR%)jrC74u`&pU;MNDUGu=cf!&[4^<I,_)%^xcK4BPz{MQ}_3^' );
define( 'LOGGED_IN_KEY',     'q_bEDp}F(&cLu&`Ex#7.zW)B}kK9&LgGQ0re^5b;IXZBgQY qH3w%21 %:dL;N!j' );
define( 'NONCE_KEY',         'Mr[TW<Q`PH)w+{M&^s)G<4JlSAo2Pn^w`FV~vAj}>V.91,1Hb)|DNO{NDdT|RhDQ' );
define( 'AUTH_SALT',         ';=dnnnRR#)/O=ku{}Q.@h-3r<G}Yh]rd,,5:6GjRKPPh%b:uazhZoxcH= 61oVa|' );
define( 'SECURE_AUTH_SALT',  '{a48N/.A$d$-@4(u~j9<(v= #iwx_GJpwm.taAPb`%nd)*Ip#>i#r=UPl%IXk6Lm' );
define( 'LOGGED_IN_SALT',    '.T-Qlwz~t6eJn1<NCho_s/7}F11(W;kU$ptVbQy}%_F3qlNC(|SXj]CqD!Kn8cHR' );
define( 'NONCE_SALT',        'vm(5-hDqQ;N1f,5LfL}(/NEFNTsU69e~C46_`}0l_b=SW%>Yf(*(/E[Ejh;$!.|?' );
define( 'WP_CACHE_KEY_SALT', ',U(x]+:x0(I=q%J-Z|bBgp_}#[wVR&|u@5K$pc-aK:!^k]I.KJ<4X8k#I+x(IH#~' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', true );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
