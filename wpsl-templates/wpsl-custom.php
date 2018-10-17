<?php
global $wpsl_settings, $wpsl;

// $output         = $this->get_custom_css();
$autoload_class = ( !$wpsl_settings['autoload'] ) ? 'class="wpsl-not-loaded"' : '';

$output .= '<div class="wpsl-search-bar">' . "\r\n";
$output .= "\t" . '<div class="wpsl-search wpsl-clearfix ' . $this->get_css_classes() . '">' . "\r\n";
$output .= "\t\t" . '<div id="wpsl-search-wrap" class="fluid-container">' . "\r\n";
$output .= "\t\t\t" . '<form autocomplete="off"><div class="inner-row align-center align-bottom">' . "\r\n";
$output .= "\t\t\t" . '<div class="wpsl-input">' . "\r\n";
$output .= "\t\t\t\t" . '<label for="wpsl-search-input">' . esc_html( $wpsl->i18n->get_translation( 'search_label', __( 'Your location', 'wpsl' ) ) ) .  "\r\n";
$output .= "\t\t\t\t" . '<input id="wpsl-search-input" type="text" value="' . apply_filters( 'wpsl_search_input', '' ) . '" name="wpsl-search-input" placeholder="Address, Zip, or City & State" aria-required="true">' . "\r\n";
$output .= "\t\t\t\t\t" . '</label>' . "\r\n";
$output .= "\t\t\t" . '</div>' . "\r\n"; //end wpsl-input

if ( $wpsl_settings['radius_dropdown'] || $wpsl_settings['results_dropdown']  ) {
    // $output .= "\t\t\t" . '<div class="wpsl-select-wrap">' . "\r\n";

    if ( $wpsl_settings['radius_dropdown'] ) {
        $output .= "\t\t\t\t" . '<div id="wpsl-radius" class="wpsl-select-menu">' . "\r\n";
        $output .= "\t\t\t\t\t" . '<label for="wpsl-radius-dropdown">' . esc_html( $wpsl->i18n->get_translation( 'radius_label', __( 'Search radius', 'wpsl' ) ) ) . "\r\n";
        $output .= "\t\t\t\t\t" . '<select id="wpsl-radius-dropdown" name="wpsl-radius">' . "\r\n";
        $output .= "\t\t\t\t\t\t" . $this->get_dropdown_list( 'search_radius' ) . "\r\n";
        $output .= "\t\t\t\t" . '</select>' . "\r\n";
        $output .= "\t\t\t\t\t" . '</label>' . "\r\n";
        $output .= "\t\t\t\t" . '</div>' . "\r\n"; //end wpsl-radius
    }

    if ( $wpsl_settings['results_dropdown'] ) {
        $output .= "\t\t\t\t" . '<div id="wpsl-results" class="wpsl-select-menu">' . "\r\n";
        $output .= "\t\t\t\t\t" . '<label for="wpsl-results-dropdown">' . esc_html( $wpsl->i18n->get_translation( 'results_label', __( 'Results', 'wpsl' ) ) ) . "\r\n";
        $output .= "\t\t\t\t\t" . '<select id="wpsl-results-dropdown" name="wpsl-results">' . "\r\n";
        $output .= "\t\t\t\t\t\t" . $this->get_dropdown_list( 'max_results' ) . "\r\n";
        $output .= "\t\t\t\t\t" . '</select>' . "\r\n";
        $output .= "\t\t\t\t\t" . '</label>' . "\r\n";
        $output .= "\t\t\t\t" . '</div>' . "\r\n"; //end wpsl-results
    }

    // $output .= "\t\t\t" . '</div>' . "\r\n"; //end wpsl-select-wrap
}

// Include the opening hours
    $listing_template .= "\t\t\t" . '<% if ( hours ) { %>' . "\r\n";
    $listing_template .= "\t\t\t" . '<p><%= hours %></p>' . "\r\n";
    $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";

if ( $this->use_category_filter() ) {
    $output .= $this->create_category_filter();
}

$output .= "\t\t\t\t" . '<div class="wpsl-search-btn-wrap"><input id="wpsl-search-btn" class="button wpsl-search-btn" type="submit" value="' . esc_attr( $wpsl->i18n->get_translation( 'search_btn_label', __( 'Search', 'wpsl' ) ) ) . '"></div>' . "\r\n";

$output .= "\t\t" . '</div></form>' . "\r\n"; //end inner-row form
$output .= "\t\t" . '</div>' . "\r\n"; //end wpsl-search-wrap fluid-container
$output .= "\t" . '</div>' . "\r\n"; //end wpsl-search


$output .= '</div>' . "\r\n"; //end wpsl-search-bar

$output .= '<div class="inner-row">' . "\r\n";
$output .= "\t" . '<div id="wpsl-result-list" class="wpsl-result-list">' . "\r\n";
$output .= "\t\t" . '<div id="wpsl-stores" class="wpsl-stores" '. $autoload_class .'>' . "\r\n";
$output .= "\t\t\t" . '<ul></ul>' . "\r\n";
$output .= "\t\t" . '</div>' . "\r\n";
$output .= "\t\t" . '<div id="wpsl-direction-details">' . "\r\n";
$output .= "\t\t\t" . '<ul></ul>' . "\r\n";
$output .= "\t\t" . '</div>' . "\r\n";
$output .= "\t" . '</div>' . "\r\n";

$output .= '<div class="wpsl-gmap-wrap">' . "\r\n";
$output .= "\t" . '<div id="wpsl-gmap" class="wpsl-gmap-canvas responsive-embed"></div>' . "\r\n";
$output .= '</div>' . "\r\n";

return $output;
