<?php

function registro_interesado($contact_form) {
  $idFormulario = $contact_form->id;
  $subDat = WPCF7_Submission::get_instance();
  $posted_data = ($subDat ? $subDat->get_posted_data() : []);

  try {
    if (395 == $idFormulario) {
      $url = 'http://englishathome/interesado/registrar/externo';
      $variables = "cursoInteres=" . get_the_title($posted_data["curso"]) . "&nombre=" . $posted_data["nombreCompleto"] . "&telefono=" . $posted_data["telefono"] . "&correoElectronico=" . $posted_data["correo-electronico"] . "&consulta=" . $posted_data["consulta"];

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $variables);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_exec($ch);
    }
  } catch (Exception $ex) {
    
  }
}
add_action('wpcf7_before_send_mail', 'registro_interesado');

function no_enviar_correo_electronico() {
  return true;
}

add_filter('wpcf7_skip_mail', 'no_enviar_correo_electronico');