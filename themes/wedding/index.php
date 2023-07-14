<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package themeWedding
 */

get_header();

global $wp_query;
?>

<?php get_template_part('template-parts/hero', 'content'); ?>
<!-- /Hero Header -->

<div class="py-8 index__container bg-slate-200">
    <div class="container mx-auto">
        <!-- List Post -->
        <div class="grid grid-cols-1 gap-6 px-4 md:grid-cols-2 lg:grid-cols-3">
            <?php while (have_posts()) : the_post(); ?>

                <!-- Item Post -->
                <?php echo get_template_part('template-parts/items/item', 'post'); ?>
                <!-- Item Post -->

            <?php endwhile; ?>
        </div>
        <!-- List Post -->

        <!-- Pagination -->
        <?php if (function_exists('themeWedding__pagination')) : ?>
            <div class="pagination">
                <?php themeWedding__pagination($wp_query->max_num_pages, "", $paged); ?>
            </div>
        <?php endif; ?>
        <!-- End Pagination -->
    </div>
</div>


<?php
get_footer();
