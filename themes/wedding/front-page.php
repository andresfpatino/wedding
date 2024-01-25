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
                        <?php the_post_thumbnail('portada', array('class' => 'mainThumbnail', 'loading' => 'false' )); ?>
                        <h2><?php echo event_date(); ?></h2>
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
                            $thumbnail_left = get_field('thumbnail_left');
                            $thumbnail_middle = get_field('thumbnail_middle');
                            $thumbnail_right = get_field('thumbnail_right');  ?>
                            <img class="photo transform-left" src="<?php echo esc_url($thumbnail_left['sizes']['copyThumb']); ?>" width="<?php echo round($thumbnail_left['width'] / 2); ?>" height="<?php echo round($thumbnail_left['height'] / 2); ?>" alt="<?php echo esc_attr($thumbnail_left['alt']); ?>" loading="lazy" />
                            <img class="photo transform-middle" src="<?php echo esc_url($thumbnail_middle['sizes']['copyThumb']); ?>" width="<?php echo round($thumbnail_middle['width'] / 2); ?>" height="<?php echo round($thumbnail_middle['height'] / 2); ?>" alt="<?php echo esc_attr($thumbnail_middle['alt']); ?>" loading="lazy" />
                            <img class="photo transform-right" src="<?php echo esc_url($thumbnail_right['sizes']['copyThumb']); ?>" width="<?php echo round($thumbnail_right['width'] / 2); ?>" height="<?php echo round($thumbnail_right['height'] / 2); ?>" alt="<?php echo esc_attr($thumbnail_right['alt']); ?>" loading="lazy" />
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

                $startDateTimeCountdown = get_field('fecha_hora');
                $todayGet           = date('m/d/Y');
                $dateTimestamp1 = strtotime($todayGet);
                $dateTimestamp2 = strtotime($startDateTimeCountdown);

                if ($startDateTimeCountdown) : ?>
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
                        <div class="countdown--date-box last">
                            <strong id="seconds"></strong>
                            <span>Segundos</span>
                        </div>

                        <?php if (get_field('mensaje')) : ?>
                            <div class="countdown--message">
                                <?php echo get_field('mensaje'); ?>
                            </div>
                            <canvas id="my-canvas"></canvas>
                        <?php endif; ?>
                    </div> <?php
                endif; ?>

            </div>
        </div>

        <div id="memorias" class="gallery">
            <h2 class="gallery--title"><?php echo get_field('titulo_galeria'); ?></h2> <?php
            $images = get_field('galeria');
            if( $images ): ?>
                <div class="gallery--slide">
                    <?php foreach( $images as $image ): ?>
                        <a class="photo" href="<?php echo esc_url($image['sizes']['large']); ?>" data-pswp-width="<?php echo esc_attr($image['width']); ?>" data-pswp-height="<?php echo esc_attr($image['height']); ?>">
                            <img src="<?php echo esc_url($image['sizes']['gallery']); ?>" width="<?php echo round($image['width'] / 2); ?>" height="<?php echo round($image['height'] / 2); ?>" alt="<?php echo esc_attr($image['alt']); ?>" loading="lazy" />
                            <p class="caption"><?php echo esc_html($image['caption']); ?></p>
                        </a>
                    <?php endforeach; ?>
                </div>
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
                    <div class="rspv-content">
                        <?php echo get_field('contenido_asistencia'); ?>
                    </div>
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