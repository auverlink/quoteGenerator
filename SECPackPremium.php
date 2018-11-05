<html>
<!--<head>
    <meta charset="utf-8" />
     <link rel="stylesheet" href="style.css" />
    <title>Demande de devis - Auverlink - Pack Starter</title>
</head>-->
<body>

<H1>Commencez votre projet web : demandez un devis</H1>

<h2>L'offre la plus adaptée à vos besoins est notre pack Premium.</h2>

<h3>349€ HT/mois</h3>

Cet accompagnement personnalisé comprend :
<ul>
    <li><b>1 nom de domaine + 1 extension :</b> nous vous conseillons dans le choix du nom de domaine le plus adapté à votre projet.</li>
    <li><b>6 à 10 page :</b>  en fonction de vos besoins, nous déployons jusqu'à dix pages sur votre site.</li>
    <li><b>E-commerce administrable :</b> nous mettons à votre disposition une site administrable facilement. Nous vous accompagnons dans sa prise en main.
        Pour présenter vos produits, jusqu'à quinze références sont publiables, avec cinq déclinaison.</li>
    <li><b>Maintenance & hébergement inclus :</b> nous assurons l'hébergement de votre site ainsi que sa maintenance (mise à jour de votre site et de ses différents plugins).</li>
    <li><b>Accompagnement en stratégie marketing :</b> après la mise en ligne de votre site, nous vous accompagnons dans la mise en place d'une stratégie marketing pour augmenter
        votre visibilité</li>
    <li><b>1 Template responsive :</b> nous vous proposons un modèle de page adaptable et lisible sur tous supports, du mobile à l'ordinateur.</li>
    <li><b>Charte Graphique :</b> nous déclinons votre identité visuelle sur votre nouveau site si vous disposez d'une charte graphique.</li>
    <li><b>Fonctionnalités :</b> nous développons pour vous un formulaire de contact, une Google Map, une galerie photos et un gestionnaire d'articles.</li>
</ul>

<br/>

<h2>Contactez-nous pour en savoir plus !</h2>

<form method="post" action="sendMail/send.php">
    Nom : <input name="lastname" type="text" required/><br/>
    Prénom : <input name="firstname" type="text" required /><br/>
    Mail :<input name="email" type="email" required /><br/>
    Téléphone : <input name="phone" type="tel" required><br/>
    Fonction : <input name="fonction" type="text"/><br/>
    Entreprise : <input name="enterprise" type="text"/><br/>
    Message :<textarea name="message" cols="50" rows="5"></textarea><br/><br/>

    <input name="pack" type="hidden" value="Site Vitrine : Pack Starter"/>
    <input type="submit" value="Envoyez" />
</form>

</body>
</html>
