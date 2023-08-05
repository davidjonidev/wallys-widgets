<?php

// Add Widget options to admin dashboard
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title'    => 'Widget Options',
		'menu_title'    => 'Widget Options',
		'menu_slug'     => 'wallys-widget-options',
		'capability'    => 'edit_posts'
	));
	
}

// Display order details on widgets order posts - admin
function widgets_order_details_meta_box() {
	$screens = [ 'widgets-order' ];
	foreach ( $screens as $screen ) {
		add_meta_box(
			'widgets-order-details',
			'Widgets Order Details',
			'widgets_order_details_html',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'widgets_order_details_meta_box' );

// Callback for above
function widgets_order_details_html( $post ) { 
	
	$order_details = get_post_meta( $post->ID, '_order_results' );
	$order_details = json_decode($order_details[0]);

	?>
	<table class="pack-details-table widefat fixed" cellspacing="0">
		<thead>
			<tr>
				<th id="pack-size" class="manage-column column-pack-size" scope="col">Pack Size</th>
				<th id="pack-number" class="manage-column column-pack-number" scope="col"># Required</th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach($order_details as $key => $val) {
			if ( $val !== 0) {
			?>
			<tr class="alternate">
				<td class="column-pack-size"><?php echo $key; ?></td>
				<td class="column-pack-number"><?php echo $val; ?></td>
			</tr>
			<?php
			}
		}
		?>
		</tbody>
	</table>
	<?php
}

// Returns array of packs
function load_widgets_packs_option() {
	$packs = get_field('widget_packs', 'option');
	foreach( $packs as $option ) {
		$formatted_packs[] = $option['pack_size'];
	}
	rsort($formatted_packs);
	return $formatted_packs;
}

// Returns array for results with pack size as keys
function setup_results_grid() {
	$packs = get_field('widget_packs', 'option');
	foreach( $packs as $option ) {
		$pack_name = $option['pack_size'];
		$results_grid[$pack_name] = 0;
	}

	return $results_grid;
}

// On order post submit
function on_acf_form_widgets_post( $post_id ) {

	if ( get_post_type( $post_id ) == 'widgets-order' ) {

		$first_name = get_field('first_name', $post_id);
		$last_name = get_field('last_name', $post_id);
		$amount = get_field('widgets_required', $post_id);

		$my_post = array();
		$my_post['ID'] = $post_id;
		$post_title = $post_id . ' - ' . $first_name . ' ' . $last_name;
		$post_name = sanitize_title($post_title);
		$my_post['post_title'] = $post_title;
		$my_post['post_name'] = $post_name;

		$widgetFormCalc = new WidgetsCalculator($amount, load_widgets_packs_option(), setup_results_grid());

        $widgetFormCalc->calculateResults();
        $results = $widgetFormCalc->getResults();
		
		// Update title
		wp_update_post( $my_post );
		// Update results meta for widgets needed 
		if ( get_post_meta( $post_id, '_order_results' ) ) {
			update_post_meta( $post_id, '_order_results', json_encode($results) );
		} else {
			add_post_meta( $post_id, '_order_results', json_encode($results));
		}	

	}

}

// run after ACF saves the $_POST['fields'] data
add_action('acf/save_post', 'on_acf_form_widgets_post', 20);


// function widget_form_calculation() {

// 	$widgets_options = get_field('widget_packs', 'option');
// 	$widget_packs = [];
// 	$mod = 0;
// 	$asked = 10201;

// 	foreach( $widgets_options as $option ) {
// 		$widget_packs[] = $option['pack_size'];
// 	}

// 	$widget_packs_desc = $widget_packs;
// 	rsort($widget_packs_desc);
// 	$widget_packs_asc = $widget_packs;
// 	sort($widget_packs_asc);

// 	$counter = 0;
// 	foreach( $widget_packs_desc as $option ) {
// 		$mod = $asked % $option;
// 		$times = ($asked-$mod)/$option;
		
// 		// Checking fitment between smallest and second smallest
// 		if ( $option === $widget_packs_asc[1] ) {
// 			if ( $mod > $widget_packs_asc[0] && $mod <= $widget_packs_asc[1] ) {
// 				$times++;
// 				$mod = 0;
// 			}
// 		}

// 		// Last option
// 		if( $counter == count( $widget_packs_desc ) - 1) {
// 			if ( $mod <= $option && $mod !== 0 ) {
// 				$times++;
// 				$mod = 0;
// 			}
// 		}
		
// 		echo $option . ' times: ' . $times; 
// 		echo '</br>';

// 		$asked = $mod;
// 		$counter++;
// 	}

	
// }