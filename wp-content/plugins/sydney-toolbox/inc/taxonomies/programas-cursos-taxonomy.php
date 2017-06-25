<?php

function sydney_toolbox_register_programas_cursos() {

  register_taxonomy('programas-cursos', array('cursos'), array(
      'hierarchical' => true,
      'labels' => array(
          'name' => __('Programas cursos'),
          'singular_name' => __('Programa curso'),
          'search_items' => __('Buscar programas cursos'),
          'all_items' => __('Todos los programas cursos'),
          'parent_item' => __('Programa curso padre'),
          'parent_item_colon' => __('Programa curso padre:'),
          'edit_item' => __('Editar programa curso'),
          'update_item' => __('Actualizar programa curso'),
          'add_new_item' => __('Agregar nuevo programa curso'),
          'new_item_name' => __('Nuevo programa curso'),
          'menu_name' => __('Programas cursos'),
      ),
      'show_ui' => true,
      'show_admin_column' => true,
      'query_var' => true,
      'rewrite' => array('slug' => 'programas-cursos'),
  ));
}

add_action('init', 'sydney_toolbox_register_programas_cursos', 0);
