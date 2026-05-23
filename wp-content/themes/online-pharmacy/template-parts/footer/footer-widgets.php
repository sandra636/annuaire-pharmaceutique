<?php
/**
 * Displays footer widgets if assigned
 *
 * @package Online Pharmacy
 * @subpackage online_pharmacy
 */
?>
<?php

// Determine the number of columns dynamically for the footer (you can replace this with your logic).
$online_pharmacy_no_of_footer_col = get_theme_mod('online_pharmacy_footer_columns', 4); // Change this value as needed.

// Calculate the Bootstrap class for large screens (col-lg-X) for footer.
$online_pharmacy_col_lg_footer_class = 'col-lg-' . (12 / $online_pharmacy_no_of_footer_col);

// Calculate the Bootstrap class for medium screens (col-md-X) for footer.
$online_pharmacy_col_md_footer_class = 'col-md-' . (12 / $online_pharmacy_no_of_footer_col);
?>
<div class="container">
    <aside class="widget-area row py-2 pt-3" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'online-pharmacy' ); ?>">
        <?php
        $online_pharmacy_default_widgets = array(
            1 => 'search',
            2 => 'archives',
            3 => 'meta',
            4 => 'categories'
        );

        for ($online_pharmacy_i = 1; $online_pharmacy_i <= $online_pharmacy_no_of_footer_col; $online_pharmacy_i++) :
            $online_pharmacy_lg_class = esc_attr($online_pharmacy_col_lg_footer_class);
            $online_pharmacy_md_class = esc_attr($online_pharmacy_col_md_footer_class);
            echo '<div class="col-12 ' . $online_pharmacy_lg_class . ' ' . $online_pharmacy_md_class . '">';

            if (is_active_sidebar('footer-' . $online_pharmacy_i)) {
                dynamic_sidebar('footer-' . $online_pharmacy_i);
            } else {
                // Display default widget content if not active.
                switch ($online_pharmacy_default_widgets[$online_pharmacy_i] ?? '') {
                    case 'search':
                        ?>
                        <aside class="widget" role="complementary" aria-label="<?php esc_attr_e('Search', 'online-pharmacy'); ?>">
                            <h3 class="widget-title"><?php esc_html_e('Search', 'online-pharmacy'); ?></h3>
                            <?php get_search_form(); ?>
                        </aside>
                        <?php
                        break;

                    case 'archives':
                        ?>
                        <aside class="widget" role="complementary" aria-label="<?php esc_attr_e('Archives', 'online-pharmacy'); ?>">
                            <h3 class="widget-title"><?php esc_html_e('Archives', 'online-pharmacy'); ?></h3>
                            <ul><?php wp_get_archives(['type' => 'monthly']); ?></ul>
                        </aside>
                        <?php
                        break;

                    case 'meta':
                        ?>
                        <aside class="widget" role="complementary" aria-label="<?php esc_attr_e('Meta', 'online-pharmacy'); ?>">
                            <h3 class="widget-title"><?php esc_html_e('Meta', 'online-pharmacy'); ?></h3>
                            <ul>
                                <?php wp_register(); ?>
                                <li><?php wp_loginout(); ?></li>
                                <?php wp_meta(); ?>
                            </ul>
                        </aside>
                        <?php
                        break;

                    case 'categories':
                        ?>
                        <aside class="widget" role="complementary" aria-label="<?php esc_attr_e('Categories', 'online-pharmacy'); ?>">
                            <h3 class="widget-title"><?php esc_html_e('Categories', 'online-pharmacy'); ?></h3>
                            <ul><?php wp_list_categories(['title_li' => '']); ?></ul>
                        </aside>
                        <?php
                        break;
                }
            }

            echo '</div>';
        endfor;
        ?>
    </aside>
</div>