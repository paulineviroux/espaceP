<?php
/*
    Template Name: Archive
*/
get_header();

?>

<body>
    <header class="headerSec">
        <h1 role="heading" aria-level="1" class="headerSec__title">Archive actualités</h1>
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
    <section class="mainArchive">
    <h2 role="heading" aria-level="2" class="hidden">Contenu principal</h2>
        <?php $posts = new WP_Query( ['category_name' => 'actualites', 'posts_per_page' => 3] );
        if ( $posts->have_posts() ): while ( $posts->have_posts() ): $posts->the_post(); ?>
            <div class="mainArchive__container">
                <h3 role="heading" aria-level="3" class="mainArchive__title"><?php the_title(); ?></h3>
                <p class="mainArchive__date">Publié le <date><?php the_field( 'date_actu' ); ?></date></p>
                <?php the_field( 'intro_actu' ); ?>
                <a href="<?php the_permalink(); ?>" class="mainArchive__link" title="Lire la suite de l'article">Lire la suite...</a>
            </div>
        <?php endwhile;
        endif; ?>
    </section>

<?php get_footer();