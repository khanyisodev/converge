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
        'menu_position'         => 5,
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
        'menu_position'         => 5,
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
