<?php

$sep = 0;

// ==================================================================
// Custom Fonts
// ==================================================================
add_filter( 'kirki/fonts/standard_fonts', 'mt_add_my_custom_font' );
function mt_add_my_custom_font( $standard_fonts ) {

    $fonts["Arial, Helvetica, sans-serif"] = array(
        "label" => "Arial, Helvetica, sans-serif",
        "stack" => "Arial, Helvetica, sans-serif",
    );

    $fonts["'Arial Black', Gadget, sans-serif"] = array(
        "label" => "'Arial Black', Gadget, sans-serif",
        "stack" => "'Arial Black', Gadget, sans-serif",
    );

    $fonts["'Bookman Old Style', serif"] = array(
        "label" => "'Bookman Old Style', serif",
        "stack" => "'Bookman Old Style', serif",
    );

    $fonts["'Comic Sans MS', cursive"] = array(
        "label" => "'Comic Sans MS', cursive",
        "stack" => "'Comic Sans MS', cursive",
    );

    $fonts["Courier, monospace"] = array(
        "label" => "Courier, monospace",
        "stack" => "Courier, monospace",
    );

    $fonts["Garamond, serif"] = array(
        "label" => "Garamond, serif",
        "stack" => "Garamond, serif",
    );

    $fonts["Georgia, serif"] = array(
        "label" => "Georgia, serif",
        "stack" => "Georgia, serif",
    );

    $fonts["Impact, Charcoal, sans-serif"] = array(
        "label" => "Impact, Charcoal, sans-serif",
        "stack" => "Impact, Charcoal, sans-serif",
    );

    $fonts["'Lucida Console', Monaco, monospace"] = array(
        "label" => "'Lucida Console', Monaco, monospace",
        "stack" => "'Lucida Console', Monaco, monospace",
    );

    $fonts["'Lucida Sans Unicode', 'Lucida Grande', sans-serif"] = array(
        "label" => "'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
        "stack" => "'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
    );

    $fonts["'MS Sans Serif', Geneva, sans-serif"] = array(
        "label" => "'MS Sans Serif', Geneva, sans-serif",
        "stack" => "'MS Sans Serif', Geneva, sans-serif",
    );

    $fonts["'MS Serif', 'New York', sans-serif"] = array(
        "label" => "'MS Serif', 'New York', sans-serif",
        "stack" => "'MS Serif', 'New York', sans-serif",
    );

    $fonts["'Palatino Linotype', 'Book Antiqua', Palatino, serif"] = array(
        "label" => "'Palatino Linotype', 'Book Antiqua', Palatino, serif",
        "stack" => "'Palatino Linotype', 'Book Antiqua', Palatino, serif",
    );

    $fonts["Tahoma,Geneva, sans-serif"] = array(
        "label" => "Tahoma,Geneva, sans-serif",
        "stack" => "Tahoma,Geneva, sans-serif",
    );

    $fonts["'Times New Roman', Times,serif"] = array(
        "label" => "'Times New Roman', Times,serif",
        "stack" => "'Times New Roman', Times,serif",
    );

    $fonts["'Trebuchet MS', Helvetica, sans-serif"] = array(
        "label" => "'Trebuchet MS', Helvetica, sans-serif",
        "stack" => "'Trebuchet MS', Helvetica, sans-serif",
    );

    $fonts["Verdana, Geneva, sans-serif"] = array(
        "label" => "Verdana, Geneva, sans-serif",
        "stack" => "Verdana, Geneva, sans-serif",
    );
    
    return $fonts;
}

