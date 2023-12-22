<?php global $allsearch; ?>

<div class="search-results">
    <div class="search-results_total">
        <?php echo $allsearch->found_posts ?>
    </div>
    <?php while ( $allsearch->have_posts() ) : $allsearch->the_post(); ?>
    <div>This is one serch result</div>
    <?php endwhile;?>
</div>