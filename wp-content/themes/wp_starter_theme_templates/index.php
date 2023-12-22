<?php
/**
 * The main template file
*/

get_header(); ?>

<div class="index">

    <?php 
        
        get_template_part( 
            './template-parts/posts-container/posts-container', 
            null, 
            [ 
                "postType"                  => "post",
                "actionName"                  => "load_posts",
                "initialNumberOfPosts"      => 1,
                "numberOfPostsPerLoadMore"  => 1,
                "filters"                   => true,
                "postTemplateName"          => "post-item",
                "useAjaxForFilters"         => true
                // "taxonomy"                  => "category"
                // "category"                  => ""
            ] 
        );
        
    ?>

</div>

<?php get_footer();