
<div class="main-wrapper">

    <section id="services" class="services pt-10">
        <div class="container">
            <div class="section-title">
                <h2><?php the_sub_field('services_title'); ?></h2>
                <p><?php the_sub_field('services_subtitle'); ?></p>
            </div>
            <div class="row">


                <?php

                $args = array('post_type' => 'services', 'posts_per_page' => 3);
                $loop = new WP_Query($args);
                $i=1;
                if( $loop ->have_posts() ):
                    while( $loop->have_posts() ): $loop->the_post(); ?>

                        <div class="col-lg-4 col-md-6">
                            <div class="servicebox">
                                <div class="srv_desc">
                                    <h5 class="count"><?php if ($i<10) {$format = '0%d';}
                                    else $format = '%d';
                                        echo sprintf($format, $i); $i++ ?></h5>
                                    <h4><a href="<?php the_permalink() ?>"><?php the_title();  ?></a></h4>
                                    <p><?php the_excerpt(); ?></p>
                                </div>
                            </div>
                        </div>

                    <?php endwhile;
                endif;
                wp_reset_query();
                ?>
            </div>
        </div>
    </section>