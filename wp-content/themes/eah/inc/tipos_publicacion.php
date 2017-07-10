<?php

function eah_tipos_publicacion() {
  //Tipo publicación: Cursos
  register_post_type('cursos', array(
      'labels' => array(
          'name' => __('Cursos'),
          'singular_name' => __('Curso'),
          'menu_name' => __('Cursos'),
          'parent_item_colon' => __('Curso padre'),
          'all_items' => __('Todos los cursos'),
          'view_item' => __('Ver curso'),
          'add_new_item' => __('Agregar nuevo curso'),
          'add_new' => __('Nuevo'),
          'edit_item' => __('Editar curso'),
          'update_item' => __('Actualizar curso'),
          'search_items' => __('Buscar cursos'),
          'not_found' => __('No encontrado'),
          'not_found_in_trash' => __('No encontrado en papelera'),
      ),
      'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'cursos'),
      'hierarchical' => false,
      'show_ui' => true,
      'show_in_menu' => true,
      'show_in_nav_menus' => true,
      'show_in_admin_bar' => true,
      'can_export' => true,
      'exclude_from_search' => false,
      'publicly_queryable' => true
          )
  );

  //Tipo publicación: Testimonios
  register_post_type('testimonios', array(
      'labels' => array(
          'name' => __('Testimonios'),
          'singular_name' => __('Testimonio'),
          'menu_name' => __('Testimonios'),
          'parent_item_colon' => __('Testimonio padre'),
          'all_items' => __('Todos los testimonios'),
          'view_item' => __('Ver testimonio'),
          'add_new_item' => __('Agregar nuevo testimonio'),
          'add_new' => __('Nuevo'),
          'edit_item' => __('Editar testimonio'),
          'update_item' => __('Actualizar testimonio'),
          'search_items' => __('Buscar testimonios'),
          'not_found' => __('No encontrado'),
          'not_found_in_trash' => __('No encontrado en papelera'),
      ),
      'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'testimonios'),
      'hierarchical' => false,
      'show_ui' => true,
      'show_in_menu' => true,
      'show_in_nav_menus' => true,
      'show_in_admin_bar' => true,
      'can_export' => true,
      'exclude_from_search' => false,
      'publicly_queryable' => true
          )
  );
}

add_action('init', 'eah_tipos_publicacion');
