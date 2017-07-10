<?php

function eah_taxonomias() {
  //Taxonomía: Programas
  register_taxonomy('programas', array('cursos'), array(
      'hierarchical' => true,
      'labels' => array(
          'name' => __('Programas'),
          'singular_name' => __('Programa'),
          'search_items' => __('Buscar programa'),
          'all_items' => __('Todas los programas'),
          'parent_item' => __('Programa padre'),
          'parent_item_colon' => __('Programa padre:'),
          'edit_item' => __('Editar programa'),
          'update_item' => __('Actualizar programa'),
          'add_new_item' => __('Agregar nuevo programa'),
          'new_item_name' => __('Nuevo programa'),
          'menu_name' => __('Programas'),
      ),
      'show_ui' => true,
      'show_admin_column' => true,
      'query_var' => true,
      'rewrite' => array('slug' => 'programas'),
  ));
}

add_action('init', 'eah_taxonomias');
