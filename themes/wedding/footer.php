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
        <div class="copyright">
            <a class="logo" href="/">Tatiana & Andrés</a>
            <div class="copy">
                <?php the_field('pie_de_pagina'); ?>
            </div>
        </div>
    </div>
</footer>

</div>

<?php wp_footer(); ?>
</body>

</html>