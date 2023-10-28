<?php

/**
 * The header for our theme
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package themeWedding
 */
?>
<!doctype html>

<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="icon" href="<?php echo get_template_directory_uri() . '/assets/src/img/favicon.png' ?>">

    <!--/Favicon-->
    <meta name="msapplication-TileColor" content="#4F6C8A">
    <meta name="theme-color" content="#4F6C8A">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <div id="page" class="site">

        <header id="masthead" class="site-header">
            <div class="site-header__wrap"> 
                <a class="logo" href="/"><h1>Tatiana & Andrés</h1></a>
                <?php
                if (has_nav_menu('menu-1')){ ?>
                    <div class="site__nav"> <?php wp_nav_menu(array('theme_location' => 'menu-1')); ?> </div> <?php
                } ?>
            </div>
        </header>

        <div id="content" class="site-content">