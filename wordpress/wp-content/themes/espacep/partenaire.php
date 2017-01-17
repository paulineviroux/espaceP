<?php
/*
    Template Name: Partenaire
*/

get_header();

?>

<body>
    <header class="headerSec">
        <h1 class="headerSec__title">Partenaire</h1>
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
    <section class="main-partenaire">
        <h2 class="main-partenaire__title">L'esapce P... est soutenu par :</h2>
        <?php 
                $posts = new WP_Query( ['category_name' => 'logo'] );
                if ( $posts->have_posts() ): while ( $posts->have_posts() ): $posts->the_post(); 
            ?>
        <figure class="main-partenaire__partenaire">
            <a href="<?php the_field( 'partenaire_link');?>">
                <img class="main-partenaire__logo" src="<?php the_field( 'logo-img');?>" alt="" width="200" height="200">
                <figcaption class="main-partenaire__caption"><?php the_title(); ?></figcaption>
            </a>
        </figure>
        <?php endwhile;
    endif; ?>

<?php get_footer();
        