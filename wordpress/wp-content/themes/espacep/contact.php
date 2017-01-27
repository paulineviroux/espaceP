<?php
/*
    Template Name: Contact
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
    <section class="main-contact">
        <h2 role="heading" aria-level="2" class="hidden">Contenu principal</h2>
        <nav class="nav-towns">
            <h3 role="heading" aria-level="3" class="hidden">Navigation différentes antennes</h3>
            <ul class="nav-towns__list">
                <?php $posts = new WP_Query( ['post_type' => 'project'] );
            if ( $posts->have_posts() ): while ( $posts->have_posts() ): $posts->the_post(); ?>
                <li class="nav-towns__item"><a href="" class="nav-towns__link" id="<?php the_field( 'name' ); ?>_link"><?php the_field( 'name' );?></a></li>
               <?php endwhile;
            endif; ?>
            </ul>
        </nav>
        <?php $posts = new WP_Query( ['post_type' => 'project'] );
            if ( $posts->have_posts() ): while ( $posts->have_posts() ): $posts->the_post(); ?>
        <section class="town">
            <div class="town__container visible" id="<?php the_field('name'); ?>_target">
                <h3 role="heading" aria-level="3" class="town__title">Antenne <?php the_title(); ?></h3>
                <?php the_field( 'antenne_presentation' ); ?>
                <iframe class="town__map" src="<?php the_field( 'antenne_map' ); ?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                <address class="town__address"><?php the_field( 'antenne_adresse' ); ?></address>
                <a href="mailto:<?php the_field( 'antenne_mail' ); ?>" class="town__mail"><?php the_field( 'antenne_mail' ); ?></a>
                <a href="tel:<?php the_field( 'antenne_tel' ); ?>" class="town__phone"><?php the_field( 'antenne_tel' ); ?></a>
                <?php the_field( 'antenne_horaire' ); ?>
                <div class="townContactForm">
                    <h4 role="heading" aria-level="4" class="townContactForm__title">Nous contacter</h4>
                    <?php echo do_shortcode( '[contact-form-7 id="275" title="Contact"]' ); ?>
                </div>
            </div> 
        </section>

        <?php endwhile;
            endif; ?>
    </section>
        <script type="text/javascript">
        var liens = document.querySelectorAll('.nav-towns__link');
        var targets = document.querySelectorAll('.town__container');
        var i = 0, tailleLiens = liens.length, tailleTargets = targets.length;

        while(i < tailleLiens){
          liens[i].addEventListener('click', handleToggle);
          i++;
        } 

        function doToggle(elt){
          var c = 0, target = document.getElementById(elt);
          while(c < tailleTargets){
            if(target === targets[c]){
              target.classList.toggle('hidden');
            }else{
              targets[c].classList.remove('visible');
              targets[c].classList.add('hidden');
            }
          c++;  
          }
        }

        function handleToggle(e){
          e.preventDefault();
          var targetNameParts = e.target.id.split('_');
          var targetNamePrefix = targetNameParts[0];
          var targetName = targetNamePrefix+'_target';
          doToggle(targetName);
        }

    </script>


<?php get_footer();