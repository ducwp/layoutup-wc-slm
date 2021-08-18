<?php
add_action( 'woocommerce_product_after_variable_attributes', 'variable_fields', 10, 2 );
add_action( 'woocommerce_process_product_meta_variable', 'save_variable_fields', 10, 1 );

/**
 * Create new fields for variations
 *
*/
function variable_fields( $loop, $variation_data ) {
  woocommerce_wp_checkbox(
  array(
    'id'            => '_wc_slm_licensing_enabled['.$loop.']',
    'label'         => __('Enable Software Licensing', 'woocommerce' ),
    //'description'   => __( 'Enable Software Licensing', 'woocommerce' ),
    'value'         => $variation_data['_wc_slm_licensing_enabled'][0],
    'cbvalue' => 1,
    'wrapper_class' => 'layoutup_checkbox show_if_variation_downloadable' ,
    )
  );
  woocommerce_wp_text_input(
    array(
      'id'          => '_wc_slm_licensing_renewal_period['.$loop.']',
      'label'       => __( 'Renewal period (Yearly)', 'woocommerce' ),
      'desc_tip'    => 'true',
      'type'        => 'number',
      'description' => __( 'Enter the number of years for the Renewal Period. Enter 0 (zero) or leave blank for lifetime renewals.', 'woocommerce' ),
      'value'       => $variation_data['_wc_slm_licensing_renewal_period'][0],
      'wrapper_class' => 'show_if_variation_downloadable',
    )
  );
  woocommerce_wp_text_input(
    array(
      'id'          => '_wc_slm_sites_allowed['.$loop.']',
      'label'       => __( 'Number of Sites Allowed', 'woocommerce' ),
      'desc_tip'    => 'true',
      'type'        => 'number',
      'description' => __( 'Enter the number of sites that can be activated for a single License Key. Value must be greater than 0 (zero).', 'woocommerce' ),
      'value'       => $variation_data['_wc_slm_sites_allowed'][0],
      'wrapper_class' => 'show_if_variation_downloadable',
    )
  );
  woocommerce_wp_text_input(
    array(
      'id'          => '_wc_slm_lic_prefix['.$loop.']',
      'label'       => __( 'License Key Prefix', 'woocommerce' ),
      'desc_tip'    => 'true',
      'description' => __( 'You can optionaly specify a prefix for the license keys. This prefix will be added to the uniquely generated license keys.', 'woocommerce' ),
      'value'       => $variation_data['_wc_slm_lic_prefix'][0],
      'wrapper_class' => 'show_if_variation_downloadable',
    )
  );

  woocommerce_wp_text_input(
    array(
      'id'          => '_wc_slm_item_ref['.$loop.']',
      'label'       => __( 'Item Reference Slug', 'woocommerce' ),
      'desc_tip'    => 'true',
      'description' => __( 'Enter slug for item reference slug. Eg. my-wp-plugin', 'woocommerce' ),
      'value'       => $variation_data['_wc_slm_item_ref'][0],
      'wrapper_class' => 'show_if_variation_downloadable',
    )
  );

}

/**
 * Save new fields for variations
 *
*/
function save_variable_fields( $post_id ) {
	if (isset( $_POST['variable_sku'] ) ) :

		$variable_sku          = $_POST['variable_sku'];
		$variable_post_id      = $_POST['variable_post_id'];

    // Checkbox
		$_wc_slm_licensing_enabled = $_POST['_wc_slm_licensing_enabled'];
		for ( $i = 0; $i < sizeof( $variable_sku ); $i++ ) :
			$variation_id = (int) $variable_post_id[$i];
			update_post_meta( $variation_id, '_wc_slm_licensing_enabled', isset($_wc_slm_licensing_enabled[$i]) ? 1 :  0 );
		endfor;

    // Number Field
		$_wc_slm_licensing_renewal_period = $_POST['_wc_slm_licensing_renewal_period'];
		for ( $i = 0; $i < sizeof( $variable_sku ); $i++ ) :
			$variation_id = (int) $variable_post_id[$i];
			if ( isset( $_wc_slm_licensing_renewal_period[$i] ) ) {
				update_post_meta( $variation_id, '_wc_slm_licensing_renewal_period', stripslashes( $_wc_slm_licensing_renewal_period[$i] ) );
			}
		endfor;

		// Number Field
		$_wc_slm_sites_allowed = $_POST['_wc_slm_sites_allowed'];
		for ( $i = 0; $i < sizeof( $variable_sku ); $i++ ) :
			$variation_id = (int) $variable_post_id[$i];
			if ( isset( $_wc_slm_sites_allowed[$i] ) ) {
				update_post_meta( $variation_id, '_wc_slm_sites_allowed', stripslashes( $_wc_slm_sites_allowed[$i] ) );
			}
		endfor;

    // License Key Prefix
    $_wc_slm_lic_prefix = $_POST['_wc_slm_lic_prefix'];
		for ( $i = 0; $i < sizeof( $variable_sku ); $i++ ) :
			$variation_id = (int) $variable_post_id[$i];
			if ( isset( $_wc_slm_lic_prefix[$i] ) ) {
				update_post_meta( $variation_id, '_wc_slm_lic_prefix', stripslashes( $_wc_slm_lic_prefix[$i] ) );
			}
		endfor;

    // Item Reference
    $_wc_slm_item_ref = $_POST['_wc_slm_item_ref'];
		for ( $i = 0; $i < sizeof( $variable_sku ); $i++ ) :
			$variation_id = (int) $variable_post_id[$i];
			if ( isset( $_wc_slm_item_ref[$i] ) ) {
				update_post_meta( $variation_id, '_wc_slm_item_ref', stripslashes( $_wc_slm_item_ref[$i] ) );
			}
		endfor;

	endif;
}
