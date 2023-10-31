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
add_shortcode('product-attributes', function ($atts) {
    global $product;

    if (!is_object($product) || !$product->has_attributes()) {
        return '';
    }

    $attributes = $product->get_attributes();
    $html = '';

    if (!empty($attributes)) {

        /** @var WC_Product_Attribute $product_attribute */
        foreach ($attributes as $product_attribute) {

            if (!$product_attribute->is_taxonomy()) {
                $attribute_label = $product_attribute->get_name();
                $attribute_value = implode(', ', $product_attribute->get_options());
            } else {
                $taxonomy = $product_attribute->get_taxonomy_object();
                $attribute_label = $taxonomy->attribute_label;

                $terms = $product_attribute->get_terms();
                if (is_array($terms)) {
                    $attribute_value = implode(', ', array_map(function (WP_Term $t) {
                        return $t->name;
                    }, $terms));
                } else {
                    $attribute_value = '';
                }
            }

            $html .= '<li>' . esc_html($attribute_label) . ' : ' . esc_html($attribute_value) . '</li>';

        }

        $html = '<ul>' . $html . '</ul>';
    }

    return $html;
});