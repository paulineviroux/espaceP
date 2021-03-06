<?php
/*
    Template Name: Single Actu
*/
get_header();

?>

<body>
    <header class="headerSec">
        <h1 role="heading" aria-level="1" class="headerSec__title">Actualité</h1>
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
    <section class="mainActu">
        <h2 role="heading" aria-level="2" class="hidden">Actualité</h2>
        <article class="mainActu__container">
            <h3 role="heading" aria-level="3" class="mainActu__title"><?php the_title(); ?></h3>
            <p class="mainActu__date">Publié le <date><?php the_field( 'date_actu' ); ?></date> par <?php the_field( 'author_actu' ); ?></p>
            <?php if( have_rows( 'container_actu') ): ?>
                <?php while ( have_rows( 'container_actu') ) : the_row(); ?>
                <h4 role="heading" aria-level="4" class="mainActu__subtitle"><?php the_sub_field( 'title_actu' ); ?></h4>
                <?php the_sub_field( 'text_actu' ); ?>
            <?php endwhile; endif; ?>    
        </article>
        <a class="mainActu__more" href="<?php bloginfo('url'); ?>/archive-actualites/" title="Voir toutes les actualités">Toutes les actualités</a>
    

<?php get_footer();
