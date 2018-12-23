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
        <title>Carrby - Agency Template</title>

        <!-- Favicon and Touch Icons -->
        <link href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" rel="shortcut icon" type="image/png">

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
                            <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="logo"></a>
                        </div>
                        <div class="nav-inner">
                            <div id="mobile-toggle" class="mobile-btn"></div>
                            <ul class="main-menu">
                                <li class="menu-item"><a class="active" href="<?php echo home_url(); ?>#slider">Home</a></li>
                                <li class="menu-item"><a href="<?php echo home_url(); ?>#services">Services</a></li>
                                <li class="menu-item"><a href="<?php echo home_url(); ?>#about">About Us</a></li>
                                <li class="menu-item"><a href="<?php echo home_url(); ?>#works">Portfolio</a></li>
                                <li class="menu-item"><a href="<?php echo home_url(); ?>#blog">Blog</a></li>
                                <li class="menu-item"><a href="<?php echo home_url(); ?>#contact">Contact</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>