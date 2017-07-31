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
define('DB_NAME', 'wp_mogul');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'pls^sj/!t,?&GPeLP/H=[(.O8ezPA1)j=mp{Bg!}bPlk1C.Ussw][cyAWCQ3XA%5');
define('SECURE_AUTH_KEY',  'M;oxuReZ(yP@s!GFTcNg&UDv&W/B9AQQ+Pkv;3.&i.qrSRu)+RM51[[ro}/3Yg!2');
define('LOGGED_IN_KEY',    '^Cv9Evly!x,!j1##Y_gy#[b)UDWoOy]f)k|_.iL#/9n(z[sb,tk~|UqV* TF)@2W');
define('NONCE_KEY',        'Wd[;scUXrJg~Z%nz<ywt1U|V3<TH~Fu[2*r#Q|j|=::<?}W6c{8mOOafR?r8BCRF');
define('AUTH_SALT',        'Sl6c@E=JMPQ*n,,F|QQ1~J,3_o|y#v^AB>7x[7Ya^,w}NW:Rj5~W6uif+/K*f:mn');
define('SECURE_AUTH_SALT', ':L;RH=.L.>(;}0xwSF $RdAT2PN]W;HT6)AD?}]h65?MlcMD28k0Psm[fModhy?P');
define('LOGGED_IN_SALT',   '_N&[-%FZ0v0Vl]oE;/#~!d/=yH_{J&}/d`=e6]ySynMnK$WN#ad[51A!}AV*7ogh');
define('NONCE_SALT',       '}Gv]whD#9Tc/Et?G3,8{g=/x$A@=~N?egdX)R-#mZU/vGcbof|&|8MfN#wgj&p<%');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'mg_';

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
