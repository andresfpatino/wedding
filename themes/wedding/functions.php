<?php

/**
 * fpsBaseTailwind First functions and definitions
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package fpsBaseTailwind
 */


/** Setup **/
require_once 'inc/setup.php';

/** Enqueue scripts and styles.**/
require_once 'inc/scripts.php';

/** ShortCode Theme **/
require_once 'inc/shortcodes.php';

/**  Custom Pagination Function **/
require_once 'inc/pagination.php';

/**  Social Shared Icons Function **/
require_once 'inc/shared-social.php';

/** Author Fields **/
require_once 'inc/author-fields.php';

/** Yoast Meta Description and page titles **/
require_once 'inc/yoast-meta-description.php';

/** ACF Custom functions **/
require_once 'inc/functions/custom-functions.php';

/** Performance **/
require_once 'inc/performance.php';
