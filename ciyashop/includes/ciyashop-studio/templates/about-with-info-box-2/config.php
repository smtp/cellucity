<?php
defined( 'ABSPATH' ) || exit('restricted access');

return array(
    'title'            => esc_html__( 'About With Info Box 2', 'ciyashop' ), // Required
    'demo_url'         => '',
    'type'             => 'block',                                 // Required
    'category'         => array(                                   // Required
        esc_html__( 'About', 'ciyashop' ),
    ),
    'tags'             => array(
        esc_html__( 'about', 'ciyashop' ),
        esc_html__( 'feature', 'ciyashop' ),
    ),
);
