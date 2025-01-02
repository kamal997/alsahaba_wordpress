<?php get_header(); ?>

<section class="recent-blogs py-5 my-5">
    <div class="container text-center sth">
        <h2 class="section-title mb-4">أحدث المقالات</h2>
        <p class="section-description mb-5 w-75">
            نسأل الله أن يمكننا من عيش حياة طيبة ونشر رسالة الإسلام. اقرأ مقالاتنا لتعزيز معرفتك عن الإسلام.
        </p>

        <div class="row g-3">
        <?php if (have_posts()): ?>
            <?php while (have_posts()):
                the_post(); ?>
                <div class="col-md-4">
                    <div class="blog-card">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('medium', ['class' => 'img-fluid rounded-top']); ?>
                                <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/noImg.jpg" alt="Blog Image" class="img-fluid rounded-top">
                                    <?php endif; ?>
                                    
                                    <div class="blog-card-body p-4">
                                        <h5 class="blog-title">
                                <?php
                                $title = get_the_title();
                                echo (mb_strlen($title) > 25) ? mb_substr($title, 0, 25) . '...' : $title;
                                ?>
                            </h5>
                            <p class="blog-description">
                                <?php
                                $excerpt = get_the_excerpt();
                                echo (mb_strlen($excerpt) > 35) ? mb_substr($excerpt, 0, 35) . '...' : $excerpt;
                                ?>
                            </p>
                        </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col-12">
                <p>لا توجد منشورات متاحة حاليًا.</p>
            </div>
        <?php endif; ?>

        </div>
    </div>
</section>


<nav class="pagination py-4">
    <div class="d-flex justify-content-between">
        <div class="previous">
            <?php previous_posts_link('&larr; Newer Posts'); ?>
        </div>
        <div class="next">
            <?php next_posts_link('Older Posts &rarr;'); ?>
        </div>
    </div>
</nav>
<?php get_footer(); ?>