<?php
/*
Plugin Name: mes shortcodes
Description: Plugin fournissant des shortcodes
Author: Cyril
Version : 1.0.0
*/

function bouton_promo_shortcode( $atts, $content = null ) {
   
    // shortcode attributes
    extract( shortcode_atts( array(
        'url'    => 'https://vrwatch.website/produit/vr-watch-modele-z/',
        'title'  => 'Modèle Z',
        'target' => 'test',
        'text'   => 'Découvrez le dernier modèle de VR Watch',
    ), $atts ) );
 
    $content = $text ? $text : $content;
 
    // Returns the button with a link
    if ( $url ) {
 
        $link_attr = array(
            'href'   => esc_url( $url ),
            'title'  => esc_attr( $title ),
            'target' => ( 'blank' == $target ) ? '_blank' : '',
            'class'  => 'bouton-promo'
        );
 
        $link_attrs_str = '';
 
        foreach ( $link_attr as $key => $val ) {
 
            if ( $val ) {
 
                $link_attrs_str .= ' ' . $key . '="' . $val . '"';
 
            }
 
        }
 
 
        return '<a' . $link_attrs_str . '><span>' . do_shortcode( $content ) . '</span></a>';
 
    }
 
    // Return as span when no link defined
    else {
 
        return '<span class="bouton-promo"><span>' . do_shortcode( $content ) . '</span></span>';
 
    }
 
}
add_shortcode( 'boutonpromo', 'bouton_promo_shortcode' );