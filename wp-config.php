<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'englishathome_web_3');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '3yqR,&Op$_mIxP/^~tNl}*Augg<81}UO%c{Z{ROTObHCZ1rJI`:>AuWc!<@:sr_C');
define('SECURE_AUTH_KEY', 'c^9)=UrFtlj.&o.~]-J+k%d,9g2J@W+_+eQ-!c}<xQ^el/>$xKp^7za0^U;s;Z%-');
define('LOGGED_IN_KEY', 'Pii53K}wD3gb$Z(PV^w~AE%|>(_Ub=T^Pd<ve3pJ,thZak~$X]Q#|Pzn,#)-bJU*');
define('NONCE_KEY', 'tC/Av:0?=[tCnco)a!nrm^bL3_88N}OrxJlwR9j;E@UFNGIV[-b/px%`Q`OgJ*$F');
define('AUTH_SALT', 'SZYR|VIMx18bbNF]0sB<Ig)bJi1qmUo<<!VF)(J-t3=A$O?7pS-Y$M!EngDIOFXD');
define('SECURE_AUTH_SALT', 'nPkuSWWfABa?1lvs#eMB4{Tf!W@>i2h6CvV0ueg.jGY1.2@%Gbhc*o6;Axb< [IT');
define('LOGGED_IN_SALT', 'p0mfu}@^vh5bpq7+IeRYef2I8F>r%)Debo#h|A*`4OX?bs&DvNPlM%G3+2c5&SJp');
define('NONCE_SALT', 'aJsq|%sC*,r{mB{e]6mL`ohGG3r~3z{~Y3~J$v+69fM4C`_]2E{P!^c^,2JT/HMs');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

