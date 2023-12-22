<header class="header | js-header">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php img("logo.png", "header__logo", "Logo", 80, 80);?>
    </a>
    <nav class="navigation roboto-22-normal | js-navigation">
        <?php wp_nav_menu( array(
				'theme_location' => 'Primary',
				'menu_class'     => 'primary-menu',
				'container'      => false
			) ); ?>
    </nav>
    <!-- Hamburger -->
    <div class="h | js-hamburger">
        <div class="h__l h__l--1">
            <div class="h__l-in h__l-in--1"></div>
        </div>
        <div class="h__l h__l--2">
            <div class="h__l-in h__l-in--2"></div>
        </div>
        <div class="h__l h__l--3">
            <div class="h__l-in h__l-in--3"></div>
        </div>
        <div class="h__l h__l--c1">
            <div class="h__l-in h__l-in--c1"></div>
        </div>
        <div class="h__l h__l--c2">
            <div class="h__l-in h__l-in--c2"></div>
        </div>
    </div>
</header>