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
 		$portfolio_top_image = get_field('top_image');
  ?>
         <div class="main-wrapper">
         	<?php 
         	if( have_posts() ):
         	    
         	    while( have_posts() ): the_post(); ?>
             <section class="inner-page">
                 <div class="container">
                     <div class="singlepage-details-content">
                         <div class="portfolio-details-img">
                             <?php echo ($portfolio_top_image) ? '<img src="'.$portfolio_top_image["sizes"]["portfolio-top-img"].'" alt="'.$portfolio_top_image["alt"].'">' : '' ?>
                         </div>
                         <div class="portfolio-details">
                             <div class="full_content">
                             	<h6>
                                 <?php $terms = get_the_terms( $post->ID , 'portfolio_category', '<h6>', ' ', '</h6>' );
foreach ( $terms as $term ) {
  echo $term->slug . ' ';
} ?></h6>
                                 
                                 <?php the_title('<h2 class="project_title">','</h2>' ); ?>
                                 <?php the_content(); ?>
                             </div>
                             <div class="portfolio-content-img">
                             	<?php if( has_post_thumbnail() ): ?>    
                             	    <?php the_post_thumbnail('portfolio-left'); ?> 
                             	<?php endif; ?>
                             </div>
                         </div>
                     </div>
                 </div>
             </section>
             <section class="video-banner">
                 <div class="container">
                     <div class="video-content">Video presentation <span class="video_btn"><a class="fancybox-media" href="<?php the_field('video_link'); ?>"><ion-icon name="md-play"></ion-icon></a></span> About the project</div>
                 </div>
             </section>

             <section class="project_desc">
                 <div class="container">
                     <div class="section-title">
                         <h2><?php the_field('project_description_title'); ?></h2>
                         <p><?php the_field('project_description_subtitle'); ?></p>
                     </div>
                     <div class="project_desc_inner">
                         <div class="row">

                         	<?php 
                         	        if( have_rows('project_description_text') ):
                         	            // loop through the rows of data
                         	            while ( have_rows('project_description_text') ) : the_row();
                         	    ?>
                         	    <div class="col-md-6 col-lg-6">
                         	        <div class="desc_txt">
                         	            <?php the_sub_field('text_paragraph'); ?>
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

                 <div class="project_desc_bottom">
                     <div class="container">
                         <div class="project_info_grid">
                             <div class="info_grid">
                                 <h5>Client</h5>
                                 <p><?php the_field('client_name'); ?></p>
                             </div>
                             <div class="info_grid">
                                 <h5>Product</h5>
                                 <p><?php the_title(); ?></p>
                             </div>
                             <div class="info_grid">
                                 <h5>Destination</h5>
                                 <p><?php the_field('destination_country'); ?></p>
                             </div>
                             <div class="info_grid">
                                 <h5>Date</h5>
                                 <p><?php the_date('j F Y'); ?></p>
                             </div>
                             <div class="info_grid">
                                 <h5>Cost</h5>
                                 <p><?php the_field('cost_amount'); ?></p>
                             </div>
                         </div>
                     </div>
                 </div>
             </section>

             <section id="testimonials" class="testimonials testimonials1">
                 <div class="container">
                     <div class="owl-carousel owl-theme testimonial_carousel">

                        <?php 

                        $posts = get_field('testimonial_portfolio');
                        if( $posts ): ?>
                            <?php foreach( $posts as $post):  ?>
                                <?php setup_postdata($post); ?>

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

                                    <?php endforeach; ?>
                                    <?php wp_reset_postdata();  ?>
                                <?php endif; ?>


                     </div>
                 </div>
             </section>
               <?php endwhile; ?>
             <?php endif; ?>
</div>
             <?php get_template_part('parts/contact'); ?>
             <?php get_footer(); ?>