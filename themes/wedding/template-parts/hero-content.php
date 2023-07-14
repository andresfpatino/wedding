<!-- Hero Header-->
<div class="flex items-center h-48 bg-gray-100 header__inside interpage">
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center hero">
            <!--Breadcrumbs-->
            <div class="flex justify-center w-full p-0">
                <?php get_template_part('template-parts/content', 'breadcrumbs'); ?>
            </div>
            <!--/Breadcrumbs-->
            <?php
            if (is_home())
            {
                echo '<h1 class="text-title3 md:text-title2">Blog</h1>';
                the_field('description_blog', 'option');
            }
            else
            {
                if (!is_front_page())
                {
                    the_title('<h1 class="text-title3 md:text-title2">', '</h1>');
                    while (have_posts()) : the_post();
                        if (has_excerpt())
                        {
                            the_excerpt();
                        }
                    endwhile;
                }
            }
            ?>
        </div>
    </div>
</div>
<!-- End Hero Header -->