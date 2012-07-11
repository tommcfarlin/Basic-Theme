<?php

// Include the functions for the theme
include_once('../functions.php');

/**
 * This class contains all of the unit tests for testing the Basic Theme. Its
 * primary purpose is to provide several examples of how to unit test themes.
 */
class Test_Basic_Theme extends WP_UnitTestCase {
	
	/**
	 * Fired before the set of tests is run. After WordPress is installed,
	 * switches from the default theme to the Basic Theme.
	 */
	function setUp() {
		
		parent::setUp();
		switch_theme( 'Basic Theme', 'Basic Theme' );
		
	} // end setup
	 
	/**
	 * Verifies that Basic Theme is the active theme.
	 */
	function testActiveTheme() {
	
		$this->assertTrue( 'Basic Theme' == get_current_theme() );
		
	} // end testThemeInitialization
	
	/**
	 * Verifies that Twenty Eleven is not the active theme.
	 */
	function testInactiveTheme() {
	
		$this->assertFalse( 'Twenty Eleven' == get_current_theme() );
	
	} // end testInactiveTheme
	
	/**
	 * First verifies that jQuery has not been loaded, then fires WordPress' 'wp_enqueue_scripts'
	 * action to enqueue specified JavaScript (in our case, jQuery).
	 *
	 * Next, asserts that jQuery has been enqueued.
	 */
	function testjQueryIsLoaded() {
		
		// Typically, I'm not a fan of multiple assertions per function, but in this case,
		// we need to make sure jQuery isn't loaded before the 'wp_enqueue_scripts' action
		// is fired.
		$this->assertFalse( wp_script_is( 'jquery' ) );
		
		// Fire the enqueue action and now check for jQuery
		do_action( 'wp_enqueue_scripts' );
		$this->assertTrue( wp_script_is( 'jquery' ) );
		
	} // end testjQueryIsLoaded
	
	/**
	 * Verifies that the meta description is properly added to the head element.
	 */
	function testBasicMetaDescription() {
		
		$meta_description = '<meta name="description" content="' . get_bloginfo( 'description' ) . '" />';
		$this->expectOutputString( $meta_description, basic_meta_description() );
		
	} // end testBasicMetaDescription
	

} // end class


?>