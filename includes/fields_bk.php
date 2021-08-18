<?php

//Display Fields
add_action( 'woocommerce_product_after_variable_attributes', 'variable_fields_bk', 10, 2 );
//JS to add fields for new variations
add_action( 'woocommerce_product_after_variable_attributes_js', 'variable_fields_js_bk' );
//Save variation fields
add_action( 'woocommerce_process_product_meta_variable', 'save_variable_fields_bk', 10, 1 );

/**
 * Create new fields for variations
 *
*/
function variable_fields_bk( $loop, $variation_data ) {
?>
	<tr>
		<td>
			<?php
			// Text Field
			woocommerce_wp_text_input(
				array(
					'id'          => '_text_field['.$loop.']',
					'label'       => __( 'My Text Field', 'woocommerce' ),
					'placeholder' => 'http://',
					'desc_tip'    => 'true',
					'description' => __( 'Enter the custom value here.', 'woocommerce' ),
					'value'       => $variation_data['_text_field'][0]
				)
			);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php
			// Number Field
			woocommerce_wp_text_input(
				array(
					'id'          => '_number_field['.$loop.']',
					'label'       => __( 'My Number Field', 'woocommerce' ),
					'desc_tip'    => 'true',
					'description' => __( 'Enter the custom number here.', 'woocommerce' ),
					'value'       => $variation_data['_number_field'][0],
					'custom_attributes' => array(
									'step' 	=> 'any',
									'min'	=> '0'
								)
				)
			);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php
			// Textarea
			woocommerce_wp_textarea_input(
				array(
					'id'          => '_textarea['.$loop.']',
					'label'       => __( 'My Textarea', 'woocommerce' ),
					'placeholder' => '',
					'description' => __( 'Enter the custom value here.', 'woocommerce' ),
					'value'       => $variation_data['_textarea'][0],
				)
			);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php
			// Select
			woocommerce_wp_select(
			array(
				'id'          => '_select['.$loop.']',
				'label'       => __( 'My Select Field', 'woocommerce' ),
				'description' => __( 'Choose a value.', 'woocommerce' ),
				'value'       => $variation_data['_select'][0],
				'options' => array(
					'one'   => __( 'Option 1', 'woocommerce' ),
					'two'   => __( 'Option 2', 'woocommerce' ),
					'three' => __( 'Option 3', 'woocommerce' )
					)
				)
			);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php
			// Checkbox
			woocommerce_wp_checkbox(
			array(
				'id'            => '_checkbox['.$loop.']',
				'label'         => __('My Checkbox Field', 'woocommerce' ),
				'description'   => __( 'Check me!', 'woocommerce' ),
				'value'         => $variation_data['_checkbox'][0],
				)
			);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php
			// Hidden field
			woocommerce_wp_hidden_input(
			array(
				'id'    => '_hidden_field['.$loop.']',
				'value' => 'hidden_value'
				)
			);
			?>
		</td>
	</tr>
<?php
}

