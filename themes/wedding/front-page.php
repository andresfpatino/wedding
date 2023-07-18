<?php

/**
 * The template for displaying all pages
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package themeWedding
 */

get_header(); ?>


<div class="content__page">
    <div class="container">
       
        <?php while (have_posts()) : the_post(); ?>
            <?php the_post_thumbnail(); ?>
            <?php the_content(); ?>


            <?php echo get_field('intro'); ?>

            <?php echo get_field('locacion'); ?>

            <?php fps_get_Image(get_field('thumbnail_left')); ?>
            <?php fps_get_Image(get_field('thumbnail_right')); ?>
            

            <h2><?php echo get_field('titulo_countdown'); ?></h2>
            <p><?php echo get_field('fecha'); ?></p>


            <?php 
            $link = get_field('boton_calendario');
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>

            <h2><?php echo get_field('titulo_galeria'); ?></h2>


            <?php 
            $images = get_field('galeria');
            if( $images ): ?>
                <ul>
                    <?php foreach( $images as $image ): ?>
                        <li>
                            <a href="<?php echo esc_url($image['url']); ?>">
                                <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            </a>
                            <p><?php echo esc_html($image['caption']); ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>


            <?php echo get_field('contenido_asistencia'); ?>


        <?php endwhile; ?>
     
       
    </div>
</div>
<?php
get_footer();