<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    $image = get_the_post_thumbnail();

    ?>
    <header class="header-post">
        <a href="<?php the_permalink(); ?>">
            <?php
            if ($image)
            {
                echo $image;
            }
            else
            {
                $id = rand(5, 100);
            ?>
                <img class="object-cover w-full" src="https://picsum.photos/id/<?php echo $id; ?>/200/150" alt="">
            <?php
            }
            ?>
        </a>
    </header>

    <div class="py-4 info-post">
        <h2 class="text-title4">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <?php
        echo wp_trim_words(get_the_excerpt(), 20);
        ?>

        <div class="inline-block w-full mt-2">
            <a href="<?php the_permalink(); ?>" class="link">
                <?php _e('Continue Reading', 'frontporchsolutions'); ?>
            </a>
        </div>
    </div>
</article>