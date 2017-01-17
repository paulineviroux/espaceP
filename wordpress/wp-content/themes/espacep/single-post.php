<?php
/*
    Template Name: Single Actu
*/
get_header();

?>

<body>
    <header class="headerSec">
        <h1 class="headerSec__title">Actualité</h1>
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
    <section class="mainActu">
        <article class="mainActu__container">
            <h4 class="mainActu__title"><?php the_title(); ?></h4>
            <p class="mainActu__date">Publié le <date><?php the_field( 'date_actu' ); ?></date></p>
            <?php the_field( 'text_actu' ); ?>
        </article>
    </section>

<?php get_footer();
