<?php
        $link = get_field('home_secondary_banner_button');
    
        $linkVideo = get_field('home_secondary_banner_video_link');
?>

<section class="home-secondary-banner">
    <?php if(get_field('home_secondary_banner_title_description')) :?>
        <h1><?php the_field('home_secondary_banner_title_description') ?></h1>
    <?php endif ?>
    
    <?php if(get_field('home_secondary_banner_title')) :?>
        <h1><?php the_field('home_secondary_banner_title') ?></h1>
    <?php endif ?>
    
    <?php if(get_field('home_secondary_banner_description')) :?>
        <p><?php the_field('home_secondary_banner_description') ?></p>
    <?php endif ?>
    
    <?php if(get_field('home_secondary_banner_button')) :?>
        <a href="<?php echo $link['url'] ?>"><?php echo $link['title'] ?></a>
    <?php endif ?>
    
    <?php if(get_field('home_secondary_banner_video_link')) :?>
        <a href="<?php echo $linkVideo['url'] ?>"><?php echo $linkVideo['title'] ?><?php svg('play-circle') ?></a>
    <?php endif ?>
</section>
