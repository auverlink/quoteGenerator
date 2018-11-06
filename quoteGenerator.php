<?php
/**
 * @package QuoteGenerator
 * @version 1.0
 */
/*
Plugin Name: QuoteGenerator
Plugin URI:
Description: Ce plugin permet de générer des devis sur-mesure à partir des packs produits de notre agence.
Author: Vanessa Asse
Version: 1.0
*/

// ajouter le shortcode pour afficher le contenu de l'index.php
add_shortcode('bienvenue', 'shortcode_index');

// Include le contenu de l'index.php du plugin
function getPage() {
    ob_start();
    include 'wp-content/plugins/quoteGenerator/index.php';
    return ob_get_clean();
}

// Créer un shortcode avec le contenu de l'index.php
function shortcode_index(){
    $index = getPage();
    return $index;
}


// Ajouter CSS
add_action( 'wp_enqueue_scripts', 'wpm_enqueue_styles' ); // style theme enfant
add_action('wp_enqueue_script','Qg_stylesheet'); // style plugin

function wpm_enqueue_styles()
{
    wp_enqueue_style( 'Twenty Fifteen', get_template_directory_uri() . '/style.css' ); // style theme enfant
    wp_enqueue_style( 'quoteGenerator', plugins_url('style.css', __FILE__)  ); // style plugin
}

add_action('wp_loaded', 'get_page_pack');

function get_page_pack()
{
    wp_redirect($url);
}

