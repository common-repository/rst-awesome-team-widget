<?php
/**
 * RST Awesome Team Widget.
 *
 * Elementor widget that inserts heading into the page
 *
 * @since 1.0.0
 */
class RST_Elementor_Teams_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve RST Awesome Team Widget 
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'awesome-team';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve RST Awesome Team Widget .
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'RST Teams', 'rst_soft' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve heading  widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-user-circle-o';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the heading widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'rst_soft_cat' ];
	}

	/**
	 * Register heading widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		
		// start of the Content tab section
	   $this->start_controls_section(
	       'content-section',
		    [
		        'label' => esc_html__('Content','rst_soft'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		   
		    ]
	    );
		
		// Team Card Layout
		$this->add_control(
			'team_layout',
			[
				'label' => esc_html__( 'Select Layout', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'team-style-1',
				'options' => [
					'team-style-1' => esc_html__( 'Team Style 1', 'rst_soft' ),
					'team-style-2' => esc_html__( 'Team Style 2', 'rst_soft' ),
					'team-style-3' => esc_html__( 'Team Style 3', 'rst_soft' ),
					'team-style-4' => esc_html__( 'Team Style 4', 'rst_soft' ),
					'team-style-5' => esc_html__( 'Team Style 5', 'rst_soft' ),
					'team-style-6' => esc_html__( 'Team Style 6', 'rst_soft' ),
					'team-style-7' => esc_html__( 'Team Style 7', 'rst_soft' ),
					'team-style-8' => esc_html__( 'Team Style 8', 'rst_soft' ),
					'team-style-9' => esc_html__( 'Team Style 9', 'rst_soft' ),
					'team-style-10' => esc_html__( 'Team Style 10', 'rst_soft' ),
				],
			]
		);

		// Team Image
		$this->add_control(
			'team_image',
			[
				'label' => esc_html__( 'Choose Image', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'separator' => 'before',
			]
		);

		// Team Name
		$this->add_control(
			'team_name',
			[
				'label' => esc_html__( 'Name', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'John Doe', 'rst_soft' ),
				'placeholder' => esc_html__( 'Type your name here', 'rst_soft' ),
				'separator' => 'before',
				'label_block' => true
			]
		);

		// Team Designation
		$this->add_control(
			'team_designation',
			[
				'label' => esc_html__( 'Designtion', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Web Developer', 'rst_soft' ),
				'placeholder' => esc_html__( 'Type your designation here', 'rst_soft' ),
				'separator' => 'before',
				'label_block' => true
			]
		);

		// Team Socials
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'team_social_name',
			[
				'label' => esc_html__( 'Team Social Name', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Facebook', 'rst_soft' ),
				'placeholder' => esc_html__( 'Type your icon name here', 'rst_soft' ),
				'separator' => 'before',
			]
		);

		$repeater->add_control(
			'team_social_icon',
			[
				'label' => esc_html__( 'Team Social Icon', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);

		$repeater->add_control(
			'team_social_link', [
				'label' => esc_html__( 'Team Social Link', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'rst_soft' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
			]
		);

		$this->add_control(
			'team_socials',
			[
				'label' => esc_html__( 'Team Socials List', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'team_social_name' => esc_html__( 'Facbook', 'rst_soft' ),
						'team_social_link' => 'https://www.facebook.com',
						'team_social_icon' => 'fab fa-facebook-f'
					],
					[
						'team_social_name' => esc_html__( 'Twitter', 'rst_soft' ),
						'team_social_link' => 'https://www.twitter.com',
						'team_social_icon' => 'fab fa-twitter'
					],
					[
						'team_social_name' => esc_html__( 'Instagram', 'rst_soft' ),
						'team_social_link' => 'https://www.instagram.com',
						'team_social_icon' => 'fab fa-instagram'
					],
					[
						'team_social_name' => esc_html__( 'Linekdin', 'rst_soft' ),
						'team_social_link' => 'https://www.linkedin.com',
						'team_social_icon' => 'fab fa-linkedin-in'
					]
				],
				'title_field' => '{{{ team_social_name }}}',
				'separator' => 'before',
			]
		);
		
		$this->end_controls_section();
		// end of the Content tab section
		
		// Start of Style tab section

		// Team Image
		$this->start_controls_section(
			'team_image_section',
			[
				'label' => esc_html__( 'Image', 'rst_soft' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Team Image Width
		$this->add_control(
			'team_image_width',
			[
				'label' => esc_html__( 'Width', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 280,
				],
				'selectors' => [
					'{{WRAPPER}} .thumb img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Team Image Height
		$this->add_control(
			'team_image_height',
			[
				'label' => esc_html__( 'Height', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 320,
				],
				'selectors' => [
					'{{WRAPPER}} .thumb img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Team Image Border Radius
		$this->add_control(
			'team_image_round',
			[
				'label' => esc_html__( 'Border Radius', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .thumb, .thumb img, .single-team-member-02 .thumb .border' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();


		// Team Title
		$this->start_controls_section(
			'team_title_section',
			[
				'label' => esc_html__( 'Title', 'rst_soft' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Title Color
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .content .title' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .content .title',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		$this->end_controls_section();

		// Team Designation
		$this->start_controls_section(
			'team_desg_section',
			[
				'label' => esc_html__( 'Designation', 'rst_soft' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Designation Color
		$this->add_control(
			'desg_color',
			[
				'label' => esc_html__( 'Color', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .content .post, .single-team-member-08 .thumb .post' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Designation Background
		$this->add_control(
			'desg_background',
			[
				'label' => esc_html__( 'Background', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-team-member-08 .thumb .post' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				],
				'condition' => [
					'team_layout' => 'team-style-8',
				]
			]
		);

		// Designation Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desg_typography',
				'selector' => '{{WRAPPER}} .content .post, .single-team-member-08 .thumb .post',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_section();
		// End of Style tab section

		// Team Social
		$this->start_controls_section(
			'team_social_section',
			[
				'label' => esc_html__( 'Social', 'rst_soft' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'style_tabs'
		);

		// Socail Normal Tab
		$this->start_controls_tab(
			'social_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'rst_soft' ),
			]
		);
		$this->end_controls_tab();
		

		// Social Icon Color
		$this->add_control(
			'social_icon_color',
			[
				'label' => esc_html__( 'Color', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .content .social-icon li a, .single-team-member-09 .thumb .hover .social-icon li a' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Social Icon Background
		$this->add_control(
			'social_icon_background',
			[
				'label' => esc_html__( 'Background', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .content .social-icon li a, .single-team-member-09 .thumb .hover .social-icon li a' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Social Icon Size
		$this->add_control(
			'social_icon_size',
			[
				'label' => esc_html__( 'Size', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 14,
				],
				'selectors' => [
					'{{WRAPPER}} .content .social-icon li a, .single-team-member-09 .thumb .hover .social-icon li a' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Social Icon Width
		$this->add_control(
			'social_icon_width',
			[
				'label' => esc_html__( 'Width', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 60,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .content .social-icon li a, .single-team-member-09 .thumb .hover .social-icon li a' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Social Icon Height
		$this->add_control(
			'social_icon_height',
			[
				'label' => esc_html__( 'Height', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 60,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .content .social-icon li a, .single-team-member-09 .thumb .hover .social-icon li a' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Social Icon Line Height
		$this->add_control(
			'social_icon_line_height',
			[
				'label' => esc_html__( 'Line Height', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 60,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .content .social-icon li a, .single-team-member-09 .thumb .hover .social-icon li a' => 'line-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Social Icon Border Radius
		$this->add_control(
			'social_icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .content .social-icon li a, .single-team-member-09 .thumb .hover .social-icon li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// Socail Hover Tab
		$this->start_controls_tab(
			'social_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'rst_soft' ),
			]
		);

		// Social Icon Hover Color
		$this->add_control(
			'social_icon_hover_color',
			[
				'label' => esc_html__( 'Color', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .content .social-icon li a:hover, .single-team-member-09 .thumb .hover .social-icon li a:hover' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Social Icon Hover Background
		$this->add_control(
			'social_icon_hover_background',
			[
				'label' => esc_html__( 'Background', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .content .social-icon li a:hover, .single-team-member-09 .thumb .hover .social-icon li a:hover' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Social Icon Hover Size
		$this->add_control(
			'social_icon_hover_size',
			[
				'label' => esc_html__( 'Size', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 14,
				],
				'selectors' => [
					'{{WRAPPER}} .content .social-icon li a:hover, .single-team-member-09 .thumb .hover .social-icon li a:hover' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Social Icon Hover Width
		$this->add_control(
			'social_icon_hover_width',
			[
				'label' => esc_html__( 'Width', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 60,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .content .social-icon li a:hover, .single-team-member-09 .thumb .hover .social-icon li a:hover' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Social Icon Hover Height
		$this->add_control(
			'social_icon_hover_height',
			[
				'label' => esc_html__( 'Height', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 60,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .content .social-icon li a:hover, .single-team-member-09 .thumb .hover .social-icon li a:hover' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Social Icon Hover Line Height
		$this->add_control(
			'social_icon_hover_line_height',
			[
				'label' => esc_html__( 'Line Height', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 60,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .content .social-icon li a:hover, .single-team-member-09 .thumb .hover .social-icon li a:hover' => 'line-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Social Icon Hover Border Radius
		$this->add_control(
			'social_icon_hover_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .content .social-icon li a:hover, .single-team-member-09 .thumb .hover .social-icon li a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		// End of Style tab section

		// Team Layout
		$this->start_controls_section(
			'team_layout_section',
			[
				'label' => esc_html__( 'Layout', 'rst_soft' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Team Layout Background
		$this->add_control(
			'team_layout_background',
			[
				'label' => esc_html__( 'Background', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-team-member-01 .content' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				],
				'condition' => [
					'team_layout' => 'team-style-1',
				]
			]
		);

		// Team Image Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'team_image_border',
				'label' => esc_html__( 'Border', 'rst_soft' ),
				'selector' => '{{WRAPPER}} .single-team-member-02 .thumb .border',
				'condition' => [
					'team_layout' => 'team-style-2',
				]
			]
		);

		// Team Style 3 Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'team_image_style3_border',
				'label' => esc_html__( 'Border', 'rst_soft' ),
				'selector' => '{{WRAPPER}} .single-team-member-03 .thumb',
				'condition' => [
					'team_layout' => 'team-style-3',
				]
			]
		);

		// Team Style 3 Background
		$this->add_control(
			'team_layout_03_background',
			[
				'label' => esc_html__( 'Background', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-team-member-03' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				],
				'condition' => [
					'team_layout' => 'team-style-3',
				]
			]
		);

		// Team Style 10 Border
		$this->add_control(
			'team_layout_10_border',
			[
				'label' => esc_html__( 'Border Color', 'rst_soft' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-team-member-10 .content' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				],
				'condition' => [
					'team_layout' => 'team-style-10',
				]
			]
		);

		$this->end_controls_section();
		// End of Style tab section

	}

	/**
	 * Render heading  widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		// get our input from the widget settings.
		$settings = $this->get_settings_for_display();	
		$team_layout = $settings['team_layout'];
		$team_image = $settings['team_image'];
		$team_name = $settings['team_name'];
		$team_designation = $settings['team_designation'];
		$team_socials = $settings['team_socials'];

		switch ($team_layout) {
			case "team-style-1":
				include( __DIR__ . '/parts/team-style-1.php' );
				break;
			case "team-style-2":
				include( __DIR__ . '/parts/team-style-2.php' );
				break;
			case "team-style-3":
				include( __DIR__ . '/parts/team-style-3.php' );
				break;
			case "team-style-4":
				include( __DIR__ . '/parts/team-style-4.php' );
				break;
			case "team-style-5":
				include( __DIR__ . '/parts/team-style-5.php' );
				break;
			case "team-style-6":
				include( __DIR__ . '/parts/team-style-6.php' );
				break;
			case "team-style-7":
				include( __DIR__ . '/parts/team-style-7.php' );
				break;
			case "team-style-8":
				include( __DIR__ . '/parts/team-style-8.php' );
				break;
			case "team-style-9":
				include( __DIR__ . '/parts/team-style-9.php' );
				break;
			case "team-style-10":
				include( __DIR__ . '/parts/team-style-10.php' );
				break;
			default:
			include( __DIR__ . '/parts/team-style-1.php' );
			}
	}
}