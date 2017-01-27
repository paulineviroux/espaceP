    </section> 
    <footer class="footer">
        <h2 role="heading" class="hidden">Footer</h2>
        <nav class="nav-footer">
        <h3 class="hidden">Navigation du footer</h3>
            <ul class="nav-footer__list">
                <?php foreach (b_get_menu_items( 'nav-footer' ) as $navItem) : ?>
                    <li class="nav-footer__item"><a href="<?php echo $navItem->url; ?>" class="nav-footer__link"><?php echo $navItem->label; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <nav class="nav-profil-footer">
        <h3 role="heading" class="hidden">Navigation des profils du footer</h3>
            <ul class="nav-profil-footer__list">
                <?php foreach (b_get_menu_items( 'nav-profil-footer' ) as $navItem) : ?>
                    <li class="nav-profil-footer__item"><a href="<?php echo $navItem->url; ?>" class="nav-profil-footer__link"><?php echo $navItem->label; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <div class="bottom">
        <h3 role="heading" class="hidden">Navigation supplémentaire du footer</h3>
            <ul class="bottom__list">
                <?php foreach (b_get_menu_items( 'nav-footer-bottom' ) as $navItem) : ?>
                    <li class="bottom__item"><a href="<?php echo $navItem->url; ?>" class="bottom__link"><?php echo $navItem->label; ?></a></li>
                <?php endforeach; ?>
            </ul>
            <small class="bottom__small">Design by Pauline Viroux. 2016</small>
        </div>
        <?php wp_footer(); ?>
    </footer>
</body>
</html>