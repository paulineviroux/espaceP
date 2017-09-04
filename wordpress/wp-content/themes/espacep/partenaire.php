<?php
/*
    Template Name: Partenaire
*/

get_header();

?>

<body>
    <header class="headerSec">
        <h1 role="heading" aria-level="1" class="headerSec__title"><?php the_title(); ?></h1>
        <a class="headerSec__linkHome" href="<?php echo get_option('home'); ?>/" title="Retour vers la page d'accueil">
            <img class="headerSec__logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/logoEspace.png" alt="">
            <p class="headerSec__name">Espace P...</p>
        </a>
        <nav class="main-nav">
        <div class="main-nav__container">
            <input type="checkbox" id="toggle-nav" class="main-nav__toggle">    
            <span></span>
            <span></span>
            <span></span>
            <h2 role="heading" aria-level="2" class="hidden">Navigation principale</h2>
            <ul class="main-nav__list">
                <?php foreach (b_get_menu_items( 'main-nav' ) as $navItem) : ?>
                    <li class="main-nav__item"><a href="<?php echo $navItem->url; ?>" class="main-nav__link"><?php echo $navItem->label; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div> 
        </nav>
    </header>
    <section class="main-partenaire">
        <h2 role="heading" aria-level="2" class="main-partenaire__title">L'esapce P... est soutenu par :</h2>
        <div class="main-partenaire__columns">
            <?php $posts = new WP_Query( ['post_type' => 'partner'] );
                if ( $posts->have_posts() ): while ( $posts->have_posts() ): $posts->the_post(); ?>
        
            <figure class="main-partenaire__partenaire">
                <a href="<?php the_field( 'partenaire_link');?>">
                <div class="main-partenaire__div">
                    <img class="main-partenaire__logo" src="<?php the_field( 'logo_img');?>" alt="" width="150" height="150">
                </div>
                </a>
                <figcaption class="main-partenaire__caption"><?php the_title(); ?></figcaption>
                <?php the_field( 'description');?>
                <a class="main-partenaire__link" href="<?php the_field( 'partenaire_link');?>" title="Visiter le site de <?php the_title(); ?>">Visiter leur site</a>
            </figure>
            
            <?php endwhile;
            endif; ?>

        </div>

        <p class="main-partenaire__invite">Si vous souhaitez également devenir un de nos partenaires, n'hésitez pas a nous contacter à l'adresse suivante : <a href="mailto:espacepliege@gmail.com" class="main-partenaire__email">espacepliege@gmail.com</a></p>

<?php get_footer();
        