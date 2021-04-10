<?php 

class Elementor_Test_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return "test-widget";
    }

	public function get_title() {
        return __("Elementor First Widget",TEXTDOMAIN);
    }

	public function get_icon() {
        return "fa fa-image";
    }

	public function get_categories() {
        return ['basic'];
    }

	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'input_text',
			[
				'label' => __( 'URL to embed', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,			
				'placeholder' => __( 'Text Here', TEXTDOMAIN ),
			]
		);

		$this->end_controls_section();



    }

	protected function render() {
        $settings = $this->get_settings_for_display();

		$html =  $settings['input_text'] ;

		echo '<h1 class="oembed-elementor-widget">';

		echo ( $html ) ? $html : $settings['url'];

		echo '</h1>';

    }

	protected function _content_template() {
        ?>

            <h1>{{{settings.input_text}}}</h1>

        <?php 

    }

}