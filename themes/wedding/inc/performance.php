<?php

add_action('wp_loaded', 'themeWedding_prefix_output_buffer_start');
function themeWedding_prefix_output_buffer_start()
{
    ob_start("themeWedding_prefix_output_callback");
}

add_action('shutdown', 'themeWedding_prefix_output_buffer_end');
function themeWedding_prefix_output_buffer_end()
{
    ob_end_flush();
}

function themeWedding_prefix_output_callback($buffer)
{
    return preg_replace("%[ ]type=[\'\"]text\/(javascript|css)[\'\"]%", '', $buffer);
}