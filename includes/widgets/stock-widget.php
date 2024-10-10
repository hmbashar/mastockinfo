<?php

namespace MSSTOCKINFO\Includes\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Stock_Widget extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'stock_widget';
    }

    public function get_title()
    {
        return __('Stock Information Widget', 'mastockinfo');
    }

    public function get_icon()
    {
        return 'eicon-post-list';
    }

    public function get_categories()
    {
        return ['general'];
    }

    public function get_script_depends()
    {
        return ['mastockinfo-stock-widget'];
    }

    public function get_style_depends()
    {
        return ['mastockinfo-stock-widget'];
    }

    public function get_keywords()
    {
        return ['stock', 'widget'];
    }


    protected function _register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'mastockinfo'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'company_name',
            [
                'label' => __('Company Name', 'mastockinfo'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Green Bridge Metals Corp.', 'mastockinfo'),
            ]
        );

        $this->add_control(
            'website',
            [
                'label' => __('Website', 'mastockinfo'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'https://greenbridgemetals.com/',
            ]
        );

        $this->add_control(
            'presentation',
            [
                'label' => __('Presentation', 'mastockinfo'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'description' => __('Add presentation url here', 'mastockinfo'),
            ]
        );


        $this->add_control(
            'industry',
            [
                'label' => __('Industry', 'mastockinfo'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Commodities', 'mastockinfo'),
            ]
        );

        $this->add_control(
            'exchange_id',
            [
                'label' => __('Exchange ID', 'mastockinfo'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'A3EW4S',
            ]
        );

        $this->add_control(
            'isin',
            [
                'label' => __('ISIN', 'mastockinfo'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'CA3929211025',
            ]
        );

        $this->add_control(
            'symbol',
            [
                'label' => __('Symbol', 'mastockinfo'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'J48',
            ]
        );

        $this->add_control(
            'current_price',
            [
                'label' => __('Current Price', 'mastockinfo'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '0.23 €',
            ]
        );

        $this->add_control(
            'course_objective',
            [
                'label' => __('Course Objective', 'mastockinfo'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '0.25 €',
            ]
        );

        $this->add_control(
            'course_opportunity_auto_switch',
            [
                'label' => __('Opportunity Automatically?', 'mastockinfo'),
                'description' => __('If yes, the course opportunity will be calculated automatically.', 'mastockinfo'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __('Yes', 'mastockinfo'),
                'label_off' => __('No', 'mastockinfo'),
                'return_value' => 'yes',
            ]
        );

        $this->add_control(
            'course_opportunity',
            [
                'label' => __('Course Opportunity', 'mastockinfo'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '9 %',
                'condition' => [
                    'course_opportunity_auto_switch!' => 'yes',
                ],
            ]
        );
        $this->end_controls_section(); // end section



        // Labels section
        $this->start_controls_section(
            'section_labels',
            [
                'label' => __('Labels', 'mastockinfo'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'price_label',
            [
                'label' => __('Price', 'mastockinfo'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Current Price', 'mastockinfo'),
            ]
        );

        $this->add_control(
            'course_objective_label',
            [
                'label' => __('Course Objective', 'mastockinfo'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Course Objective', 'mastockinfo'),
            ]
        );

        $this->add_control(
            'course_opportunity_label',
            [
                'label' => __('Course Opportunity', 'mastockinfo'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Course Opportunity', 'mastockinfo'),
            ]
        );

        $this->add_control(
            'recommendation_label',
            [
                'label' => __('Recommendation', 'mastockinfo'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Recommendation', 'mastockinfo'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
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
        <div class="mastockinfo_sidebar">
            <div class="mastockinfo_stock-info-box">
                <h2><?php echo esc_html__('Stock Information', 'mastockinfo'); ?></h2>
            </div>
            <div class="mastockinfo_stock-info">

                <!-- Company Info -->
                <div class="mastockinfo_company-info">
                    <!-- Single Company Info -->
                    <div class="mastockinfo_single-company-info">
                        <p><strong><?php echo esc_html($settings['company_name']); ?></strong></p>
                        <a href="#" target="_blank"><?php echo esc_html__('Website', 'mastockinfo'); ?></a>
                    </div><!--/ Single Company Info -->

                    <!-- Single Company Info -->
                    <div class="mastockinfo_single-company-info">
                        <p><strong><?php echo esc_html__('Website', 'mastockinfo'); ?></strong></p>
                        <a href="<?php echo esc_html($settings['website']); ?>" target="_blank"><?php echo esc_html__( 'View Website', 'mastockinfo'); ?></a>
                    </div><!--/ Single Company Info -->

                    <!-- Single Company Info -->
                    <div class="mastockinfo_single-company-info">
                        <p><strong><?php echo esc_html__('Industry', 'mastockinfo'); ?></strong></p>
                        <p><?php echo esc_html($settings['industry']); ?></p>
                    </div><!--/ Single Company Info -->

                    <!-- Single Company Info -->
                    <div class="mastockinfo_single-company-info">
                        <p><strong><?php echo esc_html__('Presentation', 'mastockinfo'); ?></strong></p>
                        <a href="<?php echo esc_html($settings['presentation']); ?>" target="_blank"><?php echo esc_html__( 'Open', 'mastockinfo'); ?></a>
                    </div><!--/ Single Company Info -->

                </div><!--/ Company Info -->

                <div class="mastockinfo_divider"></div>


                <!-- Stock Ticker/Exchange ID -->
                <div class="mastockinfo_exchange-id">
                    <h2 class="mastockinfo_section-title"><?php echo esc_html__('Exchange ID', 'mastockinfo'); ?></h2>

                    <div class="mastockinfo_stock-ticker">
                        <p id="<?php echo esc_html($id); ?>-ticker1"><?php echo esc_html__('WKN:', 'mastockinfo'); ?>
                            <strong><?php echo esc_html($settings['exchange_id']); ?></strong>
                        </p>
                        <button class="mastockinfo_copy-btn"
                            onclick="mastockinfo_copyToClipboard('<?php echo esc_html($id); ?>-ticker1')"><?php echo esc_html__('Copy', 'mastockinfo'); ?></button>
                    </div>
                    <div class="mastockinfo_stock-ticker">
                        <p id="<?php echo esc_html($id); ?>-ticker2"><?php echo esc_html__('Symbol:', 'mastockinfo'); ?>
                            <strong><?php echo esc_html($settings['symbol']); ?></strong>
                        </p>
                        <button class="mastockinfo_copy-btn"
                            onclick="mastockinfo_copyToClipboard('<?php echo esc_html($id); ?>-ticker2')"><?php echo esc_html__('Copy', 'mastockinfo'); ?></button>
                    </div>
                    <div class="mastockinfo_stock-ticker">
                        <p id="<?php echo esc_html($id); ?>-ticker3"><?php echo esc_html__('ISIN:', 'mastockinfo'); ?>
                            <strong><?php echo esc_html($settings['isin']); ?></strong>
                        </p>
                        <button class="mastockinfo_copy-btn"
                            onclick="mastockinfo_copyToClipboard('<?php echo esc_html($id); ?>-ticker3')"><?php echo esc_html__('Copy', 'mastockinfo'); ?></button>
                    </div>
                </div> <!--/ Stock Ticker/Exchange ID -->

                <div class="mastockinfo_divider"></div>

                <!-- Course Data -->
                <div class="mastockinfo_course-data">
                    <h2 class="mastockinfo_section-title"><?php echo esc_html__('Course Data', 'mastockinfo'); ?></h2>

                    <!-- Single Course Data -->
                    <div class="mastockinfo_single-course-data">
                        <p>
                            <strong><?php echo esc_html__('Current price:', 'mastockinfo'); ?></strong>
                        </p>
                        <p><?php echo esc_html($settings['current_price']); ?></p>
                    </div><!--/ Single Course Data -->

                    <!-- Single Course Data -->
                    <div class="mastockinfo_single-course-data">
                        <p>
                            <strong><?php echo esc_html__('Course objective:', 'mastockinfo'); ?></strong>
                        </p>
                        <p><?php echo esc_html($settings['course_objective']); ?></p>
                    </div><!--/ Single Course Data -->

                    <!-- Single Course Data -->
                    <div class="mastockinfo_single-course-data">
                        <p>
                            <strong><?php echo esc_html__('Price Opportunity:', 'mastockinfo'); ?></strong>
                        </p>
                        <p><?php echo esc_html($course_opportunity); ?>%</p>
                    </div><!--/ Single Course Data -->


                </div><!--/ Course Data -->
            </div>
        </div>
        <?php
    }

}