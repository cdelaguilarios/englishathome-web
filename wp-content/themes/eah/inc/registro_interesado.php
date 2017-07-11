<?php

function registro_interesado($contact_form) {
  $idFormulario = $contact_form->id;
  $subDat = WPCF7_Submission::get_instance();
  $posted_data = ($subDat ? $subDat->get_posted_data() : []);

  try {
    if (395 == $idFormulario) {
      $url = 'http://englishathome/interesado/registrar/externo';
      $variables = "cursoInteres=" . get_the_title($posted_data["curso"]) . "&nombre=" . $posted_data["nombres"] . "&apellido=" . $posted_data["apellidos"] . "&correoElectronico=" . $posted_data["correo-electronico"] . "&telefono=" . $posted_data["telefono"] . "&consulta=" . $posted_data["consulta"] . " - Distrito: " . $posted_data["distrito"];

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
