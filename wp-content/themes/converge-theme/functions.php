<?php

function theme_files() {
  wp_enqueue_style('theme_main_styles', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'theme_files');

function custom_theme_setup() {
    // Register multiple menu locations if needed
    register_nav_menus( array(
        'primary-menu'   => 'Primary Menu',   // Example: Header Menu
        'secondary-menu' => 'Secondary Menu', // Example: Footer Menu
        // Add more menu locations as necessary
    ) );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );

// Add support for featured images
add_theme_support('post-thumbnails');

// Register How IT Works Post Type
function custom_post_type_how_it_works() {
    $labels = array(
        'name'                  => 'How It Works',
        'singular_name'         => 'How It Works',
        'menu_name'             => 'How It Works',
        'name_admin_bar'        => 'How It Works',
        'archives'              => 'How It Works Archives',
        'attributes'            => 'How It Works Attributes',
        'parent_item_colon'     => 'Parent Item:',
        'all_items'             => 'All Items',
        'add_new_item'          => 'Add New Item',
        'add_new'               => 'Add New',
        'new_item'              => 'New Item',
        'edit_item'             => 'Edit Item',
        'update_item'           => 'Update Item',
        'view_item'             => 'View Item',
        'view_items'            => 'View Items',
        'search_items'          => 'Search Item',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_item'      => 'Insert into item',
        'uploaded_to_this_item' => 'Uploaded to this item',
        'items_list'            => 'Items list',
        'items_list_navigation' => 'Items list navigation',
        'filter_items_list'     => 'Filter items list',
    );
    $args = array(
        'label'                 => 'How It Works',
        'description'           => 'Custom post type for explaining how things work',
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type( 'how_it_works', $args );
}
add_action( 'init', 'custom_post_type_how_it_works', 0 );

// Add Sub Title Custom Field
function add_sub_title_custom_field() {
    add_meta_box(
        'sub_title_field',
        'Sub Title',
        'render_sub_title_field',
        'how_it_works',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'add_sub_title_custom_field' );

// Render Sub Title Custom Field
function render_sub_title_field( $post ) {
    $sub_title = get_post_meta( $post->ID, '_sub_title', true );
    ?>
    <label for="sub_title">Sub Title:</label>
    <input type="text" id="sub_title" name="sub_title" value="<?php echo esc_attr( $sub_title ); ?>">
    <?php
}

// Save Sub Title Custom Field
function save_sub_title_custom_field( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;
    if ( isset( $_POST['sub_title'] ) ) {
        update_post_meta( $post_id, '_sub_title', sanitize_text_field( $_POST['sub_title'] ) );
    }
}
add_action( 'save_post', 'save_sub_title_custom_field' );
// End of How It works

// Team Post type
// Register Custom Post Type
function custom_post_type_team() {
    $labels = array(
        'name'                  => 'Team',
        'singular_name'         => 'Team Member',
        'menu_name'             => 'Team',
        'name_admin_bar'        => 'Team Member',
        'archives'              => 'Team Archives',
        'attributes'            => 'Team Attributes',
        'parent_item_colon'     => 'Parent Item:',
        'all_items'             => 'All Team Members',
        'add_new_item'          => 'Add New Team Member',
        'add_new'               => 'Add New Team Member',
        'new_item'              => 'New Team Member',
        'edit_item'             => 'Edit Team Member',
        'update_item'           => 'Update Team Member',
        'view_item'             => 'View Team Member',
        'view_items'            => 'View Team Members',
        'search_items'          => 'Search Team Members',
        'not_found'             => 'No team members found',
        'not_found_in_trash'    => 'No team members found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_item'      => 'Insert into team member',
        'uploaded_to_this_item' => 'Uploaded to this team member',
        'items_list'            => 'Team members list',
        'items_list_navigation' => 'Team members list navigation',
        'filter_items_list'     => 'Filter team members list',
    );
    $args = array(
        'label'                 => 'Team',
        'description'           => 'Custom post type for team members',
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'            => array(),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 7,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type( 'team', $args );
}
add_action( 'init', 'custom_post_type_team', 0 );

function load_media_files() {
    wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'load_media_files' );

// Theme Settings
function theme_settings_page() {
    add_menu_page(
        'Theme Settings',
        'Theme Settings',
        'manage_options',
        'theme-settings',
        'theme_settings_page_content',
        'dashicons-admin-generic',
        5
    );
}
add_action('admin_menu', 'theme_settings_page');

function theme_settings_page_content() {
    ?>
    <div class="wrap">
        <form method="post" action="options.php">
            <?php
            settings_fields('theme-settings-group');
            do_settings_sections('theme-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function theme_settings_init() {
    register_setting(
        'theme-settings-group',
        'theme_settings',
        'theme_settings_sanitize'
    );

    add_settings_section(
        'theme-settings-section',
        'Theme Options',
        'theme_settings_section_callback',
        'theme-settings'
    );

    // Logo Upload Field
    add_settings_field(
        'logo',
        'Logo',
        'logo_field_callback',
        'theme-settings',
        'theme-settings-section'
    );

    // Footer Logo Upload Field
    add_settings_field(
        'footer_logo',
        'Footer Logo',
        'footer_logo_field_callback',
        'theme-settings',
        'theme-settings-section'
    );

    // LinkedIn URL Field
    add_settings_field(
        'linkedin_url',
        'LinkedIn URL',
        'linkedin_url_field_callback',
        'theme-settings',
        'theme-settings-section'
    );

    // Facebook URL Field
    add_settings_field(
        'facebook_url',
        'Facebook URL',
        'facebook_url_field_callback',
        'theme-settings',
        'theme-settings-section'
    );

    // Instagram URL Field
    add_settings_field(
        'instagram_url',
        'Instagram URL',
        'instagram_url_field_callback',
        'theme-settings',
        'theme-settings-section'
    );

    // Corporate Program Link Field
    add_settings_field(
        'corporate_program_link',
        'Join Corporate Program Link',
        'corporate_program_link_field_callback',
        'theme-settings',
        'theme-settings-section'
    );

    // Student Application Link Field
    add_settings_field(
        'student_application_link',
        'Student Application Link',
        'student_application_link_field_callback',
        'theme-settings',
        'theme-settings-section'
    );
}
add_action('admin_init', 'theme_settings_init');

function theme_settings_section_callback() {
    echo 'Enter your theme options below:';
}

function logo_field_callback() {
    $settings = get_option('theme_settings');
    $logo_url = isset($settings['logo']) ? esc_attr($settings['logo']) : '';
    ?>
    <input type="text" id="logo_url" name="theme_settings[logo]" value="<?php echo $logo_url; ?>" />
    <input type="button" class="button button-primary" id="upload_logo_button" value="Upload Logo" />
    <input type="button" class="button" id="remove_logo_button" value="Remove Logo" />
    <br />
    <img id="logo_preview" src="<?php echo $logo_url; ?>" style="max-width: 200px; display: <?php echo $logo_url ? 'block' : 'none'; ?>" />
    <script>
        jQuery(document).ready(function($) {
            $('#upload_logo_button').click(function(e) {
                e.preventDefault();
                var image = wp.media({
                    title: 'Upload Logo',
                    multiple: false
                }).open().on('select', function(e) {
                    var uploaded_image = image.state().get('selection').first();
                    var logo_url = uploaded_image.toJSON().url;
                    $('#logo_url').val(logo_url);
                    $('#logo_preview').attr('src', logo_url).show();
                });
            });

            $('#remove_logo_button').click(function(e) {
                e.preventDefault();
                $('#logo_url').val('');
                $('#logo_preview').attr('src', '').hide();
            });
        });
    </script>
    <?php
}

function footer_logo_field_callback() {
    $settings = get_option('theme_settings');
    $footer_logo_url = isset($settings['footer_logo']) ? esc_attr($settings['footer_logo']) : '';
    ?>
    <input type="text" id="footer_logo_url" name="theme_settings[footer_logo]" value="<?php echo $footer_logo_url; ?>" />
    <input type="button" class="button button-primary" id="upload_footer_logo_button" value="Upload Footer Logo" />
    <input type="button" class="button" id="remove_footer_logo_button" value="Remove Footer Logo" />
    <br />
    <img id="footer_logo_preview" src="<?php echo $footer_logo_url; ?>" style="max-width: 200px; display: <?php echo $footer_logo_url ? 'block' : 'none'; ?>" />
    <script>
        jQuery(document).ready(function($) {
            $('#upload_footer_logo_button').click(function(e) {
                e.preventDefault();
                if (typeof wp !== 'undefined' && wp.media) {
                    var image = wp.media({
                        title: 'Upload Footer Logo',
                        multiple: false
                    }).open().on('select', function(e) {
                        var uploaded_image = image.state().get('selection').first();
                        var footer_logo_url = uploaded_image.toJSON().url;
                        $('#footer_logo_url').val(footer_logo_url);
                        $('#footer_logo_preview').attr('src', footer_logo_url).show();
                    });
                }
            });

            $('#remove_footer_logo_button').click(function(e) {
                e.preventDefault();
                $('#footer_logo_url').val('');
                $('#footer_logo_preview').attr('src', '').hide();
            });
        });
    </script>
    <?php
}

function linkedin_url_field_callback() {
    $settings = get_option('theme_settings');
    $linkedin_url = isset($settings['linkedin_url']) ? esc_attr($settings['linkedin_url']) : '';
    echo "<input type='text' name='theme_settings[linkedin_url]' value='$linkedin_url' />";
}

function facebook_url_field_callback() {
    $settings = get_option('theme_settings');
    $facebook_url = isset($settings['facebook_url']) ? esc_attr($settings['facebook_url']) : '';
    echo "<input type='text' name='theme_settings[facebook_url]' value='$facebook_url' />";
}

function instagram_url_field_callback() {
    $settings = get_option('theme_settings');
    $instagram_url = isset($settings['instagram_url']) ? esc_attr($settings['instagram_url']) : '';
    echo "<input type='text' name='theme_settings[instagram_url]' value='$instagram_url' />";
}

function corporate_program_link_field_callback() {
    $settings = get_option('theme_settings');
    $corporate_program_link = isset($settings['corporate_program_link']) ? esc_attr($settings['corporate_program_link']) : '';
    echo "<input type='text' name='theme_settings[corporate_program_link]' value='$corporate_program_link' />";
}

function student_application_link_field_callback() {
    $settings = get_option('theme_settings');
    $student_application_link = isset($settings['student_application_link']) ? esc_attr($settings['student_application_link']) : '';
    echo "<input type='text' name='theme_settings[student_application_link]' value='$student_application_link' />";
}

function theme_settings_sanitize($input) {
    $sanitized_input = array();

    if (isset($input['logo'])) {
        $sanitized_input['logo'] = sanitize_text_field($input['logo']);
    }

    if (isset($input['footer_logo'])) {
        $sanitized_input['footer_logo'] = sanitize_text_field($input['footer_logo']);
    }

    if (isset($input['linkedin_url'])) {
        $sanitized_input['linkedin_url'] = esc_url_raw($input['linkedin_url']);
    }

    if (isset($input['facebook_url'])) {
        $sanitized_input['facebook_url'] = esc_url_raw($input['facebook_url']);
    }

    if (isset($input['instagram_url'])) {
        $sanitized_input['instagram_url'] = esc_url_raw($input['instagram_url']);
    }

    if (isset($input['corporate_program_link'])) {
        $sanitized_input['corporate_program_link'] = esc_url_raw($input['corporate_program_link']);
    }

    if (isset($input['student_application_link'])) {
        $sanitized_input['student_application_link'] = esc_url_raw($input['student_application_link']);
    }

    return $sanitized_input;
}
