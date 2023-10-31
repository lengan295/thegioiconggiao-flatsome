<?php
/**
 * Category layout with no sidebar.
 *
 * @package          Flatsome/WooCommerce/Templates
 * @flatsome-version 3.16.0
 */

?>
<div class="row category-page-row">

    <div class="col large-12">
        <?php
        do_action('flatsome_products_before');

        /**
         * Hook: woocommerce_before_main_content.
         *
         * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
         * @hooked woocommerce_breadcrumb - 20 (FL removed)
         * @hooked WC_Structured_Data::generate_website_data() - 30
         */
        do_action('woocommerce_before_main_content');

        echo do_shortcode('[fe_widget]');

        ?>

        <aside id="devvn_woocommerce_price_list_filter-2"
               class="widget devvn_woocommerce_price_list_filter woocommerce widget_layered_nav">
                <span class="widget-title shop-sidebar">Khoảng giá</span>
            <div class="is-divider small"></div>
            <ul class="woocommerce-widget-layered-nav-list">
                <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term
                <?php if (!empty($_GET['max_price']) && $_GET['max_price'] == 1000000) echo 'active woocommerce-widget-layered-nav-list__item--chosen chosen'; ?>">
                    <a href="./<?php if (!(!empty($_GET['max_price']) && $_GET['max_price'] == 1000000)) echo '?max_price=1000000'; ?>">Dưới 1 triệu</a>
                </li>
                <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term
                <?php if (!empty($_GET['max_price']) && !empty($_GET['min_price']) && $_GET['max_price'] == 2000000 && $_GET['min_price'] == 1000000) echo 'active woocommerce-widget-layered-nav-list__item--chosen chosen'; ?>">
                    <a href="./<?php if (!(!empty($_GET['max_price']) && !empty($_GET['min_price']) && $_GET['max_price'] == 2000000 && $_GET['min_price'] == 1000000)) echo '?max_price=2000000&amp;min_price=1000000'; ?>">Từ 1 - 2 triệu</a>
                </li>
                <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term
                <?php if (!empty($_GET['max_price']) && !empty($_GET['min_price']) && $_GET['max_price'] == 3000000 && $_GET['min_price'] == 2000000) echo 'active woocommerce-widget-layered-nav-list__item--chosen chosen'; ?>">
                    <a href="./<?php if (!(!empty($_GET['max_price']) && !empty($_GET['min_price']) && $_GET['max_price'] == 3000000 && $_GET['min_price'] == 2000000)) echo '?max_price=3000000&amp;min_price=2000000'; ?>">Từ 2 - 3 triệu</a>
                </li>
                <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term
                <?php if (!empty($_GET['min_price']) && $_GET['min_price'] == 3000000) echo 'active woocommerce-widget-layered-nav-list__item--chosen chosen'; ?>">
                    <a href="./<?php if (!(!empty($_GET['min_price']) && $_GET['min_price'] == 3000000)) echo '?min_price=3000000'; ?>">Trên 3 triệu</a>
                </li>
            </ul>
        </aside>

        <?php

        if (woocommerce_product_loop()) {

            /**
             * Hook: woocommerce_before_shop_loop.
             *
             * @hooked wc_print_notices - 10
             * @hooked woocommerce_result_count - 20 (FL removed)
             * @hooked woocommerce_catalog_ordering - 30 (FL removed)
             */
            do_action('woocommerce_before_shop_loop');

            woocommerce_product_loop_start();

            if (wc_get_loop_prop('total')) {
                while (have_posts()) {
                    the_post();

                    /**
                     * Hook: woocommerce_shop_loop.
                     *
                     * @hooked WC_Structured_Data::generate_product_data() - 10
                     */
                    do_action('woocommerce_shop_loop');

                    wc_get_template_part('content', 'product');
                }
            }

            woocommerce_product_loop_end();

            /**
             * Hook: woocommerce_after_shop_loop.
             *
             * @hooked woocommerce_pagination - 10
             */
            do_action('woocommerce_after_shop_loop');
        } else {
            /**
             * Hook: woocommerce_no_products_found.
             *
             * @hooked wc_no_products_found - 10
             */
            do_action('woocommerce_no_products_found');
        }
        ?>

        <?php
        /**
         * Hook: woocommerce_archive_description.
         *
         * @hooked woocommerce_taxonomy_archive_description - 10
         * @hooked woocommerce_product_archive_description - 10
         */
        do_action('woocommerce_archive_description');
        ?>

        <?php
        /**
         * Hook: flatsome_products_after.
         *
         * @hooked flatsome_products_footer_content - 10
         */
        do_action('flatsome_products_after');
        /**
         * Hook: woocommerce_after_main_content.
         *
         * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
         */
        do_action('woocommerce_after_main_content');
        ?>

    </div>
</div>
