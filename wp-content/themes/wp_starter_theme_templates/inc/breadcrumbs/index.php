<?php 

require_once 'Breadcrumb.php';

function the_breadcrumb()
{
    global $wp_query;
    $breadcrumbs = new Breadcrumb();
    $page = $wp_query->get_queried_object();

    if (is_home() || is_front_page()) {
		return;
    } else if (is_search()) {
        $breadcrumbs->home()->unlinkedCrumb(sprintf('Search results for "%s"', get_search_query()));
    } else if (is_page()) {
        $breadcrumbs->home()->parents();
    } else if (is_singular('post')) {
		$breadcrumbs->home()->pageByTitle('Resource Hub');

        $industries = get_the_terms($page, 'industries');
        $categories = get_the_terms($page, 'category');
        if (!empty($categories)) {
            $breadcrumbs->term($categories[0]);
        }
        if (!empty($industries)) {
            $breadcrumbs->term($industries[0]);
        }

        $breadcrumbs->current();
	} else if (is_product()) {
        $productCategories = get_the_terms($page, 'product_cat');

        $category;

        $taxonomy = 'product_cat'; 
        $primary_cat_id = get_post_meta($page->ID,'_yoast_wpseo_primary_' . $taxonomy, true);
                
        if($primary_cat_id){
            $primary_cat = get_term($primary_cat_id, $taxonomy);
            $category = $primary_cat;
        }

        $breadcrumbs->home()->parents($category)->term($category)->current();

    }
    print $breadcrumbs;
}