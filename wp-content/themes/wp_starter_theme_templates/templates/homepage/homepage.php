<?php
/* Template Name: Homepage */

get_header();?>

<div class="homepage">

	<?php

		get_template_part( './template-parts/home-primary-banner/home-primary-banner' );
		get_template_part( './template-parts/home-secondary-banner/home-secondary-banner' );
		
	?>

</div>

<?php get_footer();