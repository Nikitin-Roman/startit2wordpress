<?php 
/** Template Name: Posts page */
if ( is_front_page() ){
    get_header();
}
else {
    get_header('posts');
}

 ?>

        <div class="main-wrapper">
            <section class="inner-page">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 col-lg-8 main-content">
                            <?php 
                            if( have_posts() ):
                                
                                while( have_posts() ): the_post(); ?>
                                    
                                    <div class="blog-list">
                                        <article class="blog_post post-box">
                                            <div class="post_header">
                                                <h4 class="post_cat">Category : <?php the_category(' '); ?></h4><a href="<?php the_permalink() ?>"><?php the_title('<h2 class="post_title">','</h2>' ); ?></a>
                                                
                                            </div>
                                            <div class="post_img">
                                                <?php if( has_post_thumbnail() ): ?>    
                                                    <?php the_post_thumbnail('articles-image'); ?> 
                                                <?php endif; ?>
                                            </div>
                                            <div class="post_content">
                                                <div class="full_content">
                                                    <?php the_excerpt(); ?>
                                                </div>

                                                <div class="post_footer">
                                                    <ul class="post_meta">
                                                        <li><span class="author"><?php echo get_avatar( 'nro91kh@gmail.com', $size, $default, $alt, $args ); ?> By <?php the_author_posts_link(); ?></span></li>
                                                        <li><span class="date">
                                                        <?php $text = get_the_date('j F, Y'); 
                                                            $url  = get_the_date('/Y/m/');  
                                                            echo get_archives_link( $url, $text, '' ); ?>
                                                        </span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                    </div>

                                <?php endwhile; ?>

                                                                     <?php   endif; ?>

                            <div class="pagination-div custom-pagin">
                                                           <?php
                        echo paginate_links( array(
                            'prev_text'    => '<i class="fa fa-angle-double-left"></i>',
                            'next_text'    => '<i class="fa fa-angle-double-right"></i>',
                            'type'         => 'list',
                        ) );
                     
                    ?>

                            </div>

                            </div>





                        <div class="col-md-5 col-lg-4 sidebar">
                            <?php get_sidebar(); ?>


                        </div>
                    </div>
                </div>
            </section>
<?php get_template_part('parts/contact'); ?>
<?php get_footer(); ?>

