<html>
<!--<head>
    <meta charset="utf-8" />
     <link rel="stylesheet" href="style.css" />
    <title>Demande de devis - Auverlink - Pack Medium</title>
</head>-->
<body>

<div class="qg-block-presentation-pack">
    <h2>La solution la plus adaptée à vos besoins est...</h2>
    <div class="qg-name-pack">Le "Pack Link Plus"</div>
    <h4>Véritable plaquette commerciale pour accroître votre notoriété et développer votre clientèle.</h4>
    <div class="qg-price-pack">199€ HT/mois</div>
</div>

<div class="qg-block-content-pack">
    Cet accompagnement personnalisé comprend&nbsp;:
    <ul>
        <li><span class="qg-tags">1 à 5 page :</span> en fonction de vos besoins, nous déployons jusqu'à cinq pages sur votre site.</li>
        <li><span class="qg-tags">Référencement naturel optimisé :</span> nous vous conseillons dans la rédaction des contenus de votre site afin d'optimiser au maximum le référencement de votre site
            sur les moteurs de recherche.</li>
        <li><span class="qg-tags">Maintenance & hébergement inclus :</span> nous assurons l'hébergement de votre site ainsi que sa maintenance durant l'année (mise à jour de votre site et de ses différents plugins).</li>
        <li><span class="qg-tags">Design responsive :</span> nous vous proposons un modèle de page adaptable et lisible sur tous supports, du mobile à l'ordinateur.</li>
        <li><span class="qg-tags">Fonctionnalités :</span> Nous développons pour vous un formulaire de contact, une Google Map et une galerie photos.</li>
    </ul>
    <br/>
</div>

<div class="qg-block-content-pack">
    <h3>Contactez-nous pour en savoir plus !</h3><br/>

    <form method="post" action="">

        <?php wp_nonce_field('sendMsgClient', 'messageClient'); ?>

        Nom : <input name="lastname" type="text" required/><br/><br/>
        Prénom : <input name="firstname" type="text" required /><br/><br/>
        Mail :<input name="email" type="email" required /><br/><br/>
        Téléphone : <input name="phone" type="tel" required><br/><br/>
        Fonction : <input name="fonction" type="text"/><br/><br/>
        Entreprise : <input name="enterprise" type="text"/><br/><br/>
        Message :<textarea name="message" cols="50" rows="5"></textarea><br/><br/>

        <input name="pack" type="hidden" value="Pack Link Plus"/>
        <input type="submit" class="qg-send-form-client" name="validateMsgClient" value="Envoyez" />
    </form>

</div>

</body>
</html>
