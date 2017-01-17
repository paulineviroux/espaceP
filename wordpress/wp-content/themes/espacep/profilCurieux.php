<?php
/*
    Template Name: Profil Curieux
*/

get_header();

?>

<body>
    <header class="headerProfil">
        <h1 class="headerProfil__title">Curieux</h1>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/profil4.jpg" alt="" class="headerProfil__profil">
        <a class="headerProfil__linkHome" href="index.html">
            <img class="headerProfil__logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/logoEspace.png" alt="">
            <p class="headerProfil__name">Espace P...</p>
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
    <section class="main-tds">
        <h2 class="hidden">Contenu principal</h2>
        <?php $posts = new WP_Query( ['category_name' => 'profilcurieux'] );
        if ( $posts->have_posts() ): while ( $posts->have_posts() ): $posts->the_post(); ?>
        <section class="informations-tds">
        <?php if( have_rows( 'info-point' ) ): ?>
            <?php while ( have_rows( 'info-point') ) : the_row(); ?>
            <h3 class="informations-tds__title"><?php the_sub_field( 'info-point-title' ) ;?></h3>
            <?php if( have_rows( 'info-subpoint' ) ): ?>
                <?php while ( have_rows( 'info-subpoint' ) ) : the_row(); ?>
            <div class="tds-point">
                <h4 class="tds-point__title"><?php the_sub_field( 'info-point-subtitle' ) ;?></h4>
                <p class="tds-point__text"><?php the_sub_field( 'info-point-text' ) ;?></p>
            </div>
            <?php endwhile; endif; ?>
        <?php endwhile;
        endif; ?> 
        </section>  
        <?php endwhile; endif; ?> 

<?php get_footer();