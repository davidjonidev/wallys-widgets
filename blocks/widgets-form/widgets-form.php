<?php

/**
 * Widgets Form Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */


// acf_form_head();

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'widgets-form-block';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$heading		= get_field( 'heading' ) ?: 'Heading';
$description	= get_field( 'description' ) ?: 'Description';

?>
<div <?php echo $anchor; ?> class="flex flex-col border-2 border-slate-200">
    <div class="widget-form-header p-4">
        <h2 class="widget-form-heading text-3xl font-semibold text-theme-dark-blue mb-2"><?php echo esc_html( $heading ); ?></h2>
        <span class="widget-form-description"><?php echo $description; ?></span>
    </div>

    <?php if ( !is_admin()) : ?>
		<div class="border-t-2 p-4 bg-slate-100">
			<?php
				acf_form(array(
					'post_id'               => 'new_post',
					'post_title'            => false,
					'form'			        => true,
					'new_post'              => array(
						'post_type'         => 'widgets-order',
						'post_status'       => 'publish'
					),
					'field_groups'		    => array(14),
					'html_before_fields'    => '<div>',
					'html_after_fields'     => '</div>',
					'submit_value' => __("Submit Order", 'wallys-widgets'),
					'html_submit_button'  => '<input type="submit" class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="%s" />',
				));

			?>
		</div>
	<?php endif; ?>
</div>