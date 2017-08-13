<?php

/*
  Theme Name:   English at Home Perú
  Theme URI:    http://englishathomeperu.com/
  Description:  Tema principal para el sitio web de English at Home Perú
  Author:       Carlos Del Aguila Rios
  Author URI:
  Template:     divi
  Version:      1.0.0
 */
require_once __DIR__ . '/inc/tipos_publicacion.php';
require_once __DIR__ . '/inc/taxonomias.php';
require_once __DIR__ . '/inc/shortcodes.php';
require_once __DIR__ . '/inc/registro_interesado.php';

function wptricks24_recaptcha_scripts() {
  wp_deregister_script('google-recaptcha');
  $url = 'https://www.google.com/recaptcha/api.js';
  $url = add_query_arg(array(
      'onload' => 'recaptchaCallback',
      'render' => 'explicit',
      'hl' => 'es'), $url);
  wp_register_script('google-recaptcha', $url, array(), '2.0', true);
}

add_action('wpcf7_enqueue_scripts', 'wptricks24_recaptcha_scripts', 11);
