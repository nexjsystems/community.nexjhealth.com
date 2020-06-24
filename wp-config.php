<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'communityhealthsite');

/** MySQL database username */
define('DB_USER', 'communityuser');

/** MySQL database password */
define('DB_PASSWORD', 'Community@dbUser');

/** MySQL hostname */
define('DB_HOST', 'sv-hmariadb01.nexjsystems.local');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'sA9EmkDZ r:^9j[(+B:[`xEGl@2 WWs!-|RC<6%Dq*4^QqN$5S6)9#>CahKd=|n=');
define('SECURE_AUTH_KEY',  'qgvl[YKKJ|^X~/-+_CR}th7|?/W/uIUF86Sz4}H{7r?)wwI=^^f,jf+)@k->CAYq');
define('LOGGED_IN_KEY',    'KiAR|<gOkHo)IeBKf1FjT[6xR{cD:$33;+Esm>U:HZUs4Y6p,hfp#O(EI#-I+>W]');
define('NONCE_KEY',        'rmot8]Acj0u.[&|=HDb~E(Y-lEwkG,ewFRGE=-,^r+ZvFZ#P^q/#tfzcu?`I9Kcv');
define('AUTH_SALT',        '4Yvdmk .%&c+O$0]z-h@rPrc/}Zw M$)*FtbdotgDNmL0;L+bmuWzcT(r0}9SnVF');
define('SECURE_AUTH_SALT', 'LWG^^rk|;j*;|M+.$0Z}d+Yp.@}MC>O6-e3uT2QqlsJJO$j#B:mMIg5S gwS<r<y');
define('LOGGED_IN_SALT',   'f>AqqEO]V!={UCaL2SX-^/mfSrfxmxo}`5pNLjmP fp<DhZ.?,SYp+3<dSUL6AST');
define('NONCE_SALT',       '-m _O?~cv?$O4$o5y@vW*&=tdy@bENRsS27d}Sl`i]pf&=U+j~%rY29:HVluWO`}');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
