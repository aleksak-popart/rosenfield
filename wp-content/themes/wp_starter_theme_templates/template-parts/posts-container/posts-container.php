<section class="posts-container | js-posts-container">
    <div class="container posts-container_inner">
        <?php if($args["filters"]):?>
        <div class="posts-container_filters">
            <span class="posts-container_filters-label"><?php esc_html_e('Filters:'); ?></span>
            <div class="posts-container_filters-list">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>blog/" class="posts-container_filters-link <?php if(!is_category()) echo 'active';?> | js-filter-link"><?php esc_html_e('All'); ?></a>
                <?php
					$categories = get_categories();

					foreach($categories as $category) {
						$activeClass = '';
						if(get_queried_object()->slug === $category->slug) {
							$activeClass = 'active';
						}
					?>
                <a href="<?php echo esc_url(get_category_link($category->term_id));?>" class="posts-container_filters-link <?php echo esc_attr($activeClass);?> | js-filter-link"
                    data-taxonomy="<?php echo esc_attr($category->taxonomy); ?>" data-category="<?php echo esc_attr($category->slug); ?>"><?php echo esc_html($category->name); ?></a>
                <?php }
				?>
            </div>
        </div>
        <?php endif;?>
        <?php
			$postType = $args["postType"];
			$postTemplateName = $args["postTemplateName"];
			$initialNumberOfPosts = $args["initialNumberOfPosts"];
			$currentTaxonomy = isset($args["taxonomy"]) ? $args["taxonomy"] : get_queried_object()->taxonomy;
			$currentCategory = isset($args["category"]) ? $args["category"] : get_queried_object()->slug;

			$queryArgs = array(
				'post_type' => $postType,
				'posts_per_page' => $initialNumberOfPosts,
				'post_status'    => 'publish',
				'paged' => 1,
				'tax_query' => array( 
					array(
						'taxonomy' => $currentTaxonomy,
						'field'    => 'slug',
						'terms'    => array($currentCategory),
					)
				)
			);

			if(!is_category()) {
				unset($queryArgs['tax_query']);
			}

			$query = new WP_Query( $queryArgs );
		?>


        <?php
			$loadMoreOptions = new class{};
			$loadMoreOptions->useAjaxForFilters = $args["useAjaxForFilters"] ? "use" : "do-not-use";
			$loadMoreOptions->actionName = $args["actionName"];
			$loadMoreOptions->postTemplateName = $postTemplateName;
			$loadMoreOptions->postType = $postType;
			$loadMoreOptions->initialNumberOfPosts = $initialNumberOfPosts;
			$loadMoreOptions->numberOfPostsPerLoadMore = $args["numberOfPostsPerLoadMore"];
			$loadMoreOptions->currentTaxonomy = $currentTaxonomy;
			$loadMoreOptions->currentCategory = $currentCategory;
		?>

        <div class="posts-container_posts | js-posts" data-options="<?php echo htmlspecialchars(json_encode($loadMoreOptions,JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE))?>">

            <?php if ( $query->have_posts() ) : ?>
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

            <?php get_template_part( './template-parts/' . $postTemplateName . '/'  . $postTemplateName );  ?>

            <?php endwhile; ?>
            <?php endif; ?>

        </div>
        <button class="posts-container_btn-load-more <?php if($query->max_num_pages <= 1) echo "hide"; ?> | js-load-more-btn"><?php esc_html_e('Load more'); ?></button>

    </div>
</section>
<?php wp_reset_query(); ?>