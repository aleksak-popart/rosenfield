<div class="article_body">
    <?php get_template_part( './template-parts/article/parts/article-body/parts/article-share/article-share' ); ?>
    <div class="article_content">
        <?php the_content(); ?>
        <div class="article_tags fs12">
            <div class="article_tags-label fs15 fw700"><?php echo esc_html_e( 'Tags' );?>:</div>
            <?php get_post_tags( 'article_tag' ); ?>
        </div>
    </div>
</div>