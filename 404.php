<?php get_header(); ?>

<div class="container text-center py-5">
    <h1 class="display-3 text-danger">404</h1>
    <h2 class="mb-4">الصفحة غير موجودة</h2>
    <p class="mb-4">
        عذرًا، لا يمكننا العثور على الصفحة التي تبحث عنها.
        ربما تم نقلها أو تمت إزالتها.
    </p>
    <a href="<?php echo home_url(); ?>" class="btn btn-primary">العودة إلى الصفحة الرئيسية</a>
</div>

<?php get_footer(); ?>