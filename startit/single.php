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
                                                <h4 class="post_cat">Category : <?php the_category(' '); ?></h4>
                                                <?php the_title('<h2 class="post_title">','</h2>' ); ?>
                                            </div>
                                            <div class="post_img">
                                                <?php if( has_post_thumbnail() ): ?>    
                                                    <?php the_post_thumbnail('articles-image'); ?> 
                                                <?php endif; ?>
                                            </div>
                                            <div class="post_content">
                                                <div class="full_content">
                                                    <?php the_content(); ?>
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
                                <div class="inner_posts">
                                <div class="row">

                                    <div class="col-md-6">
                                    <div class="inner-post prev_post">
                                        <?php
                                                        $nextPost = get_next_post();
                                                        $title_post = get_the_title($nextPost->ID);
                                                        $title_trim = wp_trim_words($title_post,4,'...');
                                                        $nextthumbnail = get_the_post_thumbnail($nextPost->ID, 'post-pagin'); ?>
                                        <?php next_post_link('%link', $nextthumbnail); ?>
                                        <div class="post_block">
                                            <?php next_post_link('%link', 'Previous Post'); ?>
                                            <h4><?php $nexttitle = next_post_link('%link', $title_trim); ?></h4>


                                                        
                                                        
                                                                    
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="inner-post next_post">
                                        <?php
                                                        $prevPost = get_previous_post();
                                                        $title_post = get_the_title($prevPost->ID);
                                                        $title_trim = wp_trim_words($title_post,4,'...');
                                                        $prevthumbnail = get_the_post_thumbnail($prevPost->ID, 'post-pagin'); ?>
                                        <?php previous_post_link('%link', $prevthumbnail); ?>
                                        <div class="post_block">
                                            <?php previous_post_link('%link', 'Next Post'); ?>
                                            <h4><?php previous_post_link('%link', $title_trim); ?>
</h4>
<?php   endif; ?>
                                    </div>
                                    </div>
                                    </div>

                                </div>
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
