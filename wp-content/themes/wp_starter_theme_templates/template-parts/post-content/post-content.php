<section class="post-content">
    <?php the_content();?>
    <?php 
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
    ?>
</section>