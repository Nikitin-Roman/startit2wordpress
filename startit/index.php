        <?php
        	/** Template Name: Landing Page */
        ?>
        <?php

        // check if the flexible content field has rows of data
        if( have_rows('page_builder') ):

             // loop through the rows of data
            while ( have_rows('page_builder') ) : the_row();

  		         if( get_row_layout() == 'header_section' ):
  								 	get_header();
  		         endif;

                if( get_row_layout() == 'slider_section' ):
       						 	get_template_part('parts/slider'); 
                endif;

								if( get_row_layout() == 'services_section' ):
									 	get_template_part('parts/services');
								endif;

								if( get_row_layout() == 'about_section' ):
									 	get_template_part('parts/about');
								endif;
								
								if( get_row_layout() == 'portfolio_section' ):
									 	get_template_part('parts/works');
								endif;
								
								if( get_row_layout() == 'blog_section' ):
									 	get_template_part('parts/blog');
								endif;
								
								if( get_row_layout() == 'contact_section' ):
									 	get_template_part('parts/contact');
								endif;

								if( get_row_layout() == 'footer_section' ):
									 	get_footer();
								endif;
								
            endwhile;

        else :

            // no layouts found

        endif;

        ?>


