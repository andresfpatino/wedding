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
   
    <?php while (have_posts()) : the_post(); ?>
        <div class="intro"> 
            <div class="container"> <?php
                the_content(); 
                if ( has_post_thumbnail() ) { ?>
                    <div class="portrait"> <?php 
                        the_post_thumbnail('large', array('class' => 'mainThumbnail'));
                        echo event_date( get_field('fecha') ); ?>
                    </div> <?php 
                } ?>
                <div class="copy">
                    <?php echo get_field('intro'); ?>
                </div>
            </div>
        </div>

        <div class="location">
            <div class="container relative">
                <?php fps_get_Image(get_field('thumbnail_left'), 'photo transform-left'); ?>
                <div class="frame">
                    <?php echo get_field('locacion'); ?>
                </div>
                <?php fps_get_Image(get_field('thumbnail_right'), 'photo transform-right'); ?>
            </div>
        </div>

        <div class="countdown">
            <div class="container">
                <h2 class="countdown--title"><?php echo get_field('titulo_countdown'); ?></h2> <?php 

                $startDateCountdown = get_field('fecha');
                $todayGet           = date('m/d/Y');
                $dateTimestamp1 = strtotime($todayGet);
                $dateTimestamp2 = strtotime($startDateCountdown);

                if ($startDateCountdown) : ?>
                    <div class="countdown--date" id="countdown">
                        <div class="countdown--date-box">
                            <strong id="days"></strong>
                            <span>Días</span>
                        </div>
                        <div class="countdown--date-box">
                            <strong id="hours"></strong>
                            <span>Horas</span>
                        </div>
                        <div class="countdown--date-box">
                            <strong id="minutes"></strong>
                            <span>Minutos</span>
                        </div>
                        <div class="countdown--date-box">
                            <strong id="seconds"></strong>
                            <span>Segundos</span>
                        </div>
                    </div> <?php 
                endif;

                $link = get_field('boton_calendario');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
            </div>
        </div>

        <div class="gallery">
            <h2 class="gallery--title"><?php echo get_field('titulo_galeria'); ?></h2> <?php 
            $images = get_field('galeria');
            if( $images ): ?>
                <ul class="gallery--slide">
                    <?php foreach( $images as $image ): ?>
                        <li class="photo">
                            <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <p class="caption"><?php echo esc_html($image['caption']); ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>

        <div id="confirmacion" class="rspv">
            <div class="container">
                <?php echo get_field('contenido_asistencia'); ?>
            </div>
        </div>

    <?php endwhile; ?>
     
</div>
<?php
get_footer();