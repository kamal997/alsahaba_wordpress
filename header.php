<!doctype html>
<html dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <!-- Topbar start -->
	<div class="container-fluid shadow bg-white">
        <!-- Navbar -->
        <div class="container">
            <nav class="navbar navbar-light navbar-expand-lg py-3">
                <a href="<?php echo home_url(); ?>" class="navbar-brand">
					<img src="<?php echo get_template_directory_uri(); ?>/img/Logo.png" alt="<?php bloginfo('name'); ?>" width="125px" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <?php wp_nav_menu(array(
							'theme_location' => 'primary',
							'menu_class' => 'navbar-nav ms-lg-auto mx-xl-auto',
							'container' => false,
							'add_li_class' => 'nav-item nav-link'
					));?>
					<a class="btn btn-donate py-2 px-4 d-none d-xl-inline-block" href="#">تبرع</a>
                </div>
            </nav>
        </div>
    </div>