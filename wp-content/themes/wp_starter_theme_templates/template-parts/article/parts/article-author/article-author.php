<div class="article_author">
    <?php $authorData = get_author_data(); ?>
    <div class="article_author-top">
        <?php get_author_image( $authorData, 'article_author-image' ); ?>
    </div>
    <div class="article_author-name fs22 lh100 fw700">
        <a href="<?php echo esc_url( $authorData[ 'url' ] ); ?>">
            <?php echo esc_html( $authorData[ 'fullName' ] ); ?></div>
        </a>
    <div class="article_author-description fs15 lh130"><?php echo esc_html( $authorData[ 'description' ] ); ?></div>
    <div class="article_author-social"></div>
</div>