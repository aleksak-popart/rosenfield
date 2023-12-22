<header class="article_header">
    <h1 class="article_title fs35 fw700 lh130"><?php the_title(); ?></h1>
    <div class="article_meta fs12">
        <?php $authorData = get_author_data(); ?>
        <a class="article_meta-link fw700 upp" href="<?php echo esc_url( $authorData[ 'url' ] ); ?>">
            <?php get_author_image( $authorData, 'article_meta-image' ); ?>
            <span><?php echo esc_html( $authorData[ 'fullName' ] ); ?></span>
        </a>
        <time class="article_meta-time upp" datetime=""><?php echo get_the_date(); ?></time>
    </div>
</header>