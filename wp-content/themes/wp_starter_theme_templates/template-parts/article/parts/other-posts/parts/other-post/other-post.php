<a href="<?php the_permalink( $args[ 'post' ]->ID ); ?>" class="other_posts-post">
	<?php get_featured_image( $args[ 'post' ]->ID, 'thumbnail', 'other_posts-post-image', 'lazy' ); ?>
    <div class="other_posts-post-text">
        <div class="other_posts-post-label">
            <?php svg( $args[ 'svg' ] ); ?>
            <span><?php echo esc_html( $args[ 'label' ] ); ?></span>
        </div>
        <h3 class="other_posts-post-title"><?php echo esc_html( $args[ 'post' ]->post_title ); ?></h3>
    </div>
</a>