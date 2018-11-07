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


/*
 * Gestion de l'affichage du shortcode Index
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

/*
 * Gestion de l'affichage du shortcode Site Vitrine Pack Starter
 */
// ajouter le shortcode pour afficher le contenu de SVPackStarter.php
add_shortcode('svpackstarter', 'shortcode_SVPStarter');

// Include le contenu de cette page
function getPageSVPStarter() {
    ob_start();
    include 'wp-content/plugins/quoteGenerator/SVPackStarter.php';
    return ob_get_clean();
}

// Créer un shortcode avec ce contenu
function shortcode_SVPStarter(){
    $svpstarter = getPageSVPStarter();
    return $svpstarter;
}

/*
 * Gestion de l'affichage du shortcode de la page Site Vitrine Pack Medium
 */
// ajouter le shortcode pour afficher le contenu de SVPackMedium.php
add_shortcode('svpackmedium', 'shortcode_SVPMedium');

// Include le contenu de cette page
function getPageSVPMedium() {
    ob_start();
    include 'wp-content/plugins/quoteGenerator/SVPackMedium.php';
    return ob_get_clean();
}

// Créer un shortcode avec ce contenu
function shortcode_SVPMedium(){
    $svpmedium = getPageSVPMedium();
    return $svpmedium;
}


/*
 * Gestion de l'affichage du shortcode de la page Site Vitrine Pack Premium
 */
// ajouter le shortcode pour afficher le contenu de SVPackP.php
add_shortcode('svpackpremium', 'shortcode_SVPPremium');

// Include le contenu de cette page
function getPageSVPPremium() {
    ob_start();
    include 'wp-content/plugins/quoteGenerator/SVPackPremium.php';
    return ob_get_clean();
}

// Créer un shortcode avec ce contenu
function shortcode_SVPPremium(){
    $svppremium = getPageSVPPremium();
    return $svppremium;
}


/*
 * Gestion de l'affichage du shortcode de la page Site E-commerce Pack Medium
 */
// ajouter le shortcode pour afficher le contenu de SVPackP.php
add_shortcode('secpackmedium', 'shortcode_SECPMedium');

// Include le contenu de cette page
function getPageSECPMedium() {
    ob_start();
    include 'wp-content/plugins/quoteGenerator/SECPackMedium.php';
    return ob_get_clean();
}

// Créer un shortcode avec ce contenu
function shortcode_SECPMedium(){
    $secpmedium = getPageSECPMedium();
    return $secpmedium;
}


/*
 * Gestion de l'affichage du shortcode de la page Site E-commerce Pack Premium
 */
// ajouter le shortcode pour afficher le contenu de SVPackP.php
add_shortcode('secpackpremium', 'shortcode_SECPPremium');

// Include le contenu de cette page
function getPageSECPMPremium() {
    ob_start();
    include 'wp-content/plugins/quoteGenerator/SECPackPremium.php';
    return ob_get_clean();
}

// Créer un shortcode avec ce contenu
function shortcode_SECPPremium(){
    $secppremium = getPageSECPMPremium();
    return $secppremium;
}




/*
 * Ajout des fichiers css - Theme enfant et plugin
 */
add_action( 'wp_enqueue_scripts', 'wpm_enqueue_styles' ); // style theme enfant

function wpm_enqueue_styles()
{
    wp_enqueue_style( 'Twenty Seventeen', get_template_directory_uri() . '/style.css' ); // style theme enfant
    wp_enqueue_style( 'quoteGenerator', plugins_url('style.css', __FILE__)  ); // style plugin
}

/*
 * Vérifier si le formulaire est bien saisi et redirection vers la bonne page de devis
 */
add_action('template_redirect', 'processForm');

