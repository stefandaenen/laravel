<?php

require_once '../models/gebruiker.php';

class TestGebruikerModel extends PHPUnit_Framework_TestCase {


	public function setUp()
	{
		$this->gebruiker = new Gebruiker;	
	}

	/**
	 * Test that a given condition is met.
	 *
	 * @return void
	 */
	public function testSomethingIsTrue()
	{
		$this->assertTrue(true);	
	}

}