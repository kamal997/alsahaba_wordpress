<?php
/*
Template Name: About
*/
get_header();
?>

    <section class="welcome-section py-5 my-5">
        <div class="container text-center sth">
            <h2 class="section-title mb-4">مرحباً بكم في مسجد التقوى</h2>
            <p class="section-description mb-5 w-75">
                نحن منظمة مجتمعية إسلامية نسعى لتقديم الخدمات المتنوعة لإخواننا وأخواتنا المسلمين. نرحب بكم لأداء
                الصلوات الخمس والاستفادة من مرافقنا المختلفة.
            </p>

            <div class="row justify-content-center">
                <div class="col-lg-10 mb-4">
                    <div class="video-wrapper">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/hero.jpg" class="img-fluid rounded" alt="Mosque Image">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="info-card p-4 sth">
                        <h5 class="info-title">رؤيتنا</h5>
                        <p class="w-75">
                            نهدف إلى خدمة مجتمعنا المحلي وتعزيز روح التعاون والإيمان في أحيائنا.
                        </p>
                        <a href="#" class="read-more">اقرأ المزيد</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-card p-4 sth">
                        <h5 class="info-title">رسالتنا</h5>
                        <p class="w-75">
                            نسعى لنشر المعرفة الإسلامية وتعزيز الصلوات الجماعية لتحقيق التواصل والتآخي بين المسلمين.
                        </p>
                        <a href="#" class="read-more">اقرأ المزيد</a>
                    </div>
                </div>
            </div>
        </div>
    </section>



<?php get_footer(); ?>