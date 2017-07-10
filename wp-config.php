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
define('DB_NAME', 'englishathome_web');

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
define('AUTH_KEY',         '_%:vG]*=v.7 G5vxye4.?H]+Mpbhkx&|&QhJI,xuZ|9.fhtmtQj29NUfJj%q*qas');
define('SECURE_AUTH_KEY',  'Or(Nl-Cw?/o&kM*|:IN@OSb2M1;X 9pF&irUzGP1kyk={|P>YQ+a8,|kjs6dj}^e');
define('LOGGED_IN_KEY',    'E`a{`hw{CKZ3rfVHY QfnpHjX|ip+GpJzG^Uu0mD<CA@>ig?zKA7mTG8 .ycCE2.');
define('NONCE_KEY',        '4N_w^!Xn3dx]V5M0c-4]?h>r!w+t{wb{8@dtL(Tm2gPXoMV[D~/YGL50]G[tS49P');
define('AUTH_SALT',        'p!@zFdF&eImP5GDvve`[g6E~eEUtHmdo:txuPzdXl/Rh~nXdy cjs3aF-R^4>nSn');
define('SECURE_AUTH_SALT', 'e:=f.;WDA~qf9/Zk+n56tsH?#m?0[Z#~vgqB[RF+S{0lDyUL/0tC+66:#=K7ckk]');
define('LOGGED_IN_SALT',   'gO_QbbVmdw?LF*e0FfBI.aeC&wbF49>9aO$|CZQ4H)]MSqm1oNpqB_k43bL[C^W~');
define('NONCE_SALT',       ',9Oc>rV_1jG3Y8G[J&K2UIkA+h#;.$qYB01Njvs+}}`.7/j<+&q#A]?iKiHeS/,N');

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
define ('WPLANG', 'es_ES');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
