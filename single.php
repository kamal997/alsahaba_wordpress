<?php get_header(); ?>

    <section class="welcome-section py-5 my-5">
        <div class="container text-center sth">
            <?php if (have_posts()):
                while (have_posts()):
                    the_post(); ?>
                    <h2 class="section-title mb-2"><?php echo get_the_title(); ?></h2>
                    <div class="video-wrapper">
                        <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail('full', ['class' => 'img-fluid rounded',  'alt' => get_the_title()]); ?>
                        <?php endif; ?>
                    </div>
                    <p class="section-description mb-5 w-75">
                            <?php the_content(); ?>
                    </p>
            <?php 
                endwhile;
                endif;
            ?>
        </div>
    </section>
<?php get_footer(); ?>