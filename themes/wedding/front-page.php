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

acf_form_head();

get_header(); ?>

<div class="content__page"> <?php
    while (have_posts()) : the_post(); ?>

        <div class="intro">
            <div class="container"> <?php
                the_content();
                if ( has_post_thumbnail() ) { ?>
                    <div class="portrait">
                        <a href="#" class="modal-trigger">
                            <div class="play-icon">
                                <img alt="playIcon" src="data:image/png;base64,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">
                            </div>
                            <?php the_post_thumbnail('portada', array('class' => 'mainThumbnail')); ?>
                        </a>
                        <?php
                        $video = get_field('video');
                        if( $video) : ?>
                            <div class="modal-overlay" id="modalOverlay">
                                <div class="modal">
                                    <svg class="modal-close" id="closeModal" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0507 12L0 22.0507L1.94928 24L12 13.9493L22.0507 24L24 22.0507L13.9493 12L24 1.94928L22.0507 0L12 10.0507L1.94928 0L0 1.94928L10.0507 12Z" fill="black"/>
                                    </svg>
                                    <video id="video" loop="" playsinline="" preload="auto" poster="<?php echo get_the_post_thumbnail_url(); ?>">
                                        <source src="<?php echo $video ?>" type="video/mp4">
                                    </video>
                                </div>
                            </div> <?php
                        endif; ?>
                        <?php echo event_date( get_field('fecha') ); ?>
                    </div> <?php
                } ?>
            </div>
        </div>

        <div class="content-wedding">
            <div class="container-mid">
                <div class="copy">
                    <div class="copy--content">
                        <?php echo get_field('intro'); ?>
                    </div>
                    <div class="copy--thumbs">
                        <div class="copy--thumbs-wrap"> <?php
                            fps_get_Image(get_field('thumbnail_left'), 'photo transform-left');
                            fps_get_Image(get_field('thumbnail_middle'), 'photo transform-middle');
                            fps_get_Image(get_field('thumbnail_right'), 'photo transform-right'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="location">
            <div class="container-mid">
                <div class="frame">
                    <?php echo get_field('locacion'); ?>
                </div>
                <div class="frame">
                    <?php echo get_field('horario'); ?>
                </div>
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
                endif; ?>

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
                <div class="gallery--slide-navigation">
                    <span class="prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 48 48" fill="none"><path d="M13.9151 24.7059L13.3096 25.3372L12.7059 24.7059L13.3096 24.0746L13.9151 24.7059ZM14.5205 24.0746L21.3618 31.208L20.1509 32.4706L13.3096 25.3372L14.5205 24.0746ZM13.3096 24.0746L20.1509 16.9412L21.3618 18.2038L14.5205 25.3372L13.3096 24.0746ZM13.9151 23.8142L35.2941 23.8142L35.2941 25.5975L13.9151 25.5975L13.9151 23.8142Z" fill="#4F6C8A"></path></svg>
                    </span>
                    <span class="next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 48 48" fill="none"><path d="M34.0849 24.7059L34.6903 25.3372L35.2941 24.7059L34.6903 24.0746L34.0849 24.7059ZM33.4794 24.0746L26.6381 31.208L27.849 32.4706L34.6903 25.3372L33.4794 24.0746ZM34.6903 24.0746L27.849 16.9412L26.6381 18.2038L33.4794 25.3372L34.6903 24.0746ZM34.0849 23.8142L12.7058 23.8142L12.7058 25.5975L34.0849 25.5975L34.0849 23.8142Z" fill="#4F6C8A"></path></svg>
                    </span>
                </div>
            <?php endif; ?>
        </div>

        <div id="confirmacion" class="rspv">
            <div class="container">
                <div class="rspv__wrap">
                    <?php echo get_field('contenido_asistencia'); ?>
                </div>
            </div>
        </div>

        <div class="locations-section">
            <div class='acf-map'> <?php

                $args = array(
                    'post_type'      => 'location',
                    'posts_per_page' => -1,
                );

                $the_query = new WP_Query($args);
                if( $the_query->have_posts() ):
                    while ( $the_query->have_posts() ) : $the_query->the_post();

                        $location = get_field('address');

                        if( $location)  :  ?>
                            <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
                                <h4 class="marker-title"><?php the_title(); ?> </h4>
                                <p class="marker-address"> Casa 395 en el Km 4 vía Cristo Rey <br> Justo después del Arca de Noé.</p>
                                <a class="btn" href="https://www.google.com/maps/dir/current+location/Casa+Campestre+Villa+Mariana,+Casa+395+en+el+Km+4+v%C3%ADa+Cristo+Rey,+Cali,+Valle+del+Cauca/" target="_blank">¿Cómo llegar? Maps lo sabe!</a>
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