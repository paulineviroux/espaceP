<?php
/*
    Template Name: Soutien
*/


get_header();

?>
<body>
    <header class="headerSec">
        <h1 class="headerSec__title">Soutenez-nous</h1>
        <a class="headerSec__linkHome" href="index.html">
            <img class="headerSec__logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/logoEspace.png" alt="">
            <p class="headerSec__name">Espace P...</p>
        </a>
        <nav class="main-nav">
            <h3 class="hidden">Navigation principale</h3>
            <ul class="main-nav__list">
                <?php foreach (b_get_menu_items( 'main-nav' ) as $navItem) : ?>
                    <li class="main-nav__item"><a href="<?php echo $navItem->url; ?>" class="main-nav__link"><?php echo $navItem->label; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </header>
    <section class="main-soutien">
        <h2 class="main-soutien__title">Abonnez-vous à notre magazine espace P...</h2>
        <p class="main-soutien__presentation">Vous pouvez vous abonner pour les quatres prochains numéros d'Espace P... Magazine.</p>
        <p class="main-soutien__presentation">Nous vous invitons à nous envoyer un mail avec vos coordonnées. Concernant le payement, celui-ci se fait par virement sur le numéro de compte suivant : BEXX XXXX XXXX XXXX</p>
        <h3 class="main-soutien__secondTitle">Deux formules :</h3>
        <?php the_field( 'formule1' ); ?>
        <?php the_field( 'formule2' ); ?>

    
            <form class="subscribe" method="get">
            <h3 class="subscribe__title"><span class="subscribe__span">Abonnez-vous</span>à notre magazine</h3>
                <?php echo do_shortcode( '[contact-form-7 id="73" title="Don"]' ); ?>
            </form>


<?php get_footer();