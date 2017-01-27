<?php
/*
    Template Name: Rapport
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
    <section class="main-manifeste">
        <?php $posts = new WP_Query( ['category_name' => 'rapport'] );
        if ( $posts->have_posts() ): while ( $posts->have_posts() ): $posts->the_post(); ?>
        <div class="manifeste-point">
            <h2 role="heading" aria-level="2" class="manifeste-point__title"><?php the_field( 'title_intro' ); ?></h2>
            <?php the_field( 'intro_manifeste' ); ?>
        </div>
        <?php if( have_rows( 'manifeste-point') ): ?>
            <?php while ( have_rows( 'manifeste-point') ) : the_row(); ?>
                <div class="manifeste-point">
                    <h2 role="heading" aria-level="2" class="manifeste-point__title"><?php the_sub_field( 'manifeste-point-title' ) ;?></h2>
                        <?php if( have_rows( 'container-text-point' ) ): ?>
                            <?php while ( have_rows( 'container-text-point' ) ) : the_row(); ?>
                                <h3 role="heading" aria-level="3" class="manifeste-point__subtitle"><?php the_sub_field( 'manifeste-point-subtitle' ) ;?></h3>
                                <?php the_sub_field( 'manifeste-point-text' ) ?>
                            <?php endwhile; endif; ?>
                </div>
        <?php endwhile; endif; ?>
        <?php endwhile; 
    endif; ?> 
        </div> 

<?php get_footer();