<?php
add_shortcode('ionicon', function ($atts) {
    $attributes = shortcode_atts(
        array(
            'class' => ''
        ),
        $atts
    );
    extract($attributes);
    return '<i class="' . $class . '"></i>';
});

// Single product description
add_shortcode('product-full-description', function () {
    global $product;
    try {
        if (is_a($product, 'WC_Product')) {
            return wc_format_content($product->get_description("shortcode"));
        }
        return "Product description shortcode run outside of product context";
    } catch (Exception $e) {
        return "Product description shortcode encountered an exception";
    }
});

// Single product attributes
add_shortcode('product-attributes', function () {
    global $product;

    if (!is_object($product) || !$product->has_attributes()) {
        return '';
    }

    $attributes = $product->get_attributes();
    $html = '';

    if (!empty($attributes)) {

        /** @var WC_Product_Attribute $attribute */
        foreach ($attributes as $attribute) {

                $attribute_label = $attribute->get_name();
                $attribute_value = implode(', ', $attribute->get_options());

                $html .= '<li>' . esc_html($attribute_label) . ' : ' . esc_html($attribute_value) . '</li>';

        }

        $html = '<ul>' . $html . '</ul>';
    }

    return $html;
});