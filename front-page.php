<?php get_header(); ?>

                    <!-- HERO -->
    <section class="hero py-5">
        <div class="background-overlay"></div>
        <div class="container z-3 sth">
            <h1 class="py-4">طريقك إلى الطمأنينة والإيمان</h1>
            <p class="py-4 w-75">أهلاً وسهلاً بكم في مسجد الصحابة, حيث يجتمع الإيمان والسكينة في أجواء روحانية مميزة.
            </p>
            <a href="#ACTIVITIES" class="btn btn-hero">اكتشف المزيد عن أنشطتنا</a>
        </div>

        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . "prayer_times";

        $today = date("Y-m-d");
        $prayer_times = $wpdb->get_row("SELECT * FROM $table_name WHERE date = '$today'");

        if ($prayer_times) {
            echo "<div class='prayer-times z-3'>";

            echo "<div class='prayer-time'>";
            echo "<h5>الفجر</h5>";
            echo "<p>" . date("H:i", strtotime($prayer_times->fajr)) . "</p>";
            echo "</div>";

            echo "<div class='prayer-time'>";
            echo "<h5>الشروق</h5>";
            echo "<p>" . date("H:i", strtotime($prayer_times->sunrise)) . "</p>";
            echo "</div>";

            echo "<div class='prayer-time'>";
            echo "<h5>الظهر</h5>";
            echo "<p>" . date("H:i", strtotime($prayer_times->dhuhr)) . "</p>";
            echo "</div>";

            echo "<div class='prayer-time'>";
            echo "<h5>العصر</h5>";
            echo "<p>" . date("H:i", strtotime($prayer_times->asr)) . "</p>";
            echo "</div>";

            echo "<div class='prayer-time'>";
            echo "<h5>المغرب</h5>";
            echo "<p>" . date("H:i", strtotime($prayer_times->maghrib)) . "</p>";
            echo "</div>";

            echo "<div class='prayer-time'>";
            echo "<h5>العشاء</h5>";
            echo "<p>" . date("H:i", strtotime($prayer_times->isha)) . "</p>";
            echo "</div>";

            echo "</div>";


            } else {
                echo "لا توجد بيانات متاحة لهذا اليوم.";
            }
        ?>
    </section>

                    <!-- WELCOME -->
    <section class="welcome-section py-5 my-5">
        <div class="container text-center sth">
            <h2 class="section-title mb-4">مرحباً بكم في مسجد الصحابة</h2>
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

            <div class="row g-3">
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

                    <!-- ACTIVITIES -->
    <section class="services-section py-5 my-5" id="ACTIVITIES">
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

                    <!-- PILLARS -->
    <section class="pillars-section py-5 my-5">
        <div class="container">
            <div class="row align-items-center">
                <!-- Image Column -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/image 3.jpg" class="img-fluid rounded" alt="Mosque">
                </div>

                <!-- Content Column -->
                <div class="col-lg-6">
                    <h2 class="section-title mb-4">أركان الإسلام</h2>
                    <p class="section-description mb-5">
                        تمسك بهذه الأركان الأساسية للإسلام، فهي طريقك إلى الجنة. نسأل الله أن يهديك إلى الطريق المستقيم.
                    </p>
					<div class="container">
						<div class="row g-5">
							<div class="col-6">
								<div class="pillar-item d-flex align-items-center">
									<div class="pillar-number">1</div>
									<div>
										<h5 class="pillar-title">الشهادتان</h5>
										<p class="pillar-text">الإيمان بأن لا إله إلا الله وأن محمدًا رسول الله.</p>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="pillar-item d-flex align-items-center">
									<div class="pillar-number">2</div>
									<div>
										<h5 class="pillar-title">الصلاة </h5>
										<p class="pillar-text">العبادة اليومية التي تقربنا من الله خمس مرات في اليوم.</p>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="pillar-item d-flex align-items-center">
									<div class="pillar-number">3</div>
									<div>
										<h5 class="pillar-title">الصوم</h5>
										<p class="pillar-text">شهر رمضان هو وقت الصيام والتقرب إلى الله.</p>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="pillar-item d-flex align-items-center">
									<div class="pillar-number">4</div>
									<div>
										<h5 class="pillar-title">الزكاة</h5>
										<p class="pillar-text">إخراج جزء من أموالك لمساعدة المحتاجين وتطهير النفس.</p>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="pillar-item d-flex align-items-center">
									<div class="pillar-number">5</div>
									<div>
										<h5 class="pillar-title">الحج</h5>
										<p class="pillar-text">رحلة الإيمان إلى بيت الله الحرام لمن استطاع إليه سبيلًا.</p>
									</div>
								</div>
							</div>
						</div>
					</div>	
                </div>
            </div>
        </div>
    </section>
    
                    <!-- DONATE -->
    <section class="donate-section py-5 my-5">
        <div class="container text-center sth">
            <h2 class="section-title mb-4">تبرع من أجل الإنسانية</h2>
            <p class="section-description mb-5 w-75">
                نسأل الله أن يمنحنا الفرصة لمساعدة العائلات المحتاجة، وتوفير الأمان والرعاية الصحية لهم عندما تكون
                حياتهم في خطر.
            </p>


        </div>
        <div class="container text-center">
           
        
            <div class="row justify-content-center">
                <?php 
                    // Definiere die Abfrageparameter
                    $args = array(
                        'post_type'      => 'donate',
                        'posts_per_page' => 6 // Zeige maximal 6 Beiträge
                    );

                    $the_query = new WP_Query($args);

                    // Überprüfe, ob Beiträge verfügbar sind
                    if ($the_query->have_posts()):  
                        while ($the_query->have_posts()):
                            $the_query->the_post(); 
                ?>  


                    <div class="col-md-4 sth">
                        <div class="progress-circle" style="--percentage: <?php echo esc_attr(get_post_meta($post->ID, '_donate_percentage', true)); ?>;">
                            <div class="circle">
                                <span><?php echo esc_attr(get_post_meta($post->ID, '_donate_percentage', true)); ?>%</span>
                            </div>
                        </div>
                        <h5 class="mt-3"><?php echo get_the_title(); ?></h5>
                    </div>

                <?php 
                        endwhile;
                        wp_reset_postdata();  
                    else: 
                ?>
                    <div class="col-12">
                        <p>لا توجد تبرعات متاحة حاليًا.</p>
                    </div>
                <?php endif; ?>
            </div>

            <button class="btn btn-donate mt-5">تبرع الآن</button>
        </div>
    </section>

                    <!-- BLOGS -->
    <section class="recent-blogs py-5 my-5">
        <div class="container text-center sth">
            <h2 class="section-title mb-4">أحدث المقالات</h2>
            <p class="section-description mb-5 w-75">
                نسأل الله أن يمكننا من عيش حياة طيبة ونشر رسالة الإسلام. اقرأ مقالاتنا لتعزيز معرفتك عن الإسلام.
            </p>

            <div class="row g-3">
            <?php
            $recent_posts_query = new WP_Query([
                'posts_per_page' => 3,
                'post_status' => 'publish', 
            ]);

            if ($recent_posts_query->have_posts()): ?>
                <?php while ($recent_posts_query->have_posts()):
                    $recent_posts_query->the_post(); ?>
                    <div class="col-md-4">
                        <div class="blog-card">
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
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); // إعادة ضبط بيانات الاستعلام الافتراضي ?>
            <?php else: ?>
                <div class="col-12">
                    <p>لا توجد منشورات متاحة حاليًا.</p>
                </div>
            <?php endif; ?>

            </div>
        </div>
    </section>

<?php get_footer(); ?>