/**
 * Create new fields for new variations
 *
*/
function variable_fields_js_bk() {
?>
	<tr>
		<td>
			<?php
			// Text Field
			woocommerce_wp_text_input(
				array(
					'id'          => '_text_field[ + loop + ]',
					'label'       => __( 'My Text Field', 'woocommerce' ),
					'placeholder' => 'http://',
					'desc_tip'    => 'true',
					'description' => __( 'Enter the custom value here.', 'woocommerce' ),
					'value'       => $variation_data['_text_field'][0]
				)
			);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php
			// Number Field
			woocommerce_wp_text_input(
				array(
					'id'                => '_number_field[ + loop + ]',
					'label'             => __( 'My Number Field', 'woocommerce' ),
					'desc_tip'          => 'true',
					'description'       => __( 'Enter the custom number here.', 'woocommerce' ),
					'value'             => $variation_data['_number_field'][0],
					'custom_attributes' => array(
									'step' 	=> 'any',
									'min'	=> '0'
								)
				)
			);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php
			// Textarea
			woocommerce_wp_textarea_input(
				array(
					'id'          => '_textarea[ + loop + ]',
					'label'       => __( 'My Textarea', 'woocommerce' ),
					'placeholder' => '',
					'description' => __( 'Enter the custom value here.', 'woocommerce' ),
					'value'       => $variation_data['_textarea'][0],
				)
			);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php
			// Select
			woocommerce_wp_select(
			array(
				'id'          => '_select[ + loop + ]',
				'label'       => __( 'My Select Field', 'woocommerce' ),
				'description' => __( 'Choose a value.', 'woocommerce' ),
				'value'       => $variation_data['_select'][0],
				'options' => array(
					'one'   => __( 'Option 1', 'woocommerce' ),
					'two'   => __( 'Option 2', 'woocommerce' ),
					'three' => __( 'Option 3', 'woocommerce' )
					)
				)
			);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php
			// Checkbox
			woocommerce_wp_checkbox(
			array(
				'id'            => '_checkbox[ + loop + ]',
				'label'         => __('My Checkbox Field', 'woocommerce' ),
				'description'   => __( 'Check me!', 'woocommerce' ),
				'value'         => $variation_data['_checkbox'][0],
				)
			);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php
			// Hidden field
			woocommerce_wp_hidden_input(
			array(
				'id'    => '_hidden_field[ + loop + ]',
				'value' => 'hidden_value'
				)
			);
			?>
		</td>
	</tr>
<?php
}

/**
 * Save new fields for variations
 *
*/
function save_variable_fields_bk( $post_id ) {
	if (isset( $_POST['variable_sku'] ) ) :

		$variable_sku          = $_POST['variable_sku'];
		$variable_post_id      = $_POST['variable_post_id'];

		// Text Field
		$_text_field = $_POST['_text_field'];
		for ( $i = 0; $i < sizeof( $variable_sku ); $i++ ) :
			$variation_id = (int) $variable_post_id[$i];
			if ( isset( $_text_field[$i] ) ) {
				update_post_meta( $variation_id, '_text_field', stripslashes( $_text_field[$i] ) );
			}
		endfor;

		// Number Field
		$_number_field = $_POST['_number_field'];
		for ( $i = 0; $i < sizeof( $variable_sku ); $i++ ) :
			$variation_id = (int) $variable_post_id[$i];
			if ( isset( $_text_field[$i] ) ) {
				update_post_meta( $variation_id, '_number_field', stripslashes( $_number_field[$i] ) );
			}
		endfor;

		// Textarea
		$_textarea = $_POST['_textarea'];
		for ( $i = 0; $i < sizeof( $variable_sku ); $i++ ) :
			$variation_id = (int) $variable_post_id[$i];
			if ( isset( $_textarea[$i] ) ) {
				update_post_meta( $variation_id, '_textarea', stripslashes( $_textarea[$i] ) );
			}
		endfor;

		// Select
		$_select = $_POST['_select'];
		for ( $i = 0; $i < sizeof( $variable_sku ); $i++ ) :
			$variation_id = (int) $variable_post_id[$i];
			if ( isset( $_select[$i] ) ) {
				update_post_meta( $variation_id, '_select', stripslashes( $_select[$i] ) );
			}
		endfor;

		// Checkbox
		$_checkbox = $_POST['_checkbox'];
		for ( $i = 0; $i < sizeof( $variable_sku ); $i++ ) :
			$variation_id = (int) $variable_post_id[$i];
			if ( isset( $_checkbox[$i] ) ) {
				update_post_meta( $variation_id, '_checkbox', stripslashes( $_checkbox[$i] ) );
			}
		endfor;

		// Hidden field
		$_hidden_field = $_POST['_hidden_field'];
		for ( $i = 0; $i < sizeof( $variable_sku ); $i++ ) :
			$variation_id = (int) $variable_post_id[$i];
			if ( isset( $_hidden_field[$i] ) ) {
				update_post_meta( $variation_id, '_hidden_field', stripslashes( $_hidden_field[$i] ) );
			}
		endfor;

	endif;
}
