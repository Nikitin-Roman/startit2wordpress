<?php
    $about_left_bg = get_sub_field('about_left_bg');
    $about_right_bg = get_sub_field('about_right_bg');
    $about_left_image = get_sub_field('about_left_image');
?>
<section id="about" class="about">
    <style type="text/css">
        .about:before { 
             background-image: url("<?php echo $about_left_bg['url'];?>"); 
        }
        .about:after { 
             background-image: url("<?php echo $about_right_bg['url'];?>"); 
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="section-title">
                    <h2><?php the_sub_field('about_title'); ?></h2>
                    <p><?php the_sub_field('about_subtitle'); ?></p>
                </div>
                <div class="about_content_box box-left">
                    <div class="about_txt_box">
                        <p><?php the_sub_field('about_left_text'); ?></p>
                    </div>
                    <div class="about_img_box">
                        <?php echo ($about_left_image) ? '<img src="'.$about_left_image["sizes"]["about-left-image"].'" alt="'.$about_left_image["alt"].'">' : '' ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="about_content_box box-right">
                    <div class="row">
                        <?php 
                                if( have_rows('about_right_images') ):
                                    // loop through the rows of data
                                    while ( have_rows('about_right_images') ) : the_row();
                                    $about_right_image = get_sub_field('about_right_image');
                            ?>
                                <div class="col-lg-6 col-md-6">
                                    <div class="about_img_box">
                                        <?php echo ($about_right_image) ? '<img src="'.$about_right_image["sizes"]["about-right-image"].'" alt="'.$about_right_image["alt"].'">' : '' ?>
                                    </div>
                                </div>
                                            <?php 
                                    endwhile;
                                else :
                                    // no rows found
                                endif;
                        ?>                        
                    </div>
                    <div class="about_txt_box">
                        <?php 
                                if( have_rows('about_right_text') ):
                                    // loop through the rows of data
                                    while ( have_rows('about_right_text') ) : the_row();
                            ?>
                                      <p> <?php  the_sub_field('about_right_paragraph'); ?></p>
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
    </div>
</section>