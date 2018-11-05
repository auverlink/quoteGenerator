<?php


    // condition 1
    // si site vitrine, one page, sans SEO
    if (isset($_POST['site']) && isset($_POST['pages']) && isset($_POST['seo'])) {
        if (($_POST['site'] == "Site Vitrine") && ($_POST['pages'] == "One page") && ($_POST['seo'] == "no")) {
            header('location:SVPackStarter.php');
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

?>


<html>
    <!--<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Demande de devis - Auverlink</title>
    </head>-->
      
    <body onload="aff_vitrine('non'); aff_commerce('non'); aff_seo('non'), blog_vitrine('non'), aff_marketing('non')"  />


    <H1>Commencez votre projet web : demandez un devis</H1>

    <p>Vous avez un projet web en tête pour votre entreprise mais vous ne savez pas par quoi commencer.<br/>
        Répondez à formulaire. Vous y trouverez la solution la plus adéquate.</p>

    <p>A chaque question, une réponse est requise pour obtenir un devis personnalisé.</p>

    <form method="post" action="">

        <!-- question 1 -->
        <label>Quel type de site souhaitez-vous ?</label><br/>
        <input type="radio" name="site" value="Site Vitrine"  onchange="aff_vitrine('oui'); aff_commerce('non')" />Site Vitrine<br/>
        <input type="radio" name="site" value="Site E-commerce" onchange="aff_vitrine('non'); aff_commerce('oui')"/>Site E-commerce</br>
         <br/>

        <!-- question 2 si réponse site vitrine -->
        <div id="block_vitrine">
        <label>Combien de pages contiendra votre site ?</label><br/>
            <input type="radio" name="pages" value="One page" onchange="aff_seo('oui'); blog_vitrine('non')" />Uniquement 1 page
        <br/>
            <input type="radio" name="pages" value="Five pages sv" onchange="aff_seo('non'); blog_vitrine('oui') "/>Entre 1 et 5 pages
        <br />
            <input type="radio" name="pages" value="Ten pages sv" onchange="aff_seo('non'); blog_vitrine('non')"/>De 6 à 10 pages
            <br/><br/> 
        </div>

        <!-- question 2 si réponse e-commerce -->
        <div id="block_commerce">
        <label>Combien de pages contiendra votre site ?</label><br/>
            <input type="radio" name="pages" value="Five pages" onchange="aff_marketing('oui')" />Entre 1 et 5 pages
        <br />
            <input type="radio" name="pages" value="Ten pages" onchange="aff_marketing('non')" />De 6 à 10 pages
            <br/><br/>
        </div>

        <!-- question 3 si site vitrine et Une page -->
        <div id="block_seo">
        <label>Souhaitez-vous que l'on optimise le référencement de votre site pour qu'il soit plus visible sur les moteurs de recherche ?</label><br/>
        <input type="radio" name="seo" value="yes" onchange="blog_vitrine('oui')" />Oui
        <br/>
        <input type="radio" name="seo" value="no" onchange="blog_vitrine('non')" />Non
            <br/><br/>
        </div>

        <!-- question 3 si site vitrine et 1 à 10 pages -->
        <!-- question 4 si site vitrine One page et seo oui -->
        <div id="block_blog">
        <label>Dans votre site, un espace "Blog" sera utile ?</label><br/>
        <input type="radio" name="blog" value="yes" />Oui
        <br/>
        <input type="radio" name="blog" value="no" />Non
            <br /><br/>
        </div>

        <!--question 3 si site ecommerce 1 à 5 pages -->
        <div id="block_marketing">
        <label>Souhaitez-vous que l'on vous propose un accompagnement en stratégie marketing
            afin d'augmenter la visibilité de votre e-commerce ?</label><br/>
        <input type="radio" name="marketing" value="yes" />Oui
        <br/>
        <input type="radio" name="marketing" value="no" />Non
        <br /><br/>
        </div>
   
        <br/>
        <input type="submit" value="Envoyez" />
    </form>





<!-- Fonctions JS -->
<script>
    function aff_vitrine(action){
        document.getElementById('block_vitrine').style.display = (action == "oui")? "inline" : "none";
    }


    function aff_commerce(action){
        document.getElementById('block_commerce').style.display= (action == "oui")? "inline" : "none";
    }


    function aff_seo(action){
        document.getElementById('block_seo').style.display= (action == "oui")? "inline" : "none";
    }

    function blog_vitrine(action){
        document.getElementById('block_blog').style.display= (action == "oui")? "inline" : "none";
    }

    function aff_marketing(action){
        document.getElementById('block_marketing').style.display= (action == "oui")? "inline" : "none";
    }



</script>
    

    </body>
</html>