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

        <div id="informacion" class="location">
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
                        <svg class="heart" width="59" height="52" viewBox="0 0 59 52" fill="none"><path d="M54.3594 4.64058C48.1721 -1.54686 38.1404 -1.54686 31.953 4.64058C30.5983 5.99536 28.4016 5.99536 27.047 4.64058C20.8595 -1.54686 10.8279 -1.54686 4.64049 4.64058C-1.54683 10.8279 -1.54683 20.8596 4.64049 27.047L7.09364 29.5L28.5655 50.9718C29.0815 51.488 29.9184 51.488 30.4344 50.9718L51.9064 29.5L54.3594 27.047C60.5469 20.8596 60.5469 10.8279 54.3594 4.64058Z" fill="#8FA99D"/></svg>
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

        <div id="memorias" class="gallery">
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
        </div>   <?php 

        $args = array(
            'post_type'      => 'location',
            'posts_per_page' => -1,
        );

        $the_query = new WP_Query($args); ?>


        <h3>¿Cómo llegar? Maps lo sabe!</h3>
        <div class="locations-section">
            <div class='acf-map'> <?php 
                if( $the_query->have_posts() ):
                    while ( $the_query->have_posts() ) : $the_query->the_post();
            
                        $location = get_field('address');
            
                        if( $location)  : ?>    
                            <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">   
                                <h4 class="marker-title"><?php the_title(); ?> </h4>
                                <p class="marker-address"><?php echo $location['address']; ?></p>
                                <a href="https://www.google.com/maps/dir/Casa+Campestre+Villa+Mariana,+Casa+395+en+el+Km+4+v%C3%ADa+Cristo+Rey,+Cali,+Valle+del+Cauca/''/@3.4294833,-76.6045271,13z/data=!3m1!4b1!4m14!4m13!1m5!1m1!1s0x8e30a43b840a09e5:0x2a5d65d6482820ea!2m2!1d-76.563349!2d3.4293756!1m5!1m1!1s0x8e30a43b840a09e5:0x2a5d65d6482820ea!2m2!1d-76.563349!2d3.4293756!3e0?entry=ttu" target="_blank">¿Como llegar?</a>
                            </div> <?php 
                        endif; 
                    endwhile; wp_reset_query(); 
                endif; ?>
            </div>
        </div>  <?php
    endwhile; ?>
     
</div>
<?php
get_footer();