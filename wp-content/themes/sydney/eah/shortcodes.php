<?php

function eah_pasos_inicio_clases() {
  ob_start();
  include_once __DIR__ . "/vistas/eah_pasos_inicio_clases.php";
  $content = ob_get_contents();
  ob_end_clean();
  return $content;
}
add_shortcode('eah_pasos_inicio_clases', 'eah_pasos_inicio_clases');