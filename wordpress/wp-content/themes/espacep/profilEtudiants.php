<?php
/*
    Template Name: Profil Etudiants
*/

get_header();

?>

<body>
    <header class="headerProfil">
        <h1 role="heading" aria-level="1" class="headerProfil__title"><?php the_title(); ?></h1>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/profil2.jpg" alt="" class="headerProfil__profil">
        <a class="headerProfil__linkHome" href="<?php echo get_option('home'); ?>/" title="Retour vers la page d'accueil">
            <img class="headerProfil__logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/logoEspace.png" alt="">
            <p class="headerProfil__name">Espace P...</p>
        </a>
        <nav class="main-nav">
        <div class="main-nav__container">
            <input type="checkbox" id="toggle-nav" class="main-nav__toggle">    
            <span></span>
            <span></span>
            <span></span>
            <h2 class="hidden" aria-level="2">Navigation principale</h2>
            <ul class="main-nav__list">
                <?php foreach (b_get_menu_items( 'main-nav' ) as $navItem) : ?>
                    <li class="main-nav__item"><a href="<?php echo $navItem->url; ?>" class="main-nav__link"><?php echo $navItem->label; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        </nav>
    </header>
    <section class="main-tds">
        <h2 role="heading" aria-level="2" class="hidden">Contenu principal</h2>
        <?php $posts = new WP_Query( ['category_name' => 'profiletudiants'] );
        if ( $posts->have_posts() ): while ( $posts->have_posts() ): $posts->the_post(); ?>
        <section class="informations-tds">
        <?php if( have_rows( 'info-point' ) ): ?>
            <?php while ( have_rows( 'info-point') ) : the_row(); ?>
            <h3 role="heading" aria-level="3" class="informations-tds__title"><?php the_sub_field( 'info-point-title' ) ;?></h3>
            <?php if( have_rows( 'info-subpoint' ) ): ?>
                <?php while ( have_rows( 'info-subpoint' ) ) : the_row(); ?>
            <div class="tds-point">
                <h4 role="heading" aria-level="4" class="tds-point__title"><?php the_sub_field( 'info-point-subtitle' ) ;?></h4>
                <?php the_sub_field( 'info-point-text' ) ;?>
            </div>
            <?php endwhile; endif; ?>
        <?php endwhile;
        endif; ?> 
        <a class="main-tds__link" href="<?php echo get_option('home'); ?>/">Choisissez un autre profil</a>
        </section>  
        <?php endwhile; endif; ?> 
        <div id='btt' onclick='scr_top.init()'></div>
<?php get_footer();