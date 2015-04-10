<?php

/**
 * GameWisp Twitch Interface
 *
 * 
 * @package    Twitch Interface - Laravel 4
 * @version    0.1.0
 * @author     GameWisp, Inc. 2015; Anthony 'IBurn36360' Diaz - 2013
 * @license    GNU GPLv3 License
 * @copyright  (c) 2013, Anthony 'IBurn36360' Diaz; (c) 2015, GameWisp, Inc.
 * @link       http://gamewisp.com, 
 */
return array(
    twitch_client_key => '',
	twitch_client_secret => '',
	twitch_client_url => '',

	twitch_debug_levels => array (
		'FINE' => 1,   // Displays only call inits
        'FINER' => 2,  // Displays variable changes
        'FINEST' => 3, // Displays all output other than RAW returns
        'ALL' => 4,    // Displays all output possible
	),

	twitch_configuration => array (
	    'CALL_LIMIT_SETTING'      => 'CALL_LIMIT_MAX', // This sets the query limit for all calls
	    'KEY_NAME'                => 'name',           // This controls how the key is determined, valid values are 'name' and 'display_name'
	    'DEFAULT_TIMEOUT'         => 5,                // This sets the timeout for the cURL interaction for the Kraken servers (connect timeout)
	    'DEFAULT_RETURN_TIMEOUT'  => 20,               // This sets the default return timeout for all returns (Post connection established)
	    'API_VERSION'             => 3,                // This sets what API version to use.  Specifies that value in the header
	    'TOKEN_SEND_METHOD'       => 'HEADER',         // This sets how any OAuth tokens are sent.  Valid options are 'HEADER' and 'QUERY'
	    'RETRY_COUNTER'           => 3,                // This sets the number of retries the interface will do when faced with status 0 returns
	    'CERT_PATH'               => '',               // Path to your certificate (if you are supplying one)
	    'DEBUG_SUPPRESSION_LEVEL' => 1, 			   // This sets the maximum debug level that gets to output, ALL sets to display all returns, including RAW JSON returns. Default "FINE" from above array
	    'CALL_LIMIT_DEFAULT'      => '25',
	    'CALL_LIMIT_DOUBLE'       => '50',
	    'CALL_LIMIT_MAX'          => '100'
    )
);
