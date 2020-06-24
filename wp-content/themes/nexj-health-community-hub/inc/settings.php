<?php

function my_default_image_size () {
    return 'full'; 
}

add_filter( 'pre_option_image_default_size', 'my_default_image_size' );