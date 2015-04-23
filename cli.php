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

/**
 * Getting plugin information from WordPress.org Plugins API.
 */
class WP_CLI_YAML extends WP_CLI_Command {

	function __construct() {
		parent::__construct();
	}

    /**
     * Prints a greeting.
     *
     * ## OPTIONS
     *
     * <name>
     * : The name of the person to greet.
     *
     * ## EXAMPLES
     *
     *     wp example hello Newman
     *
     * @synopsis <name>
     */
    function hello( $args, $assoc_args ) {
        list( $name ) = $args;

        // Print a success message
        WP_CLI::success( "Hello, $name!" );
    }
}

WP_CLI::add_command( 'yaml', 'WP_CLI_Plugins_API' );
