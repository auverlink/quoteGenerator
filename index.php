<?php

?>


<html>
    <!--<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Demande de devis - Auverlink</title>
    </head>-->

<body onload="aff_site('oui'); aff_vitrine('non'); aff_commerce('non'); aff_seo('non'), blog_vitrine('non'), aff_marketing('non')"  >


<H1>Commencez votre projet web : demandez un devis</H1>

<p>Vous avez un projet web en tête pour votre entreprise mais vous ne savez pas par quoi commencer.
    Répondez à ce formulaire. Vous y trouverez la solution adaptée à vos besoins.</p>

<div class="test">
    <p>
        A chaque question, une réponse est requise pour obtenir un devis personnalisé.
    </p>
</div>

<form method="post" action="">

    <?php wp_nonce_field('checkForm', 'checkFormWp'); ?>

    <!-- question 1 -->
    <div id="block_site">
    <label>Quel type de site souhaitez-vous ?</label><br/>
    <input type="radio" name="site" value="Site Vitrine"  onchange="aff_vitrine('oui'); aff_commerce('non'); aff_marketing('non')" />Site Vitrine<br/>
    <input type="radio" name="site" value="Site E-commerce" onchange="aff_vitrine('non'); aff_commerce('oui'); blog_vitrine('non'); aff_seo('non')"/>Site E-commerce</br>
             <br/>
    </div>

    <!-- question 2 si réponse site vitrine -->
    <div id="block_vitrine">
        <label>Combien de pages contiendra votre site vitrine ?</label><br/>
        <input type="radio" name="pages" value="One page" onchange="aff_seo('oui'); blog_vitrine('non')" />Uniquement 1 page
        <br/>
        <input type="radio" name="pages" value="Five pages sv" onchange="aff_seo('non'); blog_vitrine('oui') "/>Entre 1 et 5 pages
        <br />
        <input type="radio" name="pages" value="Ten pages sv" onchange="aff_seo('non'); blog_vitrine('non')"/>De 6 à 10 pages
        <br/><br/> 
    </div>

    <!-- question 2 si réponse e-commerce -->
    <div id="block_commerce">
        <label>Combien de pages contiendra votre site e-commerce ?</label><br/>
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
        <label>Dans votre site, un espace "Blog" sera-t-il utile ?</label><br/>
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
            <input type="submit" name="sendForm" value="Envoyez" />
        </form>





<!-- Fonctions JS -->
<script>
    function aff_site(action)
    {
        document.getElementById('block_site').style.display = (action == "oui")? "inline" : "none";
    }

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