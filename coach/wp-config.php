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
define('DB_NAME', 'coach');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'fxbg');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '4%5UqPN~j*z-!xjh[Pqthvu:[F&@j!)n1sePAK9$$2ZHGX:;h%+u0Q_4>kl}J* n');
define('SECURE_AUTH_KEY',  '%Ix%_]7l=Xy}Y%E7J#4dxdO>h9nBmP{Hf3:!<]ZkTks[6gkrBEy5hhh2}d5HfzBW');
define('LOGGED_IN_KEY',    'Ff`#R^;t,[[Jr<}2S!wxdvH%3hA2WlZ<,>;;j(+BX5=gdbSv2V.pXJ~J2ZYZy*vt');
define('NONCE_KEY',        ':UPrJP|N)vr#Xem]>g-S>1-Uf2>N%MOG2v=JUSS0K lJwt{Mgs:`^b.FDk&gXJ=f');
define('AUTH_SALT',        '].wiR#vmm(zB!o%U<o<4+ukh{+ }0G kcHK&g I<a%34BcCdFT8xBU`hLd=ci0{m');
define('SECURE_AUTH_SALT', '^i`PPrkI%HQ?-gzW)$/S&n7::hKp. Q-eRF.TW^o70eYa-L EPO1JNNGLnX<R_X!');
define('LOGGED_IN_SALT',   '[~f*B7<Lwey#`_0%|IxT^log)(.xpIAnWS`v(FB#G5`a`vQe@uzz@+WwrXXuxb:v');
define('NONCE_SALT',       'atpS sk-rtgHtzRUan4Ho4+/1e@Rzp&|sg,L +gMIOi7 ef=]wc|%Sa<1~Pp_N7h');

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