function processForm()
{
    if (isset($_POST['sendForm']) && isset($_POST['checkFormWp'])){
        if (wp_verify_nonce($_POST['checkFormWp'], 'checkForm')) {

            // condition 1
            // si site vitrine, one page, sans SEO
            if (isset($_POST['site']) && isset($_POST['pages']) && isset($_POST['seo'])) {
                if (($_POST['site'] == "Site Vitrine") && ($_POST['pages'] == "One page") && ($_POST['seo'] == "no")) {
                    $url = 'http://localhost:8888/wordpress/site-vitrine-pack-starter/';
                    wp_safe_redirect($url);
                }
            }


            if (isset($_POST['site']) && isset($_POST['pages']) && isset($_POST['seo']) && isset($_POST['blog'])) {
                // condition 2
                // si site vitrine, one page avec seo, mais sans blog
                if (($_POST['site'] == "Site Vitrine") && ($_POST['pages'] == "One page") && ($_POST['seo'] == "yes") && ($_POST['blog'] == "no")) {
                    $url = 'http://localhost:8888/wordpress/site-vitrine-pack-medium/';
                    wp_safe_redirect($url);
                }
                // condition 3
                // si site vitrine, one page avec seo et blog
                if (($_POST['site'] == "Site Vitrine") && ($_POST['pages'] == "One page") && ($_POST['seo'] == "yes") && ($_POST['blog'] == "yes")) {
                    $url = "http://localhost:8888/wordpress/site-vitrine-pack-premium/";
                    wp_safe_redirect($url);
                }
            }

            if (isset($_POST['site']) && isset($_POST['pages']) && isset($_POST['blog'])) {
                //condition 4
                // si site vitrine, entre 1 à 5 pages, sans blog
                if (($_POST['site'] == "Site Vitrine") && ($_POST['pages'] == "Five pages sv") && ($_POST['blog'] == "no")) {
                    $url = 'http://localhost:8888/wordpress/site-vitrine-pack-medium/';
                    wp_safe_redirect($url);
                }
                // condition 5
                // si site vitrine, entre 1 à 5 pages, avec blog
                if (($_POST['site'] == "Site Vitrine") && ($_POST['pages'] == "Five pages sv") && ($_POST['blog'] == "yes")) {
                    $url = "http://localhost:8888/wordpress/site-vitrine-pack-premium/";
                    wp_safe_redirect($url);
                }
            }


            if (isset($_POST['site']) && isset($_POST['pages'])) {
                // condition 6
                // si site vitrine - 6 à 10 pages
                if (($_POST['site'] == "Site Vitrine") && ($_POST['pages'] == "Ten pages sv")) {
                    $url = "http://localhost:8888/wordpress/site-vitrine-pack-premium/";
                    wp_safe_redirect($url);
                }
                //condition 9
                // si site e-commerce, + de 5 pages
                if (($_POST['site'] == "Site E-commerce") && ($_POST['pages'] == "Ten pages")) {
                    $url = "http://localhost:8888/wordpress/site-e-commerce-pack-premium/";
                    wp_safe_redirect($url);
                }
            }



            if (isset($_POST['site']) && isset($_POST['pages']) && isset($_POST['marketing'])) {
                //condition 7
                // si site e-commerce, 1 à 5 page, sans marketing
                if (($_POST['site'] == "Site E-commerce") && ($_POST['pages'] == "Five pages") && ($_POST['marketing'] == "no")) {
                    $url = "http://localhost:8888/wordpress/site-e-commerce-pack-medium/";
                    wp_safe_redirect($url);
                }
                // condition 8
                // si site e-commerce, 1 à 5 page, avec marketing
                if (($_POST['site'] == "Site E-commerce") && ($_POST['pages'] == "Five pages") && ($_POST['marketing'] == "yes")) {
                    $url = "http://localhost:8888/wordpress/site-e-commerce-pack-premium/";
                    wp_safe_redirect($url);
                }
            }
        }

    }
}

/*
 * Gestion du message client à la fin de la demande de devis
 */
add_action('template_redirect', 'getMsgClient');

function getMsgClient()
{
    if (isset($_POST['validateMsgClient']) && isset($_POST['messageClient'])){
        if (wp_verify_nonce($_POST['messageClient'], 'sendMsgClient')){
            if(!empty($_POST)) extract($_POST);

            $lastname = $_POST['lastname'];
            $firstname = $_POST['firstname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $fonction = $_POST['fonction'];
            $enterprise = $_POST['enterprise'];
            $message = $_POST['message'];
            $pack = $_POST['pack'];

            $dest="vanessa.asse@gmail.com";
            $objet="Demande de devis via le site d'Auverlink";
            $mess="
    
              \n";
                    $mess.="Nom : $lastname
            \n";
                    $mess.="Prénom : $firstname
            \n";
                    $mess.="Email : $email
            \n";
                    $mess.="Téléphone: $phone
            \n";
                    $mess.="Fonction: $fonction
            \n";
                    $mess.="Entreprise: $enterprise
            \n";
                    $mess.="Message : $message
            \n";
                    $mess.="Pack : $pack
            \n";
                    $mess.="
            \n";

            $headers = "MIME-Version: 1.0\n";
            $headers .= "content-type: text/html; charset=iso-8859-1\n";
            $headers .= "From: vanessa.asse@gmail.com\n";
            if (mail($dest,$objet,htmlspecialchars($mess),$headers)){
                $url = "http://localhost:8888/wordpress/mail-bien-envoye/";
                wp_safe_redirect($url);
            }else{
                $url = "http://localhost:8888/wordpress/demande-de-devis-votre-mail-na-pas-ete-envoye/";
                wp_safe_redirect($url);
            }
        }
    }
}

/*
 * Gestion de l'affichage du shortcode du Mail OK
 */
// ajouter le shortcode pour afficher le contenu de SVPackP.php
add_shortcode('mailOK', 'shortcode_mailOk');

// Include le contenu de cette page
function getMailOK() {
    ob_start();
    include 'wp-content/plugins/quoteGenerator/sendMail/mailOK.php';
    return ob_get_clean();
}

// Créer un shortcode avec ce contenu
function shortcode_mailOk(){
    $mailOk = getMailOK();
    return $mailOk;
}


/*
 * Gestion de l'affichage du shortcode du Mail Error
 */
// ajouter le shortcode pour afficher le contenu de SVPackP.php
add_shortcode('errorMail', 'shortcode_errorMail');

// Include le contenu de cette page
function getErrorMail() {
    ob_start();
    include 'wp-content/plugins/quoteGenerator/sendMail/errorMail.php';
    return ob_get_clean();
}

// Créer un shortcode avec ce contenu
function shortcode_errorMail(){
    $errorMail = getErrorMail();
    return $errorMail;
}



