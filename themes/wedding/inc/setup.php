<?php
if (!function_exists('themeWedding')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function themeWedding(){
        /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on Inspect It First, use a find and replace
        * to change 'weddingTheme' to the name of your theme in all the template files.
        */
        load_theme_textdomain('themeWedding', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

            /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
        add_theme_support('title-tag');

        /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
        add_theme_support('post-thumbnails');

        register_nav_menus(array(
            'menu-1' => esc_html__('Header', 'weddingTheme'),
            'menu-2' => esc_html__('Footer', 'weddingTheme'),
        ));

        /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        /*
        * New size images
        */
        add_image_size( 'portada', 700, 520, true );
        add_image_size( 'gallery', 420, 510, true );
        add_image_size( 'copyThumb', 312, 373, true );

    }
endif;
add_action('after_setup_theme', 'themeWedding');


// Disable Guteneberg
add_filter('use_block_editor_for_post', '__return_false');


// Remove type in style and script
add_action(
    'after_setup_theme',
    function ()
    {
        add_theme_support('html5', ['script', 'style']);
    }
);


/**
 * This function builds the structure to list the social network icons.
 *
 * when calling the function the attribute is the field where the social networks are related.
 */

function themeWedding__get_social_icons()
{
    if (have_rows('social_icons', 'option')) :
        echo '<div class="social-icons">';
        echo '<ul>';
        while (have_rows('social_icons', 'option')) : the_row();
            $social = get_sub_field('social_icon');
            echo '<li>
                        <a href="' . get_sub_field('social_profile') . '" target="_blank" data-linktype="social" data-socialnetwork="' . $social['value'] . '">
                            <i class="icon-' . $social['value'] . '--d"></i>
                        </a>
                    </li>';
        endwhile;
        echo '</ul>';
        echo '</div>';
    endif;
}
