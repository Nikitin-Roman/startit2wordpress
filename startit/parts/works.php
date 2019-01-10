<section id="works" class="works">
    <div class="container">
        <div class="section-title">
            <h2><?php the_sub_field('portfolio_title'); ?></h2>
            <p><?php the_sub_field('portfolio_subtitle'); ?></p>
        </div>

        <ul id="filters" class="clearfix text-center">
            <?php 
                    if( have_rows('portfolio_group') ):
                        // loop through the rows of data
                        while ( have_rows('portfolio_group') ) : the_row();
                ?>
                          <li><span class="filter active" data-filter="<?php the_sub_field('group_attribute'); ?>"><?php the_sub_field('group_name'); ?></span></li>
                <?php 
                        endwhile;
                    else :
                        // no rows found
                    endif;
            ?>
        </ul>

        <div id="portfoliolist">
            <div class="row">
                <?php 
                        if( have_rows('portfolio_item') ):
                            // loop through the rows of data
                            while ( have_rows('portfolio_item') ) : the_row();
                                $portfolio_image = get_sub_field('portfolio_item_image');
                    ?>
                        <div class="col-md-4 col-lg-3 <?php the_sub_field('include_groups'); ?>">
                            <div class="portfolio-wrapper"> 
                                <div class="works-img">
                                    <a href="<?php echo $portfolio_image["sizes"]["portfolio-slider-image"]; ?>" data-fancybox="images">
                                        <?php echo ($portfolio_image) ? '<img src="'.$portfolio_image["sizes"]["portfolio-image"].'" alt="'.$portfolio_image["alt"].'">' : '' ?>
                                    </a>
                                </div>
                                <div class="works-info">
                                    <div class="label-text">
                                        <h4><?php the_sub_field('portfolio_item_name'); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php 
                            endwhile;
                        else :
                            // no rows found
                        endif;
                ?>

            </div>
        </div>
    </div>
</section>