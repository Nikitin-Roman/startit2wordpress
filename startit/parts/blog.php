<section id="blog" class="blog">
    <div class="container">
        <div class="section-title">
            <h2><?php the_sub_field('blog_title'); ?></h2>
            <p><?php the_sub_field('blog_subtitle'); ?></p>
        </div>
        <div class="row">
            <?php 
                    if( have_rows('blog_post') ):
                        // loop through the rows of data
                        while ( have_rows('blog_post') ) : the_row();
                        $post_image     = get_sub_field('post_image');
                ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="blog_post">
                            <div class="post_img">
                                <a href="<?php the_sub_field('post_url'); ?>"><?php echo ($post_image) ? '<img src="'.$post_image["sizes"]["articles-image"].'" alt="'.$post_image["alt"].'">' : '' ?></a>
                            </div>
                            <div class="post_content">
                                <div class="post_header">
                                    <h2 class="post_title"><a href="<?php the_sub_field('post_url'); ?>"><?php the_sub_field('post_name'); ?></a></h2>
                                    <div class="read_more"><a href="<?php the_sub_field('post_url'); ?>"><?php the_sub_field('post_link_name'); ?></a></div>
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
</section>