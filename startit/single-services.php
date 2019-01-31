<?php 
/** Template Name: Posts page */
if ( is_front_page() ){
    get_header();
}
else {
    get_header('posts');
}

 ?>
 <?php 
 if( have_posts() ):
     
     while( have_posts() ): the_post(); ?>
         <div class="main-wrapper">
             <section class="inner-page">
                 <div class="container">
                     <div class="singlepage-details-content">
                         <div class="service-details-img">
                             <?php the_post_thumbnail('portfolio-top-img');?>
                         </div>
                         <div class="service-details">
                             <div class="full_content">
                                 <h6><?php the_field('post_subtitle');?></h6>
                                 <h2 class="project_title"><?php the_title();?></h2>
                                 <?php the_content();?>
                             </div>
                         </div>
                     </div>

                    <?php 
                                 endwhile;
                             else :
                                 // no rows found
                             endif;
                     ?> 

                     <div class="service_post-inner">
                         <h2 class="project_title">Offers in the service</h2>
                         <div class="service_post-list">

                            <?php

                            $args = array('post_type' => 'services', 'posts_per_page' => 3);
                            $loop = new WP_Query($args);
                            if( $loop ->have_posts() ):
                                while( $loop->have_posts() ): $loop->the_post(); 
                                    $services_excerpt = get_the_excerpt();
                                    ?>

                                    <div class="service_post">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="service_post-img">
                                                    <?php the_post_thumbnail('services-post');?>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="service_post-content">
                                                    <div class="service_post-header">
                                                        <h4><a href="<?php the_permalink() ?>"><?php the_title();  ?></a></h4>
                                                    </div>
                                                    <div class="service_post-text">
                                                        <?php echo wp_trim_words($services_excerpt,34,'');?>
                                                    </div>
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

             <section id="team" class="team">
                 <div class="container">
                     <div class="row">
                         <div class="col-lg-9">
                             <div class="row">
                                <?php 

                                        if( have_rows('expert') ):
                                            // loop through the rows of data
                                            while ( have_rows('expert') ) : the_row();
                                                $expert_photo = get_sub_field('expert_photo');
                                    ?>
                                    <div class="col-lg-6">
                                        <div class="team_member">
                                            <?php echo ($expert_photo) ? '<img src="'.$expert_photo["sizes"]["thumbnail"].'" alt="'.$expert_photo["alt"].'">' : '' ?>
                                            <div class="team_member_inner">
                                                <h4><?php the_sub_field('expert_name');?></h4>
                                                <h6><?php the_sub_field('expert_position');?></h6>
                                                <p><?php the_sub_field('expert_description');?></p>
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
                         <div class="col-lg-3">
                             <div class="section-title">
                                 <h2><?php the_field('service_experts'); ?></h2>
                                 <p><?php the_field('service_experts_subtitle'); ?></p>
                             </div>
                         </div>
                     </div>
                 </div>
             </section>


             <section id="testimonials" class="testimonials testimonials2">
                 <div class="container">
                     <div class="section-title">
                         <h2>Service Testimonial</h2>
                         <p>Lorem ipsum dolor sit, consectet ipsum dolor sit</p>
                     </div>
                     <div class="owl-carousel owl-theme testimonial_carousel2">


                        <?php

                                                // WP_Query arguments
                                                $args = array(
                                                    'post_type'              => array( 'testimonial' ),
                                                    'posts_per_page'         => '-1',
                                                    'orderby'                => 'title',
                                                );

                                                // The Query
                                                $query = new WP_Query( $args );

                                                // The Loop
                                                if ( $query->have_posts() ) {
                                                    while ( $query->have_posts() ) {
                                                        $query->the_post();
                                                        // do something
                                                        ?>

                                    <div class="item">
                                        <div class="testibox">
                                            <div class="testi-img">
                                               <?php the_post_thumbnail('testimonial-img') ?>
                                            </div>
                                            <div class="testi-content">
                                                <ul>
                                                    <?php 
                                                            if( have_rows('stars') ):
                                                                // loop through the rows of data
                                                                while ( have_rows('stars') ) : the_row();
                                                        ?>
                                                        <li><?php the_sub_field('star');?></li>
                                                                        <?php 
                                                                endwhile;
                                                            else :
                                                                // no rows found
                                                            endif;
                                                    ?> 
                                                </ul>
                                                <p><?php the_content();  ?></p>
                                                <h4><?php the_title();  ?></h4>
                                                <h6><?php the_field('position');  ?></h6>
                                            </div>
                                        </div>
                                    </div>

                                                        <?php
                                                    }
                                                } else {
                                                    // no posts found
                                                }

                                                // Restore original Post Data
                                                wp_reset_postdata();
                        ?>


                     </div>
                 </div>
             </section>
<?php get_template_part('parts/contact'); ?>
<?php get_footer(); ?>