// ==================================================================
// Customizer Sections
// ==================================================================
add_action( 'customize_register','getbowtied_mt_customizer' );
function getbowtied_mt_customizer( $wp_customize ) {

    // Add Panels
    $wp_customize->add_panel( 'panel_header', array(
        'title'          => esc_html__( 'Header', 'mr_tailor' ),
        'priority'       => 5,
        'capability'     => 'edit_theme_options',
    ) );

    $wp_customize->add_section( 'panel_footer', array(
        'title'          => esc_html__( 'Footer', 'mr_tailor' ),
        'priority'       => 5,
        'capability'     => 'edit_theme_options',
    ) );

    $wp_customize->add_section( 'panel_shop', array(
        'title'          => esc_html__( 'Shop', 'mr_tailor' ),
        'priority'       => 6,
        'capability'     => 'edit_theme_options',
    ) );

    $wp_customize->add_section( 'panel_product', array(
        'title'          => esc_html__( 'Product Page', 'mr_tailor' ),
        'priority'       => 6,
        'capability'     => 'edit_theme_options',
    ) );

    $wp_customize->add_section( 'panel_blog', array(
        'title'          => esc_html__( 'Blog', 'mr_tailor' ),
        'priority'       => 8,
        'capability'     => 'edit_theme_options',
    ) );

    $wp_customize->add_section( 'panel_styling', array(
        'title'          => esc_html__( 'Styling', 'mr_tailor' ),
        'priority'       => 8,
        'capability'     => 'edit_theme_options',
    ) );

    $wp_customize->add_section( 'panel_fonts', array(
        'title'          => esc_html__( 'Fonts', 'mr_tailor' ),
        'priority'       => 8,
        'capability'     => 'edit_theme_options',
    ) );
}

// ==================================================================
// Control Config
// ==================================================================
Kirki::add_config( 'mrtailor', array(
    'capability'        => 'edit_theme_options',
    'option_type'       => 'theme_mod',
    'transport'         => 'refresh',
) );

// ==================================================================
// Custom Controls
// ==================================================================
add_action( 'customize_register', function( $wp_customize ) {

    class Kirki_Control_Dropdown extends Kirki_Control_Base {
        public $type = 'dropdown';
        public function render_content() { ?>
            <div class="dropdown-control"><h3><?php echo esc_html($this->label); ?></h3></div>
            <?php
        }
    }

    add_filter( 'kirki_control_types', function( $controls ) {
        $controls['dropdown'] = 'Kirki_Control_Dropdown';
        return $controls;
    } );

} );

add_action( 'admin_enqueue_scripts', 'mrtailor_enqueue_dropdown_control' );
function mrtailor_enqueue_dropdown_control() {
    wp_enqueue_script( 'mrtailor-dropdown-scripts',  get_template_directory_uri() . '/settings/assets/js/dropdown.js',     array( 'jquery' ), '1.0', false );
    wp_enqueue_script( 'mrtailor-gotopage-scripts',  get_template_directory_uri() . '/settings/assets/js/go-to-page.js',   array( 'jquery' ), '1.0', false );
    wp_enqueue_style(  'mrtailor-dropdown-styles',   get_template_directory_uri() . '/settings/assets/css/dropdown.css',   array(),           '1.0', false );
}

add_action( 'wp_enqueue_scripts', 'mrtailor_enqueue_kirki_settings' );
function mrtailor_enqueue_kirki_settings() {
    wp_enqueue_style(  'mrtailor-kirki-styles',   get_template_directory_uri() . '/settings/assets/css/settings.css', array(),           '1.0', false );
}

//==============================================================================
//  Go To Page
//==============================================================================
if ( ! function_exists( 'mt_get_section_url' ) ) :

    function mt_get_section_url() {

        switch($_POST['page']) {
            case 'shop': 
                echo get_permalink( wc_get_page_id( 'shop' ) ); 
                break;
            case 'blog': 
                echo get_permalink( get_option( 'page_for_posts' ) ); 
                break;
            case 'product': 
                $args = array('orderby' => 'rand', 'limit' => 1); 
                $product = wc_get_products($args); 
                echo get_permalink( $product[0]->get_id() ); 
                break;
            default:
                echo get_home_url();
                break;
        }
        exit();
    }
    
    add_action( 'wp_ajax_mt_get_section_url', 'mt_get_section_url' );

endif;

// ==================================================================
// Customizer Controls
// ==================================================================

// HEADER
include_once( get_template_directory() . '/settings/options/header.php' );

// FOOTER
include_once( get_template_directory() . '/settings/options/footer.php' );

// SHOP
include_once( get_template_directory() . '/settings/options/shop.php' );

// PRODUCT
include_once( get_template_directory() . '/settings/options/product.php' );

// BLOG
include_once( get_template_directory() . '/settings/options/blog.php' );

// STYLING
include_once( get_template_directory() . '/settings/options/styling.php' );

// FONTS
include_once( get_template_directory() . '/settings/options/fonts.php' );
