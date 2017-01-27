<?php
/*
    Template Name: Homepage
*/

get_header();

?>
<body>
    <header class="header">
        <h1 role="heading" aria-level="1"><span class="header__title">Espace P... </span><span class="header__specification">Vers une société &laquo;prostitution admise&raquo;</span></h1>
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
    <section class="main">
        <h2 role="heading" aria-level="2" class="hidden">Contenu principal</h2>
        <nav class="nav-profil">
            <h3 role="heading" aria-level="3" class="hidden">Navigation profils</h3>
            <div class="nav-profil__list">
                <?php foreach (b_get_menu_items( 'nav-profil' ) as $navItem) : ?>
                    <figure class="nav-profil__item">
                        <a href="<?php echo $navItem->url; ?>" class="nav-profil__link"><?php echo $navItem->label; ?></a>
                    </figure>
                <?php endforeach; ?> 
            </div>
        </nav>
        <section class="lastActu">
            <h3 role="heading" aria-level="3" class="lastActu__title">Actualité</h3>
            <article class="articleActu">
            <?php 
                $posts = new WP_Query( ['category_name' => 'actualites', 'posts_per_page' => 1] );
                if ( $posts->have_posts() ): while ( $posts->have_posts() ): $posts->the_post(); 
            ?>
                <h4 role="heading" aria-level="4" class="articleActu__title"><?php the_title(); ?></h4>
                <p class="articleActu__date">Publié le <date><?php the_field( 'date_actu' ); ?></date></p>
                <?php the_field( 'text_actu' ); ?>
            </article>
            <?php endwhile;
    endif; ?>
            <a class="lastActu__more" href="<?php bloginfo('url'); ?>/archive-actualites/" title="Voir toutes les actualités">Toutes les actualités</a>
            <a class="lastActu__facebook" href="https://www.facebook.com/espace.asbl" title="Nous suivre sur notre page facebook">Suivez-nous sur</a>
        </section>
    
<?php get_footer();