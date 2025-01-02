<?php
function alsahaba_theme_setup()
{
    // Add default WordPress supports
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('automatic-feed-links');
    add_theme_support('editor-styles');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'alsahaba'),
        'footer' => __('Footer Menu', 'alsahaba')
    ));
}
add_action('after_setup_theme', 'alsahaba_theme_setup');

function enqueue_custom_styles_and_scripts()
{
    // Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3');

    // Font Awesome CSS
    wp_enqueue_style('font-awesome', 'https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css', array(), '5.15.4');

    // Eigene CSS-Datei (falls vorhanden)
    wp_enqueue_style('theme-style', get_stylesheet_uri());

}

add_action('wp_enqueue_scripts', 'enqueue_custom_styles_and_scripts');



function alsahaba_register_widget_areas()
{
    // Register widget areas
    register_sidebar(array(
        'name' => __('Sidebar', 'alsahaba'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in your sidebar.', 'alsahaba'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Footer', 'alsahaba'),
        'id' => 'footer-1',
        'description' => __('Add widgets here to appear in your footer.', 'alsahaba'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'alsahaba_register_widget_areas');

function alsahaba_cleanup_wp_head()
{
    // Remove unnecessary links from wp_head
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'feed_links', 2);
}
add_action('init', 'alsahaba_cleanup_wp_head');

function themosque_custom_logo_setup()
{
    // Custom logo setup
    $defaults = array(
        'height' => 100,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'themosque_custom_logo_setup');


/**
 * Register a custom post type called "activitie".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpdocs_codex_activitie_init() {
	$labels = array(
		'name'                  => _x( 'activities', 'Post type general name', 'textdomain' ),
		'singular_name'         => _x( 'activitie', 'Post type singular name', 'textdomain' ),
		'menu_name'             => _x( 'activities', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar'        => _x( 'activitie', 'Add New on Toolbar', 'textdomain' ),
		'add_new'               => __( 'Add New', 'textdomain' ),
		'add_new_item'          => __( 'Add New activitie', 'textdomain' ),
		'new_item'              => __( 'New activitie', 'textdomain' ),
		'edit_item'             => __( 'Edit activitie', 'textdomain' ),
		'view_item'             => __( 'View activitie', 'textdomain' ),
		'all_items'             => __( 'All activities', 'textdomain' ),
		'search_items'          => __( 'Search activities', 'textdomain' ),
		'parent_item_colon'     => __( 'Parent activities:', 'textdomain' ),
		'not_found'             => __( 'No activities found.', 'textdomain' ),
		'not_found_in_trash'    => __( 'No activities found in Trash.', 'textdomain' ),
		'featured_image'        => _x( 'activitie Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'activitie archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into activitie', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this activitie', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter activities list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'activities list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'activities list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'activitie' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 4,
        'menu_icon'          => 'dashicons-book',
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
	);

	register_post_type( 'activitie', $args );
}

add_action( 'init', 'wpdocs_codex_activitie_init' );


// Add Meta Box
function add_icon_meta_box() {
    add_meta_box(
        'activitie_icon_meta',          // Unique ID
        'Select Icon',                  // Box title
        'render_icon_meta_box',         // Content callback
        'activitie',                    // Post type
        'side',                         // Context (location)
        'default'                       // Priority
    );
}
add_action('add_meta_boxes', 'add_icon_meta_box');

// Render the Meta Box
function render_icon_meta_box($post) {
    $selected_icon = get_post_meta($post->ID, '_activitie_icon', true);
    $icons = array(
        'bi-book' => 'Book',
        'bi-heart' => 'Heart',
        'bi-people' => 'People',
        'bi-compass' => 'Compass',
    );
    ?>
    <label for="activitie_icon">Select an Icon:</label>
    <select name="activitie_icon" id="activitie_icon" style="width: 100%;">
        <?php foreach ($icons as $icon_class => $icon_label): ?>
            <option value="<?php echo esc_attr($icon_class); ?>" <?php selected($selected_icon, $icon_class); ?>>
                <?php echo esc_html($icon_label); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <?php
}

// Save the Selected Icon
function save_icon_meta_box($post_id) {
    if (array_key_exists('activitie_icon', $_POST)) {
        update_post_meta(
            $post_id,
            '_activitie_icon',
            sanitize_text_field($_POST['activitie_icon'])
        );
    }
}
add_action('save_post', 'save_icon_meta_box');




/**
 * Register a custom post type called "donate".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpdocs_codex_donate_init() {
	$labels = array(
		'name'                  => _x( 'donate', 'Post type general name', 'textdomain' ),
		'singular_name'         => _x( 'donate', 'Post type singular name', 'textdomain' ),
		'menu_name'             => _x( 'donate', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar'        => _x( 'donate', 'Add New on Toolbar', 'textdomain' ),
		'add_new'               => __( 'Add New', 'textdomain' ),
		'add_new_item'          => __( 'Add New donate', 'textdomain' ),
		'new_item'              => __( 'New donate', 'textdomain' ),
		'edit_item'             => __( 'Edit donate', 'textdomain' ),
		'view_item'             => __( 'View donate', 'textdomain' ),
		'all_items'             => __( 'All donate', 'textdomain' ),
		'search_items'          => __( 'Search donate', 'textdomain' ),
		'parent_item_colon'     => __( 'Parent donate:', 'textdomain' ),
		'not_found'             => __( 'No donate found.', 'textdomain' ),
		'not_found_in_trash'    => __( 'No donate found in Trash.', 'textdomain' ),
		'featured_image'        => _x( 'donate Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'donate archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into donate', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this donate', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter donate list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'donate list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'donate list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'donate' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 4,
        'menu_icon'          => 'dashicons-heart',
		'supports'           => array( 'title' ),
	);

	register_post_type( 'donate', $args );
}

add_action( 'init', 'wpdocs_codex_donate_init' );


// Add Meta Box for Percentage
function add_percentage_meta_box() {
    add_meta_box(
        'donate_percentage_meta',    // Unique ID
        'Select Percentage',            // Box title
        'render_percentage_meta_box',   // Content callback
        'donate',                    // Post type
        'side',                         // Context (location)
        'default'                       // Priority
    );
}
add_action('add_meta_boxes', 'add_percentage_meta_box');

// Render the Meta Box
function render_percentage_meta_box($post) {
    $selected_percentage = get_post_meta($post->ID, '_donate_percentage', true);
    $percentages = array(
        '0'  => '0',
        '5'  => '5',
        '10' => '10',
        '15' => '15',
        '20' => '20',
        '25' => '25',
        '30' => '30',
        '35' => '35',
        '40' => '40',
        '45' => '45',
        '50' => '50',
        '55' => '55',
        '60' => '60',
        '65' => '65',
        '70' => '70',
        '75' => '75',
        '80' => '80',
        '85' => '85',
        '90' => '90',
        '95' => '95',
        '100' => '100',
    );
    ?>
    <label for="donate_percentage">Select a Percentage:</label>
    <select name="donate_percentage" id="donate_percentage" style="width: 100%;">
        <?php foreach ($percentages as $percentage_value => $percentage_label): ?>
            <option value="<?php echo esc_attr($percentage_value); ?>" <?php selected($selected_percentage, $percentage_value); ?>>
                <?php echo esc_html($percentage_label); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <?php
}

// Save the Selected Percentage
function save_percentage_meta_box($post_id) {
    if (array_key_exists('donate_percentage', $_POST)) {
        update_post_meta(
            $post_id,
            '_donate_percentage',
            sanitize_text_field($_POST['donate_percentage'])
        );
    }
}
add_action('save_post', 'save_percentage_meta_box');


// Create the prayer_times table in the database
function create_prayer_times_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . "prayer_times"; // Table name with prefix
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id INT AUTO_INCREMENT PRIMARY KEY,
        date DATE NOT NULL,
        fajr TIME NOT NULL,
        sunrise TIME NOT NULL,
        dhuhr TIME NOT NULL,
        asr TIME NOT NULL,
        maghrib TIME NOT NULL,
        isha TIME NOT NULL
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
add_action('after_switch_theme', 'create_prayer_times_table');




// Add the admin menu for prayer times
function add_prayer_times_menu() {
    add_menu_page(
        'الأيام المرفوعة',          // Page title
        'أوقات الصلاة',          // Menu title
        'manage_options',        // Capability
        'prayer-times',          // Menu slug
        'render_prayer_times_page', // Callback function to render the page
        'dashicons-clock',       // Icon
        8                     // Position
    );

    // Add submenu for adding a new day
    add_submenu_page(
        'prayer-times',          // Parent slug
        'إضافة يوم جديد',        // Page title
        'إضافة يوم جديد',        // Submenu title
        'manage_options',        // Capability
        'add-new-day',           // Submenu slug
        'render_add_new_day_page' // Callback function to render the submenu page
    );
}
add_action('admin_menu', 'add_prayer_times_menu');



// Render the main prayer times page
function render_prayer_times_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . "prayer_times";

    // Fetch all records for the "Dashboard" tab
    $prayer_times = $wpdb->get_results("SELECT * FROM $table_name ORDER BY date ASC");
    ?>
    <div class="wrap" dir="rtl">
        <h1>الأيام المرفوعة</h1>
        <br>
        <table class="widefat fixed striped">
            <thead>
                <tr>
                    <th>التاريخ</th>
                    <th>الفجر</th>
                    <th>الشروق</th>
                    <th>الظهر</th>
                    <th>العصر</th>
                    <th>المغرب</th>
                    <th>العشاء</th>
                    <th>الأجراء</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($prayer_times): ?>
                    <?php foreach ($prayer_times as $time): ?>
                        <tr>
                            <td><?php echo esc_html($time->date); ?></td>
                            <td><?php echo esc_html($time->fajr); ?></td>
                            <td><?php echo esc_html($time->sunrise); ?></td>
                            <td><?php echo esc_html($time->dhuhr); ?></td>
                            <td><?php echo esc_html($time->asr); ?></td>
                            <td><?php echo esc_html($time->maghrib); ?></td>
                            <td><?php echo esc_html($time->isha); ?></td>
                            <td>
                                <a href="<?php echo esc_url(admin_url('admin-post.php?action=delete_prayer_time&id=' . $time->id)); ?>" class="button button-danger" onclick="return confirm('هل أنت متأكد؟');">حذف</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">لا توجد أوقات مرفوعة.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <style>
        .widefat thead tr th,.widefat tbody tr td{
            text-align: center;
        }
    </style>
    <?php
}

// Render the add new day page
function render_add_new_day_page() {
    ?>
    <div class="wrap" dir="rtl">
        <h2>إضافة يوم جديد</h2>
        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST" class="admin-form">
            <input type="hidden" name="action" value="save_prayer_times">

            <label for="date">التاريخ:</label>
            <input type="date" name="date" id="date" required>

            <label for="fajr">الفجر:</label>
            <input type="time" name="fajr" id="fajr" required>
            
            <label for="sunrise">الشروق:</label>
            <input type="time" name="sunrise" id="sunrise" required>

            <label for="dhuhr">الظهر:</label>
            <input type="time" name="dhuhr" id="dhuhr" required>

            <label for="asr">العصر:</label>
            <input type="time" name="asr" id="asr" required>

            <label for="maghrib">المغرب:</label>
            <input type="time" name="maghrib" id="maghrib" required>

            <label for="isha">العشاء:</label>
            <input type="time" name="isha" id="isha" required>
            
            <button type="submit" class="button button-primary">حفظ</button>
        </form>
    </div>
    <style>
    /* Form styling */
        .admin-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .admin-form label {
            font-size: 14px;
            font-weight: bold;
            color: #555;
        }

        .admin-form input[type="date"],
        .admin-form input[type="time"] {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        .admin-form button {
            background-color: #0073aa;
            color: #fff;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
        }

        .admin-form button:hover {
            background-color: #005177;
        }

        /* Optional: Center alignment for the .admin-form */
        .admin-form {
            align-items: center;
            text-align: left;
        }

        /* Additional styling for input fields */
        .admin-form input[type="date"],
        .admin-form input[type="time"] {
            max-width: 50%;
            text-align: center;
        }

        /* Button alignment */
        .admin-form button {
            align-self: center;
            width: 50%;
            padding: 10px !important;
            margin: 10px !important;
        }
        </style>
    <?php
}


// Handle form submission and save data to the database
function handle_prayer_times_form() {
    // Check user permissions
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized user');
    }

    // Get form data
    global $wpdb;
    $table_name = $wpdb->prefix . "prayer_times";

    $date = sanitize_text_field($_POST['date']);
    $fajr = sanitize_text_field($_POST['fajr']);
    $sunrise = sanitize_text_field($_POST['sunrise']);
    $dhuhr = sanitize_text_field($_POST['dhuhr']);
    $asr = sanitize_text_field($_POST['asr']);
    $maghrib = sanitize_text_field($_POST['maghrib']);
    $isha = sanitize_text_field($_POST['isha']);

    // Check if the date exists
    $exists = $wpdb->get_row("SELECT * FROM $table_name WHERE date = '$date'");

    if ($exists) {
        // Update existing record
        $wpdb->update(
            $table_name,
            array(
                'fajr' => $fajr,
                'sunrise' => $sunrise,
                'dhuhr' => $dhuhr,
                'asr' => $asr,
                'maghrib' => $maghrib,
                'isha' => $isha,
            ),
            array('date' => $date)
        );
    } else {
        // Insert new record
        $wpdb->insert(
            $table_name,
            array(
                'date' => $date,
                'fajr' => $fajr,
                'sunrise' => $sunrise,
                'dhuhr' => $dhuhr,
                'asr' => $asr,
                'maghrib' => $maghrib,
                'isha' => $isha,
            )
        );
    }

    // Redirect after submission
    wp_redirect(admin_url('admin.php?page=prayer-times'));
    exit;
}
add_action('admin_post_save_prayer_times', 'handle_prayer_times_form');
add_action('admin_post_nopriv_save_prayer_times', 'handle_prayer_times_form');

function handle_delete_prayer_time() {
    // Überprüfe, ob der Benutzer die Berechtigung hat
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized user');
    }

    // Hole die ID aus der Anfrage
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . "prayer_times";

        $id = intval($_GET['id']);

        // Lösche den Eintrag
        $wpdb->delete($table_name, array('id' => $id));

        // Weiterleitung zurück zur Hauptseite
        wp_redirect(admin_url('admin.php?page=prayer-times'));
        exit;
    } else {
        wp_die('Ungültige ID');
    }
}
add_action('admin_post_delete_prayer_time', 'handle_delete_prayer_time');


?>