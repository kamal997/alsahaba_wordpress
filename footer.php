<footer class="subscribe-footer pt-5 mt-5">
    <div class="container text-center">
        <!-- Subscribe Section -->
        <h2 class="footer-title">اشترك الآن</h2>
        <p class="footer-description my-5">
            كن أول من يحصل على أحدث المعلومات عن الإسلام، بالإضافة إلى النصائح والتحديثات والعروض المميزة.
        </p>

        <div class="subscribe-form d-flex justify-content-center my-5">
            <input type="email" class="form-control email-input" placeholder="أدخل بريدك الإلكتروني" aria-label="Email">
            <button class="btn btn-subscribe">اشترك</button>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom my-5">

            <a class="navbar-brand" href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/img/Logo.png" alt="<?php bloginfo('name'); ?>" width="125px" />
            </a>
            <p class="footer-copyright">
                &copy; <?php echo __("جميع الحقوق محفوظة لمسجد الصحابة ", "your-text-domain"); echo date("Y"); ?>
            </p>
            <div class="footer-social-icons">
                <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                <a href="#" class="social-icon"><i class="bi bi-twitter"></i></a>
                <a href="#" class="social-icon"><i class="bi bi-linkedin"></i></a>
                <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</div>
</body>

</html>