<?php
/*
Template Name: Activities
*/
get_header();
?>

<section class="services-section py-5 my-5">
    <div class="container text-center sth">
        <h2 class="section-title mb-4">سر على نهج الإسلام</h2>
        <p class="section-description mb-5 w-75">
            كن جزءًا من مجتمعنا وسر على الطريق القويم. اكتشف تعاليم الإسلام وعيش في سلام وسكينة.
        </p>

        <div class="row g-3">
            <?php 
                // Definiere die Abfrageparameter
                $args = array(
                    'post_type'      => 'activitie',
                    'posts_per_page' => 6 // Zeige maximal 6 Beiträge
                );

                $the_query = new WP_Query($args);

                // Überprüfe, ob Beiträge verfügbar sind
                if ($the_query->have_posts()):  
                    while ($the_query->have_posts()):
                        $the_query->the_post(); 
            ?>
                <div class="col-lg-6" style="height: 280px;">
                    <div class="service-card p-4 text-center sth" style="height: 100%;">
                        <div class="icon-circle mb-3">
                            <i class="bi <?php echo esc_attr(get_post_meta($post->ID, '_activitie_icon', true)); ?>" style="font-size: 2rem;"></i>
                        </div>
                        
                        <h5 class="service-title"><?php echo esc_html(get_the_title()); ?></h5>
                        <p class="w-75"><?php echo wp_kses_post(get_the_content()); ?></p>
                    </div>
                </div>
            <?php 
                    endwhile;
                    wp_reset_postdata();  
                else: 
            ?>
                <div class="col-12">
                    <p>لا توجد نشاطات متاحة حاليًا.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
