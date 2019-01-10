
<div class="main-wrapper">

    <section id="services" class="services pt-10">
        <div class="container">
            <div class="section-title">
                <h2><?php the_sub_field('services_title'); ?></h2>
                <p><?php the_sub_field('services_subtitle'); ?></p>
            </div>
            <div class="row">
                <?php 
                        if( have_rows('services_items') ):
                            // loop through the rows of data
                            while ( have_rows('services_items') ) : the_row();
                ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="servicebox">
                            <div class="srv_desc">
                                <h5 class="count"><?php the_sub_field('service_item_number'); ?></h5>
                                <h4><a href="<?php the_sub_field('service_item_title_url'); ?>"><?php the_sub_field('service_item_title_text'); ?></a></h4>
                                <p><?php the_sub_field('service_item_desctiption'); ?></p>
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
    </section>