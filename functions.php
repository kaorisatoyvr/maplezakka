<?php
function storefront_child_init() {

    // Output additional content on My Account dashboard
    add_action(
        'woocommerce_account_dashboard',
        'storefront_child_account_dashboard'
    );

     //remove the rating from the single product page
     remove_action(
        'woocommerce_after_shop_loop_item_title',
        'woocommerce_template_loop_rating',
        5
    );
    
    // re-add the rating after price
    add_action(
        'woocommerce_after_shop_loop_item_title',
        'woocommerce_template_loop_rating',
        11
    );

    add_action(
        'woocommerce_after_shop_loop_item',
        'display_categories',
        11
    );
    
    
    }
    add_action( 'init', 'storefront_child_init' );
    
function storefront_child_account_dashboard() {
    if ( function_exists('get_field') ){
        $email = 'infot@example.com';
        if ( get_field( 'email', 150 )) {
            $email = get_field( 'email', 150);
        };
    }
    echo '<p>Please contact us at <a href="mailto:info@example.com" target="_blank">info@example.com</a> with any issues.</p>';
    echo do_shortcode('[contact-form-7 id="a4d0fbb" title="Contact form 1"]');
}

function display_categories() {
    global $product;

    if (is_shop() || is_product_category() || is_product())  {

        echo '<p>' . wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' ) . '</p>';
    }
}

// Google Fonts
function enqueue_custom_styles() {
    // Enqueue Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Poppins:wght@400;600;700&display=swap');

}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');

// This theme uses wp_nav_menu() in one location.
register_nav_menus(
    array(
        'social-media' => esc_html__('Social Media - Footer Right', 'storefront'),
        'footer-left' => esc_html__('Footer Quick Link - Footer Left', 'storefront'),
        'footer-middle' => esc_html__('Contact Us - Footer Middle', 'storefront'),
        'mobile-header' => esc_html__('Mobile Header - Hamburger', 'storefront'),
    )
);

// remove the default credit
add_action('init', 'remove_storefront_credit', 20);

function remove_storefront_credit() {
    remove_action('storefront_footer', 'storefront_credit', 20);
}

// Hamburger menu
function custom_add_original_hamburger_menu() {
    if (has_nav_menu('mobile-header')) {
        ?>
        <div class="custom-hamburger-menu">
            <nav class='mobile-nav'>
                <?php wp_nav_menu(array('theme_location' => 'mobile-header')); ?>
            </nav>
            <button class="hamburger">
                <div class="bar"></div>
            </button>
        </div>
        <?php
    }
}
add_action('storefront_header', 'custom_add_original_hamburger_menu');

function enqueue_hamburger_script() {
    // Enqueue jQuery first
    wp_enqueue_script('jquery');
    
    // Enqueue your script with jQuery as a dependency
    wp_enqueue_script(
        'hamburger-script',
        get_stylesheet_directory_uri() . '/js/hamburger.js', // Use get_stylesheet_directory_uri() for child themes
        array('jquery'), // jQuery is now a dependency
        null,
        true
    );

     // Enqueue custom script for the "Go to Top" button
     wp_enqueue_script(
        'go-to-top-script',
        get_stylesheet_directory_uri() . '/js/hamburger.js', // Adjust the path to your JavaScript file
        array('jquery'), // jQuery is a dependency
        null,
        true
    );
}

// for hamburger menu javascript
add_action('wp_enqueue_scripts', 'enqueue_hamburger_script');


// Fontawesome
function enqueue_font_awesome() {
    wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v6.0.0/css/all.css');
}
add_action('wp_enqueue_scripts', 'enqueue_font_awesome');

// homepage category buttons
function enqueue_custom_scripts() {
    wp_enqueue_script( 'category-fixed', get_stylesheet_directory_uri() . '/js/category-fixed.js', array('jquery'), '1.0', true );
}

add_action( 'wp_enqueue_scripts', 'enqueue_custom_scripts' );
