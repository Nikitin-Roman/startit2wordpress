<section id="blog" class="blog">
    <div class="container">
        <div class="section-title">
            <h2><?php the_sub_field('blog_title'); ?></h2>
            <p><?php the_sub_field('blog_subtitle'); ?></p>
        </div>
        <div class="row">
            <?php 
                $args = array('post_type' => 'post', 'posts_per_page' => 3);
                $loop = new WP_Query($args);

                if( $loop ->have_posts() ):
                    while( $loop->have_posts() ): $loop->the_post();
                ?>
                <div class="col-md-6 col-lg-4">
                    <div class="blog_post">
                        <div class="post_img">
                            <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('articles-image') ?></a>
                        </div>
                        <div class="post_content">
                            <div class="post_header">
                                <h2 class="post_title"><a href="<?php the_permalink() ?>"><?php the_title();  ?></a></h2>
                                <div class="read_more"><a href="<?php the_permalink() ?>"><?php the_field('excerpt_main_page') ?></a></div>
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
</section>