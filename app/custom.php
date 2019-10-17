<?php
/**
 * Setting for saving ACF Pro
 **/
function acf_json_save_point( $path )
{
    $path = get_stylesheet_directory() . '/json_acf';

    return $path;
}

add_filter( 'acf/settings/save_json', 'acf_json_save_point' );

/**
 * Setting for loading ACF Pro
 **/
function my_acf_json_load_point( $paths )
{
    unset( $paths[ 0 ] );

    $paths[ ] = get_stylesheet_directory() . '/json_acf';

    return $paths;
}

add_filter( 'acf/settings/load_json', 'my_acf_json_load_point' );

/**
 * Change flexible content layout title
 */
function acf_layout_title( $title, $field, $layout, $i )
{

    if ( get_sub_field( 'section_title' ) ) {
        $title = get_sub_field( 'section_title' );
    }
    return $title;

}

add_filter( 'acf/fields/flexible_content/layout_title', 'acf_layout_title', 10, 4 );
