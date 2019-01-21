<section id="works" class="works">
    <div class="container">
        <div class="section-title">
            <h2><?php the_sub_field('portfolio_title'); ?></h2>
            <p><?php the_sub_field('portfolio_subtitle'); ?></p>
        </div>
        <ul id="filters" class="clearfix text-center">
         <?php 
         $terms = get_terms( array(
    'hide_empty'  => 0,  
    'orderby'     => 'id',
    'order'       => 'DESC',
    'taxonomy'    => 'portfolio_category',
    'pad_counts'  => 1
) );

         if( $terms && ! is_wp_error($terms) ){
            echo "<ul>";
            foreach( $terms as $term ){
                echo "<li><span class='filter' data-filter='.$term->slug'>". $term->name ."</span></li>";

            }
            echo "</ul>";
         }
                     ?>
        </ul>

        <div id="portfoliolist">
            <div class="row">
                <?php 
                    $args = array('post_type' => 'portfolio', 'posts_per_page' => 8);
                    $loop = new WP_Query($args);

                    if( $loop ->have_posts() ):
                        while( $loop->have_posts() ): $loop->the_post();
                    ?>
                        <div class="col-md-4 col-lg-3                                        <?php $terms_list = wp_get_post_terms($post->ID, 'portfolio_category');

                                       foreach( $terms_list as $term ) {
                                        echo $term->slug . ' ';
                                       }

                                       ?>">
                            <div class="portfolio-wrapper"> 
                                <div class="works-img">
                                    <a href="<?php the_post_thumbnail_url('', "portfolio-slider-image"); ?>" data-fancybox="images">
                                        <img src="<?php the_post_thumbnail_url('', "portfolio-image"); ?>" alt="<?php the_title(); ?>">
                                    </a>
                                </div>
                                <div class="works-info">
                                    <div class="label-text">
                                        <h4><?php the_title();  ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <?php endwhile;
                        endif;
                        wp_reset_query();
                        ?>
            </div>
        </div>

    </div>
</section>