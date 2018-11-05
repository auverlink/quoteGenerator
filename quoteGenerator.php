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

// ajouter le shortcode pour afficher le contenu de l'index.php
add_shortcode('bienvenue', 'shortcode_index');



