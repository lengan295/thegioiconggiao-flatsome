<?php
add_shortcode('ionicon', function($atts){
	$attributes = shortcode_atts(
        array(
			'class' => ''
        ),
        $atts
    );
	extract($attributes);
	return '<i class="'.$class.'"></i>';
});