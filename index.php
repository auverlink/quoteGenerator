<?php

?>


<html>
    <!--<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Demande de devis - Auverlink</title>
    </head>-->

<body onload="aff_site('oui'); aff_vitrine('non'); aff_commerce('non'); aff_seo('non'), blog_vitrine('non'), aff_marketing('non')"  >

<div class="qg-container-index">

    <h2>
        Vous avez un projet web en tête pour votre entreprise mais vous ne savez pas par quoi commencer. Répondez à ce formulaire.<br/>Vous y trouverez la solution adaptée à vos besoins.<br/>
    </h2>

    <div class="qg-alert-question-require">
        <p>
            A chaque question, une réponse est requise pour obtenir un devis personnalisé.<br/>
        </p>
    </div>

    <form method="post" action="">

        <?php wp_nonce_field('checkForm', 'checkFormWp'); ?>

        <!-- question 1 -->
        <div id="block_site">
            <label><div class="qg-label-questions">Quel type de site souhaitez-vous ?</div></label>
            <div class="qg-radio-questions">
                <input type="radio" class="option-input radio" name="site" value="Site Vitrine"  onchange="aff_vitrine('oui'); aff_commerce('non'); aff_marketing('non')" /><label class="label-radio">Site Vitrine</label><br/>
                <input type="radio" class="option-input radio" name="site" value="Site E-commerce" onchange="aff_vitrine('non'); aff_commerce('oui'); blog_vitrine('non'); aff_seo('non')"/><label class="label-radio">Site E-commerce</label><br/><br/>
            </div>
        </div>

        <!-- question 2 si réponse site vitrine -->
        <div id="block_vitrine">
            <label><div class="qg-label-questions">Combien de pages contiendra votre site vitrine ?</div></label>
            <div class="qg-radio-questions">
                <input type="radio" class="option-input radio" name="pages" value="One page" onchange="aff_seo('oui'); blog_vitrine('non')" /><label class="label-radio">Uniquement 1 page</label>
                <br/>
                <input type="radio" class="option-input radio" name="pages" value="Five pages sv" onchange="aff_seo('non'); blog_vitrine('oui') "/><label class="label-radio">Entre 1 et 5 pages</label>
                <br />
                <input type="radio" class="option-input radio" name="pages" value="Ten pages sv" onchange="aff_seo('non'); blog_vitrine('non')"/><label class="label-radio">De 6 à 10 pages</label>
                <br/><br/>
            </div>
        </div>

        <!-- question 2 si réponse e-commerce -->
        <div id="block_commerce">
            <label><div class="qg-label-questions">Combien de pages contiendra votre site e-commerce ?</div></label>
            <div class="qg-radio-questions">
                <input type="radio" class="option-input radio" name="pages" value="Five pages" onchange="aff_marketing('oui')" /><label class="label-radio">Entre 1 et 5 pages</label>
                <br />
                <input type="radio" class="option-input radio" name="pages" value="Ten pages" onchange="aff_marketing('non')" /><label class="label-radio">De 6 à 10 pages</label>
                <br/><br/>
            </div>
        </div>

        <!-- question 3 si site vitrine et Une page -->
        <div id="block_seo">
            <label><div class="qg-label-questions">Souhaitez-vous que l'on optimise le référencement de votre site pour qu'il soit plus visible sur les moteurs de recherche ?</div></label>
            <div class="qg-radio-questions">
                <input type="radio" class="option-input radio" name="seo" value="yes" onchange="blog_vitrine('oui')" /><label class="label-radio">Oui</label>
                <br/>
                <input type="radio" class="option-input radio" name="seo" value="no" onchange="blog_vitrine('non')" /><label class="label-radio">Non</label>
                <br/><br/>
            </div>
        </div>

        <!-- question 3 si site vitrine et 1 à 10 pages -->
        <!-- question 4 si site vitrine One page et seo oui -->
        <div id="block_blog">
            <label><div class="qg-label-questions">Dans votre site, un espace "Blog" sera-t-il utile ?</div></label>
            <div class="qg-radio-questions">
                <input type="radio" class="option-input radio" name="blog" value="yes" /><label class="label-radio">Oui</label>
                <br/>
                <input type="radio" class="option-input radio" name="blog" value="no" /><label class="label-radio">Non</label>
                <br /><br/>
            </div>
        </div>

        <!--question 3 si site ecommerce 1 à 5 pages -->
        <div id="block_marketing">
            <label><div class="qg-label-questions">Souhaitez-vous que l'on vous propose un accompagnement en stratégie marketing
                    afin d'augmenter la visibilité de votre e-commerce ?</div></label>
            <div class="qg-radio-questions">
                <input type="radio" class="option-input radio" name="marketing" value="yes" /><label class="label-radio">Oui</label>
                <br/>
                <input type="radio" class="option-input radio" name="marketing" value="no" /><label class="label-radio">Non</label>
                <br /><br/>
            </div>
        </div>
           
        <br/>
                <input type="submit" class="qg-send-button" name="sendForm" value="Envoyez" />
            </form>

</div>



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