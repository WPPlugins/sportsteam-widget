<?php
/*
 * Plugin name: SportsTeam Widget
 * Plugin URI: http://zenoweb.nl
 * Description: A widget that shows the next match of a team.
 * Version: 2.2.2
 * Author: Marcel Pol
 * Author URI: http://zenoweb.nl
 * License: GPLv2
 * Text Domain: sportsteam-widget
 * Domain Path: /lang/
 * License: GPLv2 or later
 */

/*  Copyright 2014 - 2016  Marcel Pol  (email: marcel@zenoweb.nl)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/* Todo:
 *
 */

// Plugin Version
define('SPORTSTEAM_VER', '2.2.2');


function sportsteam_register_post_type() {
	$labels = array(
		'name'                => __('Teams','sportsteam-widget'),
		'singular_name'       => __('Team','sportsteam-widget'),
		'add_new'             => __('New Team','sportsteam-widget'),
		'add_new_item'        => __('New Team','sportsteam-widget'),
		'edit_item'           => __('Edit Team','sportsteam-widget'),
		'new_item'            => __('New Team','sportsteam-widget'),
		'view_item'           => __('View Team','sportsteam-widget'),
		'search_items'        => __('Search Team','sportsteam-widget'),
		'not_found'           => __('No Team found','sportsteam-widget'),
		'not_found_in_trash'  => __('No Team found in the Thrash','sportsteam-widget'),
		'parent_item_colon'   => '',
		'menu_name'           => __('SportsTeams','sportsteam-widget')
	);
	register_post_type('sportsteams',array(
		'public'              => true,
		'show_in_menu'        => true,
		'show_ui'             => true,
		'labels'              => $labels,
		'hierarchical'        => false,
		'supports'            => array('title','editor','page-attributes','excerpt','thumbnail','custom-fields'),
		'capability_type'     => 'post',
		'taxonomies'          => array('st_classes'),
		'exclude_from_search' => false,
		'rewrite'             => array( 'slug' => 'sportsteams', 'with_front' => true ),
		)
	);

	$labels = array(
		'name'                          => __('Classes','sportsteam-widget'),
		'singular_name'                 => __('Class','sportsteam-widget'),
		'search_items'                  => __('Search Class','sportsteam-widget'),
		'popular_items'                 => __('Popular Classes','sportsteam-widget'),
		'all_items'                     => __('All Classes','sportsteam-widget'),
		'parent_item'                   => __('Parent Class','sportsteam-widget'),
		'edit_item'                     => __('Edit Class','sportsteam-widget'),
		'update_item'                   => __('Update Class','sportsteam-widget'),
		'add_new_item'                  => __('Add New Class','sportsteam-widget'),
		'new_item_name'                 => __('New Class','sportsteam-widget'),
		'separate_items_with_commas'    => __('Separate Classes with commas','sportsteam-widget'),
		'add_or_remove_items'           => __('Add or remove Classes','sportsteam-widget'),
		'choose_from_most_used'         => __('Choose from most used Classes','sportsteam-widget'),
		'not_found'                     => __('No Classes found','sportsteam-widget')
		);
	$args = array(
		'label'                         => __('Classes','sportsteam-widget'),
		'labels'                        => $labels,
		'public'                        => true,
		'hierarchical'                  => true,
		'show_ui'                       => true,
		'show_in_nav_menus'             => true,
		'args'                          => array( 'orderby' => 'term_order' ),
		'rewrite'                       => array( 'slug' => 'class', 'with_front' => true ),
		'query_var'                     => true
	);
	register_taxonomy( 'st_classes', 'sportsteams', $args );
}
add_action( 'init', 'sportsteam_register_post_type' );


function sportsteam_lang() {
	load_plugin_textdomain('sportsteam-widget', false, plugin_basename(dirname(__FILE__)) . '/lang/');
}
add_action('plugins_loaded', 'sportsteam_lang');


function sportsteam_enqueue_style() {
	wp_enqueue_style('sportsteam_widget', plugins_url( '/css/sportsteam-widget.css', __FILE__ ), 'screen', SPORTSTEAM_VER);
}
add_action( 'wp_enqueue_scripts', 'sportsteam_enqueue_style' );


function sportsteam_about() {
	?>
	<div class='wrap'>
		<h1><?php _e('About the Sportsteam Widget', 'sportsteam-widget'); ?></h1>
		<div id="poststuff" class="metabox-holder">
			<div class="widget">
				<p><?php _e('This plugin is being maintained by Marcel Pol from', 'sportsteam-widget'); ?>
					<a href="http://zenoweb.nl" target="_blank" title="ZenoWeb">ZenoWeb</a>.
				</p>

				<h2 class="widget-top"><?php _e('Review this plugin.', 'sportsteam-widget'); ?></h2>
				<p><?php _e('If this plugin has any value to you, then please leave a review at', 'sportsteam-widget'); ?>
					<a href="https://wordpress.org/support/view/plugin-reviews/sportsteam-widget?rate=5#postform" target="_blank" title="<?php esc_attr_e('The plugin page at wordpress.org.', 'sportsteam-widget'); ?>">
						<?php _e('the plugin page at wordpress.org', 'sportsteam-widget'); ?></a>.
				</p>

				<h2 class="widget-top"><?php _e('Donate to the maintainer.', 'sportsteam-widget'); ?></h2>
				<p><?php _e('If you want to donate to the maintainer of the plugin, you can donate through PayPal.', 'sportsteam-widget'); ?></p>
				<p><?php _e('Donate through', 'sportsteam_widget'); ?> <a href="https://www.paypal.com" target="_blank" title="<?php esc_attr_e('Donate to the maintainer.', 'sportsteam-widget'); ?>"><?php _e('PayPal', 'sportsteam-widget'); ?></a>
					<?php _e('to', 'sportsteam-widget'); ?> marcel@timelord.nl.
				</p>
			</div>
		</div>
	</div>
	<?php
}


function sportsteam_menu() {
	add_submenu_page('edit.php?post_type=sportsteams', __('About', 'sportsteam-widget'), __('About', 'sportsteam-widget'), 'manage_categories', 'sportsteam_about', 'sportsteam_about');
}
add_action('admin_menu', 'sportsteam_menu');


include( 'widget.php' );
