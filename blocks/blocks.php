<?php

add_action( 'init', 'register_acf_blocks' );
function register_acf_blocks() {
    register_block_type( __DIR__ . '/widgets-form/' );
}

// If widget-form block is used setup acf_form_head
add_action('wp_head', 'add_acf_form_head', 2);
function add_acf_form_head() {
    if ( has_block( 'acf/widgets-form' ) ) {
        acf_form_head();
    }
}