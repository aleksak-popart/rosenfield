<article class="article" id="<?php echo esc_attr( get_queried_object() -> ID );?>">

	<?php get_template_part( './template-parts/article/parts/article-header/article-header' ); ?>

	<?php get_featured_image( get_the_ID(), 'default', 'article_image', 'eager' ); ?>
		
	<?php get_template_part( './template-parts/article/parts/article-body/article-body' ); ?>

	<?php get_template_part( './template-parts/article/parts/article-author/article-author' ); ?>

	<?php get_template_part( './template-parts/article/parts/other-posts/other-posts' ); ?>
	
	<?php get_template_part( './template-parts/article/parts/comments/comments' ); ?>
	
</article>