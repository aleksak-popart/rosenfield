<section class="wrapper-section">
    <?php if(get_field('home_primary_banner_background_image')) :?>
        <?php acf_image(get_field('home_primary_banner_background_image'), "background-image"); ?>
    <?php endif ?>
    <div class="wrapper-textfields">
        <div class="wraper-title-textfields">
            <?php if(get_field('home_primary_banner_title_greeting')) :?>
                <h1 class="greeting-text"><?php the_field('home_primary_banner_title_greeting') ?></h1>
            <?php endif ?>
        
            <?php if(get_field('home_primary_banner_title')) :?>
                <h1 class="title-text"><?php the_field('home_primary_banner_title') ?></h1>
            <?php endif ?>
        </div>
    
        <?php if(get_field('home_primary_banner_description')) :?>
            <p class="description-text"><?php the_field('home_primary_banner_description') ?></p>
        <?php endif ?>
    </div>

        
</section>