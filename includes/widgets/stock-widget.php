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
        echo '<div class="stock-widget">';
        echo '<h2>' . esc_html($settings['company_name']) . '</h2>';
        echo '<p><strong>Website:</strong> <a href="' . esc_url($settings['website']) . '" target="_blank">' . esc_html($settings['website']) . '</a></p>';
        echo '<p><strong>Industry:</strong> ' . esc_html($settings['industry']) . '</p>';
        echo '<p><strong>Exchange ID:</strong> ' . esc_html($settings['exchange_id']) . '</p>';
        echo '<p><strong>ISIN:</strong> ' . esc_html($settings['isin']) . '</p>';
        echo '<p><strong>Symbol:</strong> ' . esc_html($settings['symbol']) . '</p>';
        echo '<p><strong>Current Price:</strong> ' . esc_html($settings['current_price']) . '</p>';
        echo '<p><strong>Course Objective:</strong> ' . esc_html($settings['course_objective']) . '</p>';
        echo '<p><strong>Course Opportunity:</strong> ' . esc_html($settings['course_opportunity']) . '</p>';
        echo '<p><strong>Recommendation:</strong> ' . esc_html($settings['recommendation']) . '</p>';
        echo '</div>';
    }
}