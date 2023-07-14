<?php

add_action('wp_loaded', 'fpsBaseTailwind_prefix_output_buffer_start');
function fpsBaseTailwind_prefix_output_buffer_start()
{
    ob_start("fpsBaseTailwind_prefix_output_callback");
}

add_action('shutdown', 'fpsBaseTailwind_prefix_output_buffer_end');
function fpsBaseTailwind_prefix_output_buffer_end()
{
    ob_end_flush();
}

function fpsBaseTailwind_prefix_output_callback($buffer)
{
    return preg_replace("%[ ]type=[\'\"]text\/(javascript|css)[\'\"]%", '', $buffer);
}


// Add `loading="lazy"` attribute to images output by the_post_thumbnail().
function fpsBaseTailwind_modify_post_thumbnail_html($html, $post_id, $post_thumbnail_id, $size, $attr)
{
    return str_replace('<img', '<img loading="lazy"', $html);
}
add_filter('post_thumbnail_html', 'fpsBaseTailwind_modify_post_thumbnail_html', 10, 5);
