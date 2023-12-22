<?php

acf_register_block(array(
    'name'				=> 'demo',
    'title'				=> __('Demo'),
    'description'		=> __('A demo block.'),
    'render_callback'	=> 'my_acf_block_render_callback',
    'category'			=> 'popart-blocks',
    'icon'				=> 'admin-comments',
    'keywords'			=> array( 'demo', 'demo block' ),
    'mode' => 'auto',
));