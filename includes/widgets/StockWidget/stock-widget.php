<?php

namespace MSSTOCKINFO\Includes\Widgets\StockWidget;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;


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
                'label' => __('General', 'mastockinfo'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'company_name',
            [
                'label' => __('Company Name', 'mastockinfo'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Green Bridge Metals Corp.', 'mastockinfo'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'company_url',
            [
                'label' => __('Company URL', 'mastockinfo'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('https://greenbridgemetals.com', 'mastockinfo'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'website',
            [
                'label' => __('Website', 'mastockinfo'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'https://greenbridgemetals.com/',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'presentation',
            [
                'label' => __('Presentation', 'mastockinfo'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'description' => __('Add presentation url here', 'mastockinfo'),
                'label_block' => true,
                'placeholder' => 'input presentation url here',
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

        $this->end_controls_section(); // end section


        // Exchange section
        $this->start_controls_section(
            'section_exchange',
            [
                'label' => __('Exchange', 'mastockinfo'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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

        $this->end_controls_section(); // end section

        // Course data section
        $this->start_controls_section(
            'section_course_data',
            [
                'label' => __('Course data', 'mastockinfo'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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

                // start controls section for labels
                $this->start_controls_section(
                    'labels_contents',
                    [
                        'label' => __('Labels', 'mastockinfo'),
                        'tab' => Controls_Manager::TAB_CONTENT,
                    ]
                );
                // main heading
                $this->add_control(
                    'main_heading',
                    [
                        'label' => __('Main Heading', 'mastockinfo'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('Stock Information', 'mastockinfo'),
                        'placeholder' => __('Type your main heading here', 'mastockinfo'),                
                        'label_block' => true,
                    ]
                );
        
                // To the portrait
                $this->add_control(
                    'to_the_portrait',
                    [
                        'label' => __('To the portrait', 'mastockinfo'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('To the portrait', 'mastockinfo'),
                        'placeholder' => __('type your text', 'mastockinfo'),                
                        'label_block' => true,
                    ]
                );
        
                // Website
                $this->add_control(
                    'website_text',
                    [
                        'label' => __('Website', 'mastockinfo'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('Website', 'mastockinfo'),
                        'placeholder' => __('type your text', 'mastockinfo'),                
                        'label_block' => true,
                    ]
                );
                // Visit
                $this->add_control(
                    'visit_text',
                    [
                        'label' => __('Visit', 'mastockinfo'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('Visit', 'mastockinfo'),
                        'placeholder' => __('type your text', 'mastockinfo'),                
                        'label_block' => true,
                    ]
                );
                // Industry
                $this->add_control(
                    'industry_text',
                    [
                        'label' => __('Industry', 'mastockinfo'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('Industry', 'mastockinfo'),
                        'placeholder' => __('type your text', 'mastockinfo'),                
                        'label_block' => true,
                    ]
                );
                // Presentation
                $this->add_control(
                    'presentation_text',
                    [
                        'label' => __('Presentation', 'mastockinfo'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('Presentation', 'mastockinfo'),
                        'placeholder' => __('type your text', 'mastockinfo'),                
                        'label_block' => true,
                    ]
                );
                // Open
                $this->add_control(
                    'open_text',
                    [
                        'label' => __('Open', 'mastockinfo'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('Open', 'mastockinfo'),
                        'placeholder' => __('type your text', 'mastockinfo'),                
                        'label_block' => true,
                    ]
                );
                // Exchange ID
                $this->add_control(
                    'exchange_id_text',
                    [
                        'label' => __('Exchange ID', 'mastockinfo'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('Exchange ID', 'mastockinfo'),
                        'placeholder' => __('type your text', 'mastockinfo'),                
                        'label_block' => true,
                    ]
                );
                // WKN
                $this->add_control(
                    'wkn_text',
                    [
                        'label' => __('WKN', 'mastockinfo'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('WKN', 'mastockinfo'),
                        'placeholder' => __('type your text', 'mastockinfo'),                
                        'label_block' => true,
                    ]
                );
                // Copy
                $this->add_control(
                    'copy_text',
                    [
                        'label' => __('Copy', 'mastockinfo'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('Copy', 'mastockinfo'),
                        'placeholder' => __('type your text', 'mastockinfo'),                
                        'label_block' => true,
                    ]
                );
                // Symbol
                $this->add_control(
                    'symbol_text',
                    [
                        'label' => __('Symbol', 'mastockinfo'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('Symbol', 'mastockinfo'),
                        'placeholder' => __('type your text', 'mastockinfo'),                
                        'label_block' => true,
                    ]
                );
                // ISIN
                $this->add_control(
                    'isin_text',
                    [
                        'label' => __('ISIN', 'mastockinfo'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('ISIN', 'mastockinfo'),
                        'placeholder' => __('type your text', 'mastockinfo'),                
                        'label_block' => true,
                    ]
                );
                // Course Data
                $this->add_control(
                    'course_data_text',
                    [
                        'label' => __('Course Data', 'mastockinfo'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('Course Data', 'mastockinfo'),
                        'placeholder' => __('type your text', 'mastockinfo'),                
                        'label_block' => true,
                    ]
                );
                // Current price
                $this->add_control(
                    'current_price_text',
                    [
                        'label' => __('Current price', 'mastockinfo'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('Current price', 'mastockinfo'),
                        'placeholder' => __('type your text', 'mastockinfo'),                
                        'label_block' => true,
                    ]
                );
                // Course objective
                $this->add_control(
                    'course_objective_text',
                    [
                        'label' => __('Course objective', 'mastockinfo'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('Course objective', 'mastockinfo'),
                        'placeholder' => __('type your text', 'mastockinfo'),                
                        'label_block' => true,
                    ]
                );
                // Price Opportunity
                $this->add_control(
                    'price_opportunity_text',
                    [
                        'label' => __('Price Opportunity', 'mastockinfo'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('Price Opportunity', 'mastockinfo'),
                        'placeholder' => __('type your text', 'mastockinfo'),                
                        'label_block' => true,
                    ]
                );
        
                $this->end_controls_section(); // end content section for labels

        $this->start_controls_section(
            'general_style',
            [
                'label' => __('General', 'mastockinfo'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'sidebar_width',
            [
                'label' => __('Width', 'mastockinfo'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 800,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 5,
                        'max' => 40,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .mastockinfo_sidebar' => 'width: {{SIZE}}{{UNIT}};max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'divider_border_color',
            [
                'label' => __('Divider Color', 'mastockinfo'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mastockinfo_divider' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sidebar_background',
                'label' => __('Background', 'mastockinfo'),
                'types' => ['classic', 'gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .mastockinfo_sidebar',
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __('Padding', 'mastockinfo'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .mastockinfo_sidebar' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => __('Border', 'mastockinfo'),
                'selector' => '{{WRAPPER}} .mastockinfo_sidebar',
            ]
        );

        $this->add_responsive_control(
            'border_radius',
            [
                'label' => __('Border Radius', 'mastockinfo'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .mastockinfo_sidebar' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section(); // end section


        // style section for heading
        $this->start_controls_section(
            'section_style_heading',
            [
                'label' => __('Heading', 'mastockinfo'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'heading_typography',
                'label' => __('Typography', 'mastockinfo'),
                'selector' => '{{WRAPPER}} .mastockinfo_stock-info-box h2',
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label' => __('Color', 'mastockinfo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mastockinfo_stock-info-box h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'heading_padding',
            [
                'label' => __('Padding', 'mastockinfo'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .mastockinfo_stock-info-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'heading_background',
                'label' => __('Background', 'mastockinfo'),
                'types' => ['classic', 'gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .mastockinfo_stock-info-box',
            ]
        );

        $this->end_controls_section(); // end style section for heading


        $this->start_controls_section(
            'company_info_style',
            [
                'label' => __('Company Info', 'mastockinfo'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'company_info_gap',
            [
                'label' => __('Gap', 'mastockinfo'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .mastockinfo_company-info' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'company_info_typography',
                'label' => __('Typography', 'mastockinfo'),
                'selector' => '{{WRAPPER}} .mastockinfo_single-company-info p, {{WRAPPER}} .mastockinfo_single-company-info p span',
            ]
        );

        $this->add_control(
            'company_info_color',
            [
                'label' => __('Color', 'mastockinfo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .mastockinfo_single-company-info p' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __('Button Typography', 'mastockinfo'),
                'selector' => '{{WRAPPER}} .mastockinfo_single-company-info a',
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'company_info_button_width',
            [
                'label' => __('Button Width', 'mastockinfo'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .mastockinfo_single-company-info a' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'company_info_button_padding',
            [
                'label' => __('Button Padding', 'mastockinfo'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .mastockinfo_single-company-info a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'company_info_button_border',
                'label' => __('Button Border', 'mastockinfo'),
                'selector' => '{{WRAPPER}} .mastockinfo_single-company-info a',
            ]
        );

        $this->add_responsive_control(
            'company_info_button_border_radius',
            [
                'label' => __('Button Border Radius', 'mastockinfo'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .mastockinfo_single-company-info a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs(
            'company_info_button_tabs'
        );

        $this->start_controls_tab(
            'company_info_button_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'mastockinfo' ),
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'company_info_button_background',
                'label' => __('Background', 'mastockinfo'),
                'types' => ['classic', 'gradient'],
                'exclude' => ['image'],
                'separator' => 'before',
                'selector' => '{{WRAPPER}} .mastockinfo_single-company-info a',
                'fields_options' => [
                    'background' => [
                        'label' => __('Button Background', 'mastockinfo'),
                    ],
                ]
            ]
        );

        $this->add_control(
            'company_info_button_text_color',
            [
                'label' => __('Button Text Color', 'mastockinfo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mastockinfo_single-company-info a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'company_info_button_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'mastockinfo' ),
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'company_info_button_background_hover',
                'label' => __('Background', 'mastockinfo'),
                'types' => ['classic', 'gradient'],
                'exclude' => ['image'],
                'separator' => 'before',
                'selector' => '{{WRAPPER}} .mastockinfo_single-company-info a:hover',
                'fields_options' => [
                    'background' => [
                        'label' => __('Button Background', 'mastockinfo'),
                    ],
                ]
            ]
        );

        $this->add_control(
            'company_info_button_text_color_hover',
            [
                'label' => __('Button Text Color', 'mastockinfo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mastockinfo_single-company-info a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'company_info_button_border_color_hover',
            [
                'label' => __('Button Border Color', 'mastockinfo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mastockinfo_single-company-info a:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs(); // end tabs for normal and hover

        $this->end_controls_section(); // end style section for company info

        $this->start_controls_section(
            'section_exchange_style',
            [
                'label' => __('Exchange', 'mastockinfo'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'exchange_heading_color',
            [
                'label' => __('Heading Color', 'mastockinfo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mastockinfo_exchange-id .mastockinfo_section-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'exchange_heading_typography',
                'label' => __('Heading Typography', 'mastockinfo'),
                'selector' => '{{WRAPPER}} .mastockinfo_exchange-id .mastockinfo_section-title',
            ]
        );

        $this->add_control(
            'exchange_content_color',
            [
                'label' => __('Content Color', 'mastockinfo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mastockinfo_stock-ticker p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'exchange_content_typography',
                'label' => __('Content Typography', 'mastockinfo'),
                'selector' => '{{WRAPPER}} .mastockinfo_stock-ticker p',
            ]
        );

        
        $this->add_control(
            'exchange_button_width',
            [
                'label' => __('Button Width', 'mastockinfo'),
                'type' => Controls_Manager::SLIDER,
                'separator' => 'before',
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 70,
                        'max' => 300,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 20,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .mastockinfo_copy-btn' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'exchange_button_typography',
                'label' => __('Button Typography', 'mastockinfo'),
                'selector' => '{{WRAPPER}} .mastockinfo_copy-btn',
            ]
        );
        $this->add_responsive_control(
            'exchange_button_icon_size',
            [
                'label' => __('Icon Size', 'mastockinfo'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 80,
                        'step' => 5,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .mastockinfo_copy-btn svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'exchange_button_padding',
            [
                'label' => __('Button Padding', 'mastockinfo'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .mastockinfo_copy-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'exchange_button_border',
                'label' => __('Border', 'mastockinfo'),
                'selector' => '{{WRAPPER}} .mastockinfo_copy-btn',
            ]
        );

        $this->add_responsive_control(
            'exchange_button_border_radius',
            [
                'label' => __('Border Radius', 'mastockinfo'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .mastockinfo_copy-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // tabs
        $this->start_controls_tabs('exchange_button_tabs');
        // tab for button normal
        $this->start_controls_tab(
            'exchange_button_normal',
            [
                'label' => __('Normal', 'mastockinfo'),
            ]
        );

        $this->add_control(
            'exchange_button_normal_text_color',
            [
                'label' => __('Button Text Color', 'mastockinfo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mastockinfo_copy-btn' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .mastockinfo_copy-btn svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'exchange_button_background',
                'label' => __('Background', 'mastockinfo'),
                'types' => ['classic', 'gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .mastockinfo_copy-btn',
                'fields_options' => [
                    'background' => [
                        'label' => __('Button Background', 'mastockinfo'),
                    ],
                ],
            ]
        );

        $this->end_controls_tab(); // end tab for button normal

        // start tab for button hover
        $this->start_controls_tab(
            'exchange_button_hover',
            [
                'label' => __('Hover', 'mastockinfo'),
            ]
        );

        $this->add_control(
            'exchange_button_hover_text_color',
            [
                'label' => __('Text Color', 'mastockinfo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mastockinfo_copy-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'exchange_button_hover_background',
                'label' => __('Background', 'mastockinfo'),
                'types' => ['classic', 'gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .mastockinfo_copy-btn:hover',
                'fields_options' => [
                    'background' => [
                        'label' => __('Button Background', 'mastockinfo'),
                    ],
                ],
            ]
        );

        $this->end_controls_tab(); // end tab for button hover
        $this->end_controls_tabs(); // end tabs for button normal and hover        
        $this->end_controls_section(); // end style section for exchange


        // start controls section for course data
        $this->start_controls_section(
            'course_data_style',
            [
                'label' => __('Course Data', 'mastockinfo'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'course_data_heading_color',
            [
                'label' => __('Heading Text Color', 'mastockinfo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mastockinfo_course-data .mastockinfo_section-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'course_data_heading_typography',
                'label' => __('Heading Typography', 'mastockinfo'),
                'selector' => '{{WRAPPER}} .mastockinfo_course-data .mastockinfo_section-title',
            ]
        );

        $this->add_control(
            'course_data_text_color',
            [
                'label' => __('Text Color', 'mastockinfo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mastockinfo_single-course-data p strong' => 'color: {{VALUE}};',
                ],
            ]
        );
    

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'course_data_typography',
                'label' => __('Typography', 'mastockinfo'),
                'selector' => '{{WRAPPER}} .mastockinfo_single-course-data p strong',
            ]
        );

        $this->add_control(
            'course_data_price_text_color',
            [
                'label' => __('Price Color', 'mastockinfo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mastockinfo_single-course-data p:not(:has(strong))' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'course_data_price_typography',
                'label' => __('Price Typography', 'mastockinfo'),
                'selector' => '{{WRAPPER}} .mastockinfo_single-course-data p:not(:has(strong))',
            ]
        );
        $this->end_controls_section(); // end style section for course data


    }

    public function get_copy_icon()
    {
        ?>
        <svg xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
            <path
                d="M384 336l-192 0c-8.8 0-16-7.2-16-16l0-256c0-8.8 7.2-16 16-16l140.1 0L400 115.9 400 320c0 8.8-7.2 16-16 16zM192 384l192 0c35.3 0 64-28.7 64-64l0-204.1c0-12.7-5.1-24.9-14.1-33.9L366.1 14.1c-9-9-21.2-14.1-33.9-14.1L192 0c-35.3 0-64 28.7-64 64l0 256c0 35.3 28.7 64 64 64zM64 128c-35.3 0-64 28.7-64 64L0 448c0 35.3 28.7 64 64 64l192 0c35.3 0 64-28.7 64-64l0-32-48 0 0 32c0 8.8-7.2 16-16 16L64 464c-8.8 0-16-7.2-16-16l0-256c0-8.8 7.2-16 16-16l32 0 0-48-32 0z" />
        </svg>
        <?php
    }

    protected function render()
    {
        include MASTOCKINFO_PLUGIN_PATH . 'includes/widgets/StockWidget/renderview.php';
    }

}