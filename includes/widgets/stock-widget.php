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
            'course_opportunity',
            [
                'label' => __('Course Opportunity', 'mastockinfo'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '9 %',
            ]
        );

        $this->add_control(
            'recommendation',
            [
                'label' => __('Recommendation', 'mastockinfo'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Buy Strong', 'mastockinfo'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $id = $this->get_id();
        ?>
        <div class="mastockinfo_sidebar">
            <div class="mastockinfo_stock-info-box">
                <h2><?php echo esc_html__('Stock Information', 'mastockinfo'); ?></h2>
            </div>
            <div class="mastockinfo_stock-info">
                <div class="mastockinfo_company-info">
                    <p><strong><?php echo esc_html($settings['company_name']); ?></strong></p>
                    <p><?php echo esc_html__('Sector:', 'mastockinfo'); ?> <strong><?php echo esc_html($settings['industry']); ?></strong></p>
                </div>
    
                <div class="mastockinfo_divider"></div>
    
                <div class="mastockinfo_stock-ticker">
                    <p id="<?php echo esc_html($id); ?>-ticker1"><?php echo esc_html__('Exchange ID:', 'mastockinfo'); ?> <strong><?php echo esc_html($settings['exchange_id']); ?></strong></p>
                    <button class="mastockinfo_copy-btn" onclick="mastockinfo_copyToClipboard('<?php echo esc_html($id); ?>-ticker1')"><?php echo esc_html__('Copy', 'mastockinfo'); ?></button>
                </div>
                <div class="mastockinfo_stock-ticker">
                    <p id="<?php echo esc_html($id); ?>-ticker2"><?php echo esc_html__('Symbol:', 'mastockinfo'); ?> <strong><?php echo esc_html($settings['symbol']); ?></strong></p>
                    <button class="mastockinfo_copy-btn" onclick="mastockinfo_copyToClipboard('<?php echo esc_html($id); ?>-ticker2')"><?php echo esc_html__('Copy', 'mastockinfo'); ?></button>
                </div>
                <div class="mastockinfo_stock-ticker">
                    <p id="<?php echo esc_html($id); ?>-ticker3"><?php echo esc_html__('ISIN:', 'mastockinfo'); ?> <strong><?php echo esc_html($settings['isin']); ?></strong></p>
                    <button class="mastockinfo_copy-btn" onclick="mastockinfo_copyToClipboard('<?php echo esc_html($id); ?>-ticker3')"><?php echo esc_html__('Copy', 'mastockinfo'); ?></button>
                </div>
            </div>
        </div>
        <?php
    }
    
}