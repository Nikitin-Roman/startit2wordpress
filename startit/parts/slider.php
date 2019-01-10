<?php
	$background_image = get_sub_field('slider_background_image');
	$bottom_image     = get_sub_field('bottom_figure');
?>

<section id="slider" class="slider_1" style = "background-image: url(<?php echo $background_image['url'];?>);">
    <div class="slider">
        <div class="container">
            <div class="slide-content">
                <h6 class="sub_heading"><?php the_sub_field('slider_title'); ?></h6>
                <div class="typing_content">
                    <h2 class="heading">
                      <?php the_sub_field('slider_text'); ?> <span class="typed-element">Carrby</span>
                    </h2>
                    <div class="typed-strings">
                    <?php 
		                    if( have_rows('slider_changed_text') ):
		                     	// loop through the rows of data
		                        while ( have_rows('slider_changed_text') ) : the_row();
		                ?>
		                          <p> <?php  the_sub_field('slider_changed_word'); ?></p>
										<?php 
		                        endwhile;
		                    else :
		                        // no rows found
		                    endif;
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="scroll_btn"><a href="<?php the_sub_field('slider_button_url'); ?>"><i class="fa <?php the_sub_field('slider_button_icon'); ?>"></i></a></div>
        <div class="section-shape">
            <img src="<?php echo $bottom_image['url']; ?>" alt="<?php echo $bottom_image['alt']; ?>">
        </div>
    </div>
</section>