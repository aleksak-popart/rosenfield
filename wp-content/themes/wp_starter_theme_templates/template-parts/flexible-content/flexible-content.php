<?php if( have_rows('flexible_content') ):
    while ( have_rows('flexible_content') ) : the_row();
        if (get_row_layout() == 'demo_component') {
            get_template_part( 'template-parts/demo-component/demo-component');
        }
    endwhile;
endif; ?>