<div class="other_posts">
    <div class="other_posts-inner">
        
        <?php 

            if ( $prevPost = get_previous_post() ) {
                $args = [ 'post' => $prevPost, 'label' => 'Previous Post', 'svg' => 'prev-post-arrow' ];
                get_template_part( './template-parts/article/parts/other-posts/parts/other-post/other-post', null, $args );
            }

            if ( $nextPost = get_next_post() ) {
                $args = [ 'post' => $nextPost, 'label' => 'Next Post', 'svg' => 'next-post-arrow' ];
                get_template_part( './template-parts/article/parts/other-posts/parts/other-post/other-post', null, $args );
            }

        ?>

    </div>
</div>