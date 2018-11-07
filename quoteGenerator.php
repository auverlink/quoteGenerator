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
add_shortcode('index', 'shortcode_index');

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
    wp_enqueue_style( 'Twenty Seventeen', get_template_directory_uri() . '/style.css' ); // style theme enfant
    wp_enqueue_style( 'quoteGenerator', plugins_url('style.css', __FILE__)  ); // style plugin
}

function processForm()
{
    if (isset($_POST['sendForm']) && isset($_POST['checkFormWp'])){
        if (wp_verify_nonce($_POST['checkFormWp'], 'checkForm')) {

            // condition 1
            // si site vitrine, one page, sans SEO
            if (isset($_POST['site']) && isset($_POST['pages']) && isset($_POST['seo'])) {
                if (($_POST['site'] == "Site Vitrine") && ($_POST['pages'] == "One page") && ($_POST['seo'] == "no")) {
                    $url = 'SVPackStarter.php';
                    wp_safe_redirect($url);
                }
            }


            if (isset($_POST['site']) && isset($_POST['pages']) && isset($_POST['seo']) && isset($_POST['blog'])) {
                // condition 2
                // si site vitrine, one page avec seo, mais sans blog
                if (($_POST['site'] == "Site Vitrine") && ($_POST['pages'] == "One page") && ($_POST['seo'] == "yes") && ($_POST['blog'] == "no")) {
                    header('location:SVPackMedium.php');
                }
                // condition 3
                // si site vitrine, one page avec seo et blog
                if (($_POST['site'] == "Site Vitrine") && ($_POST['pages'] == "One page") && ($_POST['seo'] == "yes") && ($_POST['blog'] == "yes")) {
                    header('location:SVPackPremium.php');
                }
            }

            if (isset($_POST['site']) && isset($_POST['pages']) && isset($_POST['blog'])) {
                //condition 4
                // si site vitrine, entre 1 à 5 pages, sans blog
                if (($_POST['site'] == "Site Vitrine") && ($_POST['pages'] == "Five pages sv") && ($_POST['blog'] == "no")) {
                    header('location:SVPackMedium.php');
                }
                // condition 5
                // si site vitrine, entre 1 à 5 pages, avec blog
                if (($_POST['site'] == "Site Vitrine") && ($_POST['pages'] == "Five pages sv") && ($_POST['blog'] == "yes")) {
                    header('location:SVPackPremium.php');
                }
            }


            if (isset($_POST['site']) && isset($_POST['pages'])) {
                // condition 6
                // si site vitrine - 6 à 10 pages
                if (($_POST['site'] == "Site Vitrine") && ($_POST['pages'] == "Ten pages sv")) {
                    header('location:SVPackPremium.php');
                }
                //condition 9
                // si site e-commerce, + de 5 pages
                if (($_POST['site'] == "Site E-commerce") && ($_POST['pages'] == "Ten pages")) {
                    header('location:SECPackPremium.php');
                }
            }



            if (isset($_POST['site']) && isset($_POST['pages']) && isset($_POST['marketing'])) {
                //condition 7
                // si site e-commerce, 1 à 5 page, sans marketing
                if (($_POST['site'] == "Site E-commerce") && ($_POST['pages'] == "Five pages") && ($_POST['marketing'] == "no")) {
                    header('location:SECPackMedium.php');
                }
                // condition 8
                // si site e-commerce, 1 à 5 page, avec marketing
                if (($_POST['site'] == "Site E-commerce") && ($_POST['pages'] == "Five pages") && ($_POST['marketing'] == "yes")) {
                    header('location:SECPackPremium.php');
                }
            }
        }

    }
}



add_action('template_redirect', 'processForm');



