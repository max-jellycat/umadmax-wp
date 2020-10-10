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
define('DB_NAME', 'umadmax');

/** MySQL database username */
define('DB_USER', 'umadmax');

/** MySQL database password */
define('DB_PASSWORD', 'T2Dmmujn');

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
define('AUTH_KEY',         '.t$5p=P-dt|>GFb%c3R5C@~(A7afog[bM`f`aTw4zaS1s;KA%g;vt]p6bfP-PGDl');
define('SECURE_AUTH_KEY',  '6C<w+:tMlz5*vr MZXE;uKSup=`wy- z:zEz/Rh6u|.wBNrq$UaxMi0a,|Y$x~&q');
define('LOGGED_IN_KEY',    'a{??:}3]7/.A;4x~_P=uJC~Hkg,-f$uW-EyU*CzqbS|t>b[*})g7O/nrSd$e!OIM');
define('NONCE_KEY',        '!eI#sp6pnsdCLJRmG#@Rf5Y_!#e=+>7-k.T)HWL-d|^1dol%m7D#UF&>@qP+t[;Z');
define('AUTH_SALT',        '1/E(E8&IlO?j<EU=0C@f=V> 1~=*5^f~pH]nDOM]MLAZ34I4yawb!<wfua1c=5R.');
define('SECURE_AUTH_SALT', '+L{5vWayU$|dm-f8^J-g?xC=@/ `;4GYZp1+LH0`5>x0Zc }}3$.0YS88(U|F43x');
define('LOGGED_IN_SALT',   '-V2f+jj|e;UK8{s~XxPe|7.(W6uIf4YF,HlWRSRyxzW/ed&;A8j_-Sq9|P0a~lAh');
define('NONCE_SALT',       '$BxFGBs#K)x;_XO!_oMc8KYJ-?304oN+Kv^Nw]Tft`UhE^:`8{Xv/NYj+Q7*Cto4');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_mad_';

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
