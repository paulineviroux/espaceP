<?php
/*
    Template Name: Manifeste
*/

get_header();

?>

<body>
    <header class="headerSec">
        <h1 class="headerSec__title">Manifeste</h1>
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
    <section class="main-manifeste">
        <a class="main-manifeste__button" href="#<?php the_title(); ?>">Adhérez à notre manifeste</a>
        <?php $posts = new WP_Query( ['category_name' => 'manifeste'] );
        if ( $posts->have_posts() ): while ( $posts->have_posts() ): $posts->the_post(); ?>
        <div class="manifeste-point">
            <h2 class="manifeste-point__title"><?php the_field( 'title_intro' ); ?></h2>
            <?php the_field( 'intro_manifeste' ); ?>
        </div>
        <?php if( have_rows( 'manifeste-point') ): ?>
            <?php while ( have_rows( 'manifeste-point') ) : the_row(); ?>
                <div class="manifeste-point">
                    <h2 class="manifeste-point__title"><?php the_sub_field( 'manifeste-point-title' ) ;?></h2>
                        <?php if( have_rows( 'container-text-point' ) ): ?>
                            <?php while ( have_rows( 'container-text-point' ) ) : the_row(); ?>
                                <h3 class="manifeste-point__subtitle"><?php the_sub_field( 'manifeste-point-subtitle' ) ;?></h3>
                                <?php the_sub_field( 'manifeste-point-text' ) ?>
                            <?php endwhile; endif; ?>
                        <h3 class="manifeste-point__subtitle"><?php the_sub_field( 'manifeste-point-subtitle' ) ;?></h3>
                        <?php the_sub_field( 'manifeste-point-text' ) ?>
                </div>
        <?php endwhile; endif; ?>
        <?php endwhile;
    endif; ?> 
        <div class="manifeste-point" id="<?php the_title(); ?>">
            <h2 class="manifeste-point__title">Adhérer à notre manifeste :</h2>
            <h3 class="manifeste-point__subtitle">Pour adhérer à notre manifeste, merci de remplir ce formulaire</h3>
            <!-- <ul class="manifeste-point__list">
                <li class="manifeste-point__item">Votre nom et votre prénom</li>
                <li class="manifeste-point__item">Votre profession</li>
            </ul> -->
            <small class="manifeste-point__small">Votre signature ne sera visible pour les autres qu'après validation par nos soins.</small>
                <?php $posts = new WP_QUERY( ['category_name' => 'join'] );
                    if ( $posts -> have_posts() ): while ( $posts -> have_posts() ): $posts -> the_post(); ?>
                        <form class="join">
                        <h4 class="join__title"><span class="join__span">Adhérez</span> à notre manifeste</h4>
                            <?php the_content(); ?>
                        </form>

                <?php endwhile; endif; ?>
        </div> 

<?php get_footer();