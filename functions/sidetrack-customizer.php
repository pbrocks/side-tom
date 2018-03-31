<?php

//
// Theme Customizer
//
function sidetracktheme_customizer( $sidetrack ) {

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = 'Select a page:';
	foreach ( $options_pages_obj as $page ) {
		$options_pages[ $page->ID ] = $page->post_title;
	}

	// Text Area Control
	class Sidetrack_Textarea_Control extends WP_Customize_Control {
		public $type = 'textarea';

		public function render_content() {
			?>
			<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			</label>
			<?php
		}
	}

	// General
	$sidetrack->add_panel(
		'sidetrackclient' , array(
			'title'      => __( 'Hive IO', 'sidetrack-studio' ),
			'priority'   => 3,
		)
	);
	$sidetrack->add_section(
		'sidetrackgeneral' , array(
			'title'      => __( 'Hive IO General', 'sidetrack-studio' ),
			'priority'   => 3,
			'panel'      => 'sidetrackclient',
		)
	);
	$sidetrack->add_setting(
		'sidetrack_colors_checkbox', array(
			'capability' => 'edit_theme_options',
			'type'       => 'option',
		)
	);
	$sidetrack->add_control(
		'sidetrack_colors_checkbox', array(
			'settings' => 'sidetrack_colors_checkbox',
			'label'    => __( 'Display Sections Colors' ),
			'section'  => 'sidetrackgeneral',
			'type'     => 'checkbox',
		)
	);

	$sidetrack->add_setting( 'sidetrackmap_address' );
	$sidetrack->add_control(
		new Sidetrack_Textarea_Control(
			$sidetrack, 'map_address', array(
				'label'   => 'Map Address',
				'section' => 'sidetrackgeneral',
				'settings'   => 'sidetrackmap_address',
				'priority'   => 13,
			)
		)
	);
	$sidetrack->add_section(
		'sidetrackimages' , array(
			'title'      => __( 'Hive IO Images', 'sidetrack-studio' ),
			'priority'   => 3,
			'panel'      => 'sidetrackclient',
		)
	);

	$sidetrack->add_setting( 'sidetrack-header-bg' );
	$sidetrack->add_control(
		new WP_Customize_Image_Control(
			$sidetrack, 'header-bg', array(
				'label'    => __( 'Header Background', 'sidetrack-studio' ),
				'description'  => 'JPG or PNG acceptable with this uploader.',
				'section'  => 'sidetrackimages',
				'settings' => 'sidetrack-header-bg',
			)
		)
	);

	$sidetrack->add_setting( 'sidetracklogo' );
	$sidetrack->add_control(
		new WP_Customize_Image_Control(
			$sidetrack, 'logo', array(
				'label'    => __( 'Logo', 'sidetrack-studio' ),
				'section'  => 'sidetrackimages',
				'settings' => 'sidetracklogo',
			)
		)
	);
	$sidetrack->add_setting( 'sidetrack_mobile_logo' );
	$sidetrack->add_control(
		new WP_Customize_Image_Control(
			$sidetrack, 'mobile_logo', array(
				'label'    => __( 'Mobile Logo', 'sidetrack-studio' ),
				'section'  => 'sidetrackimages',
				'settings' => 'sidetrack_mobile_logo',
			)
		)
	);

	$sidetrack->add_setting( 'sidetrackfavicon' );
	$sidetrack->add_control(
		new WP_Customize_Image_Control(
			$sidetrack, 'favicon', array(
				'label'    => __( 'Favicon', 'sidetrack-studio' ),
				'section'  => 'sidetrackimages',
				'settings' => 'sidetrackfavicon',
			)
		)
	);
	$sidetrack->add_section(
		'sidetrackcss' , array(
			'title'      => __( 'Hive IO CSS', 'sidetrack-studio' ),
			'priority'   => 3,
			'panel'      => 'sidetrackclient',
		)
	);
	$sidetrack->add_setting( 'sidetrackcustom_css' );
	$sidetrack->add_control(
		new Sidetrack_Textarea_Control(
			$sidetrack, 'custom_css', array(
				'label'   => 'Custom CSS',
				'section' => 'sidetrackcss',
				'settings'   => 'sidetrackcustom_css',
				'priority'   => 13,
			)
		)
	);

	// Colors
	$sidetrack->add_setting(
		'sidetrackheader_color',
		array(
			'default'        => '#3098cc',
		)
	);
	$sidetrack->add_control(
		new WP_Customize_Color_Control(
			$sidetrack, 'header_color', array(
				'label'      => __( 'Header Color', 'sidetrack-studio' ),
				'section'    => 'colors',
				'settings'   => 'sidetrackheader_color',
			)
		)
	);

	$sidetrack->add_setting( 'sidetrackaccent_color' );
	$sidetrack->add_control(
		new WP_Customize_Color_Control(
			$sidetrack, 'accent_color', array(
				'label'      => __( 'Accent Color', 'sidetrack-studio' ),
				'section'    => 'colors',
				'settings'   => 'sidetrackaccent_color',
			)
		)
	);

	$sidetrack->add_setting( 'sidetrackmap_color' );
	$sidetrack->add_control(
		new WP_Customize_Color_Control(
			$sidetrack, 'map_color', array(
				'label'      => __( 'Map Color', 'sidetrack-studio' ),
				'section'    => 'colors',
				'settings'   => 'sidetrackmap_color',
			)
		)
	);

	$sidetrack->add_setting( 'sidetrackmenu_color' );
	$sidetrack->add_control(
		new WP_Customize_Color_Control(
			$sidetrack, 'menu_color', array(
				'label'      => __( 'Menu Color', 'sidetrack-studio' ),
				'section'    => 'colors',
				'settings'   => 'sidetrackmenu_color',
			)
		)
	);

	$sidetrack->add_setting( 'sidetrackmenu_active_color' );
	$sidetrack->add_control(
		new WP_Customize_Color_Control(
			$sidetrack, 'menu_active_color', array(
				'label'      => __( 'Menu Active Color', 'sidetrack-studio' ),
				'section'    => 'colors',
				'settings'   => 'sidetrackmenu_active_color',
			)
		)
	);

	$sidetrack->add_setting( 'sidetracklink_color' );
	$sidetrack->add_control(
		new WP_Customize_Color_Control(
			$sidetrack, 'link_color', array(
				'label'      => __( 'Link Color', 'sidetrack-studio' ),
				'section'    => 'colors',
				'settings'   => 'sidetracklink_color',
				'priority'   => 13,
			)
		)
	);

	$sidetrack->add_setting( 'sidetracklink_hover_color' );
	$sidetrack->add_control(
		new WP_Customize_Color_Control(
			$sidetrack, 'link_hover_color', array(
				'label'      => __( 'Link Hover Color', 'sidetrack-studio' ),
				'section'    => 'colors',
				'settings'   => 'sidetracklink_hover_color',
				'priority'   => 14,
			)
		)
	);

	// Posts
	$sidetrack->add_section(
		'sidetrackposts' , array(
			'title'      => __( 'Posts', 'sidetrack-studio' ),
			'priority'   => 3,
		)
	);

	$sidetrack->add_setting( 'sidetrackshow_full_posts' );
	$sidetrack->add_control(
		'show_full_posts',
		array(
			'type' => 'checkbox',
			'label' => 'Show Full Posts',
			'section' => 'sidetrackposts',
			'settings'   => 'sidetrackshow_full_posts',
		)
	);

	$sidetrack->add_setting( 'sidetrackshow_featured_image' );
	$sidetrack->add_control(
		'show_featured_image',
		array(
			'type' => 'checkbox',
			'label' => 'Show Featured Image on Single Posts',
			'section' => 'sidetrackposts',
			'settings'   => 'sidetrackshow_featured_image',
		)
	);

	// Footer
	$sidetrack->add_section(
		'sidetrackfooter' , array(
			'title'      => __( 'Footer', 'sidetrack-studio' ),
			'priority'   => 3,
		)
	);

	$sidetrack->add_setting( 'sidetrackfooter_left' );
	$sidetrack->add_control(
		new Sidetrack_Textarea_Control(
			$sidetrack, 'footer_left', array(
				'label'   => 'Left Footer Text',
				'section' => 'sidetrackfooter',
				'settings'   => 'sidetrackfooter_left',
				'priority'   => 13,
			)
		)
	);

	$sidetrack->add_setting( 'sidetrackfooter_right' );
	$sidetrack->add_control(
		new Sidetrack_Textarea_Control(
			$sidetrack, 'footer_right', array(
				'label'   => 'Right Footer Text',
				'section' => 'sidetrackfooter',
				'settings'   => 'sidetrackfooter_right',
				'priority'   => 13,
			)
		)
	);
}

add_action( 'customize_register', 'sidetracktheme_customizer' );
