<?php

/**
 * The template for displaying the footer
 * Contains the closing of the #content div and all content after.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package themeWedding
 */
?>

</div>


<footer class="site-footer">
    <div class="container">
        <div class="text-center copyright">
            <?php the_field('fps_copyright', 'option'); ?>
        </div>
    </div>
</footer>

</div>

<?php wp_footer(); ?>
</body>

</html>