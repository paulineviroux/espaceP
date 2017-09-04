<?php 

/*
 * Defines custom post type
 * 
 */
add_theme_support( 'post-thumbnails' );

register_taxonomy( 'project-type', 'project',[
        'label' => __('Types de projets', 'b'),
        'labels' =>[
            'singular_name' => __('Type de projet', 'b')
        ],
        'public' => true, 
        'description' => __('Le procédé utilisé pour créer ce projet', 'b'),
        'hierarchical' => true

    ] );

register_post_type( 'project', [
        'label' => __('Antennes', 'b'),
        'labels' => [
            'singular_name' => __('Antenne', 'b'),
            'add_new' => __('Ajouter une nouvelle antenne', 'b')
        ],
        'description' => __('Différentes antennes de l\'espace p', 'b'),
        'public' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-editor-video',
        'supports' => ['title', 'editor', 'thumbnail'],
        'has_archive' => true
    ] );

register_post_type( 'partner', [
        'label' => __('Partenaires', 'p'),
        'labels' => [
            'singular_name' => __('Partenaire', 'p'),
            'add_new' => __('Ajouter un nouveau partenaire', 'p')
        ],
        'description' => __('Différents partenaires de l\'esapce p...', 'p'),
        'public' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-users',
        'supports' => ['title', 'editor', 'thumbnail'],
        'has_archive' => true
    ] );

// register_post_type( 'profil', [
//         'label' => __('Profils', 'p'),
//         'labels' => [
//             'singular_name' => __('Profil', 'p'),
//             'add_new' => __('Ajouter le contenu de ce profil', 'p')
//         ],
//         'description' => __('Contenu des profils', 'p'),
//         'public' => true,
//         'menu_position' => 5,
//         'menu_icon' => 'dashicons-admin-users',
//         'supports' => ['title', 'editor', 'thumbnail'],
//         'has_archive' => true
//     ] );

register_nav_menus( array(
    'main-nav' => 'Menu principal, affiché dans le header.',
    'nav-footer' => 'Menu affiché dans le footer',
    'nav-profil' => 'Menu des profils',
    'nav-profil-footer' => 'Menu des profils, affiché dans le footer',
    'nav-towns' => 'Menu des villes'
) );
/*
 * Generates a custom excerpt, used on the homepage
 *
 */

function get_the_custom_excerpt($length = 150){

    $excerpt = get_the_content();
    $excerpt = strip_shortcodes( $excerpt );
    $excerpt = strip_tags( $excerpt );
    return substr($excerpt, 0, $length);
}

function the_custom_excerpt($length = 150){
    
    echo get_the_custom_excerpt($length);
}

/*
 * Generates a link label containing the post-title
 */
function get_the_link_content($string, $replacement = '%s'){
    //Le span avec la classe sro sera utilisée en css pour cacher le titre, tout en gardent le nom de l'article dans le texte du lien.
    return str_replace($replacement, '<span class="sro">' . get_the_title() . '</span>', __($string, 'b'));
}

function the_link_content($string, $replacement = '%s'){
    echo get_the_link_content($string, $replacement);
    
}

function the_link($string, $replace = '%s'){
    echo get_the_link($string, $replace);
} 


/* Generates a custom menu array*/

function b_get_menu_id( $location ){
    $locations = get_nav_menu_locations();

    if (isset($locations[$location])) {
        return $locations[$location];
    }
    return false;
}

function b_get_menu_items( $location ){
    $navItems=[];
    foreach ( wp_get_nav_menu_items($location) as $obj ) {
        $item = new stdClass();
        $item->url = $obj->url;
        $item->label = $obj->title;
        $item->icon = $obj->classes[0];
        array_push($navItems, $item);
    }

    return $navItems;
}








