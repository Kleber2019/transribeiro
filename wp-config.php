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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u435110360_saqyr' );

/** MySQL database username */
define( 'DB_USER', 'u435110360_jehas' );

/** MySQL database password */
define( 'DB_PASSWORD', 'DuLyHyDegu' );

/** MySQL hostname */
define( 'DB_HOST', 'mysql' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'EiazUgQbhj5*SDl_>xnD-|.uw v?RlEFUB@!uTT9PBhOtS=B)Bw13Ug<q<1sr2vm' );
define( 'SECURE_AUTH_KEY',   '+Mw.V(fS]-iP(|Xj}8r4@8Bi4=IxHC|?n`,4$Pj<*2g)~}tVAFuy;7hPlEWXjd/z' );
define( 'LOGGED_IN_KEY',     'MP7HC!&{ShU{HX^JQi$h9+,Q1C{U$##5<Xh</<QD#]N/WE>u:7kU0@z=^B%jiVOa' );
define( 'NONCE_KEY',         'ZHR#}eAtE b2g&emr3~Oy&4Ymts78N>YgO-<H|C.$@NFP5G:t;lx|!MRQnx5Q3/v' );
define( 'AUTH_SALT',         'TWqh=d;5bEZE*1sPa,vx[J@P$<^1,|*J:#|ghwPO4IOC=& S))F)$&F9vG}O:xA1' );
define( 'SECURE_AUTH_SALT',  '1Jf](6[,>b+nU_rO@aiXo8f5N$U?!^SAOWM/r:f{|o.k@R8JQ0IrB#%`C55}ts53' );
define( 'LOGGED_IN_SALT',    's).).I.xC~M;GuoC?SgxG|?] *p8}-CxMCgdN/Ti@%1$45*bnP!mO[k3pKfb`V=6' );
define( 'NONCE_SALT',        '8Wq/Lj(Qs$0h64|94aZN}Y)p(%ZaF=^TrpIwvHTES($Ai||jJZI(i*i!*Bei?/DV' );
define( 'WP_CACHE_KEY_SALT', '1wb[nMi>IBR-TEjb@Fh,0Yk9]qT;Y)Gw@^!4`91q*c}Chz.Z@b-n1+:7#WBN-1nA' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
