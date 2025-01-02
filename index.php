<?php get_header(); ?>

<div class="container py-5">
    <?php if (have_posts()): ?>
        <?php while (have_posts()):
            the_post(); ?>
            <div class="content"> 
                <div class="page-content">
                    <?php the_content(); ?>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <div class="text-center">
            <p>لا يوجد محتوى لعرضه.</p>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>