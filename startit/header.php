<?php 
    $favicon = get_sub_field('favicon');
    $img_logo = get_field('site_logo', 'option');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <!-- Meta Tags -->
        <meta charset="<?php bloginfo('charset') ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <meta name="description" content="Carrby - Agency Template">
        <meta name="author" content="">

        <!-- Page Title -->
        <title><?php the_sub_field('header_title'); ?></title>

        <!-- Favicon and Touch Icons -->
        <link href="<?php echo $favicon[url]; ?>" rel="shortcut icon" type="image/png">

        <!-- Lead Style -->
        <?php wp_head(); ?>
    </head>

    <body>
        <!-- Start Header -->

        <header id="header" class="header">
            <div class="navigation">
                <div class="container">
                    <nav id="flexmenu">
                        <div class="logo">
                            <a href="<?php the_field('site_logo_link', 'option'); ?>"><?php echo ($img_logo) ? '<img src="'.$img_logo["sizes"]["logo-size"].'" alt="'.$img_logo["alt"].'">' : '' ?></a>
                        </div>
                        <div class="nav-inner">
                            <div id="mobile-toggle" class="mobile-btn"></div>
                            <?php wp_nav_menu( array(
                                'theme_location'  => 'top',
                                'menu'            => '',
                                'container'       => '',
                                'container_class' => '',
                                'container_id'    => '',
                                'menu_class'      => 'main-menu',
                                'menu_id'         => '',
                                'echo'            => true,
                                'fallback_cb'     => 'wp_page_menu',
                                'before'          => '',
                                'after'           => '',
                                'link_before'     => '',
                                'link_after'      => '',
                                'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
                                'depth'           => 0,
                                'walker'          => '',
                            ) );?>
                        </div>
                    </nav>
                </div>
            </div>
        </header>