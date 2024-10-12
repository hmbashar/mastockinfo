<?php
//don't call this file directly
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$settings = $this->get_settings_for_display();
$id = $this->get_id();

// Cast the settings values to float to ensure proper calculation
$course_objective = isset($settings['course_objective']) ? floatval($settings['course_objective']) : 0;
$current_price = isset($settings['current_price']) ? floatval($settings['current_price']) : 0;

// Ensure current price is not zero to avoid division by zero
if ($current_price > 0) {
    // Calculate the price opportunity percentage using the formula
    $price_opp_percentage = (($course_objective - $current_price) / $current_price) * 100;

    // Format the result to two decimal places
    $price_opp_percentage = number_format($price_opp_percentage, 2);
} else {
    // If current price is 0, default the opportunity percentage to 0
    $price_opp_percentage = number_format(0, 2);
}

// Determine the final course opportunity value based on the auto switch setting
$course_opportunity = isset($settings['course_opportunity_auto_switch']) && $settings['course_opportunity_auto_switch'] === 'yes'
    ? $price_opp_percentage
    : floatval($settings['course_opportunity']);


?>
<div class="mastock-information-wrapper">

    <!-- Sidebar -->
    <div class="mastockinfo_sidebar">
        <div class="mastockinfo_stock-info-box">
            <h2><?php echo esc_html($settings['main_heading']); ?></h2>
        </div>
        <div class="mastockinfo_stock-info">

            <!-- Company Info -->
            <div class="mastockinfo_company-info">
                <!-- Single Company Info -->
                <div class="mastockinfo_single-company-info">
                    <p><span><?php echo esc_html($settings['company_name']); ?></span></p>
                    <a href="<?php echo esc_url($settings['company_url']); ?>"
                        target="_blank"><?php echo esc_html($settings['to_the_portrait']); ?></a>
                </div><!--/ Single Company Info -->

                <!-- Single Company Info -->
                <div class="mastockinfo_single-company-info">
                    <p><span><?php echo esc_html($settings['website_text']); ?></span></p>
                    <a href="<?php echo esc_url($settings['website']); ?>"
                        target="_blank"><?php echo esc_html($settings['visit_text']); ?></a>
                </div><!--/ Single Company Info -->

                <!-- Single Company Info -->
                <div class="mastockinfo_single-company-info">
                    <p><span><?php echo esc_html($settings['industry_text']); ?></span></p>
                    <p><?php echo esc_html($settings['industry']); ?></p>
                </div><!--/ Single Company Info -->

                <!-- Single Company Info -->
                <div class="mastockinfo_single-company-info">
                    <p><span><?php echo esc_html($settings['presentation_text']); ?></span></p>
                    <a href="<?php echo esc_url($settings['presentation']); ?>"
                        target="_blank"><?php echo esc_html($settings['open_text']); ?></a>
                </div><!--/ Single Company Info -->

            </div><!--/ Company Info -->

            <div class="mastockinfo_divider"></div>


            <!-- Stock Ticker/Exchange ID -->
            <div class="mastockinfo_exchange-id">
                <h2 class="mastockinfo_section-title"><?php echo esc_html($settings['exchange_id_text']); ?></h2>

                <div class="mastockinfo_stock-ticker">
                    <p id="<?php echo esc_html($id); ?>-ticker1">
                        <span><?php echo esc_html($settings['wkn_text']); ?>:</span>
                        <?php echo esc_html($settings['exchange_id']); ?>
                    </p>
                    <button class="mastockinfo_copy-btn"
                        onclick="mastockinfo_copyToClipboard('<?php echo esc_html($id); ?>-ticker1')"><?php echo $this->get_copy_icon(); ?><?php echo esc_html($settings['copy_text']); ?></button>
                </div>
                <div class="mastockinfo_stock-ticker">
                    <p id="<?php echo esc_html($id); ?>-ticker2">
                        <span><?php echo esc_html($settings['symbol_text']); ?>:</span>
                        <?php echo esc_html($settings['symbol']); ?>
                    </p>
                    <button class="mastockinfo_copy-btn"
                        onclick="mastockinfo_copyToClipboard('<?php echo esc_html($id); ?>-ticker2')"><?php echo $this->get_copy_icon(); ?><?php echo esc_html($settings['copy_text']); ?></button>
                </div>
                <div class="mastockinfo_stock-ticker">
                    <p id="<?php echo esc_html($id); ?>-ticker3">
                        <span><?php echo esc_html($settings['isin_text']); ?></span>
                        <?php echo esc_html($settings['isin']); ?>
                    </p>
                    <button class="mastockinfo_copy-btn"
                        onclick="mastockinfo_copyToClipboard('<?php echo esc_html($id); ?>-ticker3')"><?php echo $this->get_copy_icon(); ?><?php echo esc_html($settings['copy_text']); ?></button>
                </div>
            </div> <!--/ Stock Ticker/Exchange ID -->

            <div class="mastockinfo_divider"></div>

            <!-- Course Data -->
            <div class="mastockinfo_course-data">
                <h2 class="mastockinfo_section-title"><?php echo esc_html($settings['course_data_text']); ?></h2>

                <!-- Single Course Data -->
                <div class="mastockinfo_single-course-data">
                    <p>
                        <strong><?php echo esc_html($settings['current_price_text']); ?>:</strong>
                    </p>
                    <p><?php echo esc_html($settings['current_price']); ?></p>
                </div><!--/ Single Course Data -->

                <!-- Single Course Data -->
                <div class="mastockinfo_single-course-data">
                    <p>
                        <strong><?php echo esc_html($settings['course_objective_text']); ?>:</strong>
                    </p>
                    <p><?php echo esc_html($settings['course_objective']); ?></p>
                </div><!--/ Single Course Data -->

                <!-- Single Course Data -->
                <div class="mastockinfo_single-course-data">
                    <p>
                        <strong><?php echo esc_html($settings['price_opportunity_text']); ?></strong>
                    </p>
                    <p><?php echo esc_html($course_opportunity); ?>%</p>
                </div><!--/ Single Course Data -->
            </div><!--/ Course Data -->
        </div>
    </div><!--/ Sidebar -->

    <div class="mastockinfo_main_icons">
        <?php include MASTOCKINFO_PLUGIN_PATH . 'includes/widgets/StockWidget/main-icon.php'; ?>
    </div>
</div>