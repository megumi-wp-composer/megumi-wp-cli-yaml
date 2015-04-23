<?php

/**
 * WP-CLI wp yaml command
 *
 * @subpackage commands/community
 * @maintainer Takayuki Miyauchi
 */

if ( ! defined( 'WP_CLI' ) || ! WP_CLI ) {
	return;
}

// it need manually load
require_once( dirname( __FILE__ ) . '/inc/class-yaml.php' );

/**
 * Getting plugin information from WordPress.org Plugins API.
 */
class WP_CLI_YAML extends WP_CLI_Command {

	private $fields = array(
		'name',
		'slug',
		'version',
		'rating',
		'downloaded',
	);

	function __construct() {
		parent::__construct();
	}


	/**
	 * Get a list of plugins for specific author.
	 *
	 * ## OPTIONS
	 *
	 * <author>
	 * : A plugin author's name of wordpress.org
	 *
	 * [--format=<format>]
	 * : Accepted values: table, csv, json, count, ids. Default: table
	 *
	 * ## EXAMPLES
	 *
	 *    wp yaml author miyauchi
	 *
	 * @subcommand author
	 */
	public function author( $args, $assoc_args )
	{
		if ( isset( $assoc_args['format'] ) ) {
			$format = $assoc_args['format'];
		} else {
			$format = 'table';
		}

		$result = Plugins_API::author( $args, $format );

		if ( is_wp_error( $result ) ) {
			WP_CLI::error( $result->get_error_message() );
		} else {
			WP_CLI\Utils\format_items( $format, $result['plugins'], $this->fields );
			if ( 'table' === $format ) {
				WP_CLI::line( sprintf(
					'%s plugins. %s downloads.',
					$result['number'],
					number_format( $result['downloads'] )
				) );
			}
		}
	}


	/**
	 * Get a list of plugins for popular/new/updated/top-rated.
	 *
	 * ## OPTIONS
	 *
	 * <browse>
	 * : The possible values are popular/new/updated/top-rated.
	 *
	 * ## EXAMPLES
	 *
	 *    wp yaml browse popular
	 *
	 * @subcommand browse
	 */
	public function browse( $args, $assoc_args )
	{
		$result = Plugins_API::browse( $args, $format );

		if ( is_wp_error( $result ) ) {
			WP_CLI::error( $result->get_error_message() );
		} else {
			WP_CLI\Utils\format_items( $format, $result, $this->fields );
		}
	}


	/**
	 * Get a plugin information specific plugin.
	 *
	 * ## OPTIONS
	 *
	 * <slug>
	 * : The slug of the plugin.
	 *
	 * ## EXAMPLES
	 *
	 *    wp yaml info wp-total-hacks
	 *
	 * @subcommand info
	 */
	public function info( $args, $assoc_args )
	{
		$result = Plugins_API::info( $args, $format );

		if ( is_wp_error( $result ) ) {
			WP_CLI::error( $result->get_error_message() );
		} else {
			WP_CLI\Utils\format_items( $format, $result, array( 'Field', 'Value' ) );
		}
	}
}

WP_CLI::add_command( 'yaml', 'WP_CLI_Plugins_API' );
