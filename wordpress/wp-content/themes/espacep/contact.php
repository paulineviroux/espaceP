<?php
/*
    Template Name: Contact
*/

get_header();

?>

<body>
    <header class="headerSec">
        <h1 class="headerSec__title">Contact</h1>
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
    <section class="main-contact">
        <h2 class="hidden">Contenu principal</h2>
        <nav class="nav-towns">
            <h3 class="hidden">Navigation différentes antennes</h3>
            <ul class="nav-towns__list">
            <?php $posts = new WP_Query( ['post_type' => 'project', 'posts_per_page' => 1] );
            if ( $posts->have_posts() ): while ( $posts->have_posts() ): $posts->the_post(); ?>
                <?php foreach (b_get_menu_items( 'nav-towns' ) as $navItem) : ?>
                    <li class="nav-towns__item"><a href="<?php echo $navItem->url; ?>" class="nav-towns__link" id="<?php the_title(); ?>_link"><?php echo $navItem->label; ?></a></li>
                <?php endforeach; ?>
             <?php endwhile;
            endif; ?>   
            </ul>
        </nav>
        <section class="town">
            <?php $posts = new WP_Query( ['post_type' => 'project', 'posts_per_page' => 1] );
            if ( $posts->have_posts() ): while ( $posts->have_posts() ): $posts->the_post(); ?>
            <div class="town__container visible" id="<?php the_title(); ?>_target"><?php the_title(); ?>
                <h3 class="town__title">Antenne <?php the_title(); ?></h3>
                <?php the_field( 'antenne_presentation' ); ?>
                <iframe class="town__map" src="<?php the_field( 'antenne_map' ); ?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                <p class="town__address"><?php the_field( 'antenne_addresse' ); ?></p>
                <a href="<?php the_field( 'antenne_mail' ); ?>" class="town__mail"><?php the_field( 'antenne_mail' ); ?></a>
                <a href="tel:<?php the_field( 'antenne_tel' ); ?>" class="town__phone"><?php the_field( 'antenne_tel' ); ?></a>
                <?php the_field( 'antenne_horaire' ); ?>
                <form action="" class="townContactForm">
                    <h4 class="townContactForm__title">Nous contacter</h4>
                    <label for="name" class="townContactForm__label">Nom</label>
                    <input type="text" class="townContactForm__input" name="name" id="name">
                    <label for="mail" class="townContactForm__label">Email</label>
                    <input type="text" class="townContactForm__input" name="mail" id="mail">
                    <label for="message" class="townContactForm__label">Message</label>
                    <textarea name="message" id="message" cols="30" rows="7" class="townContactForm__textarea"></textarea>
                    <input class="townContactForm__button" type="button" value="Envoyer">
                </form>
            </div> 
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