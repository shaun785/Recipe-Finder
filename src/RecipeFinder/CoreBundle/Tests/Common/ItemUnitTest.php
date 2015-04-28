<?php

namespace RecipeFinder\CoreBundle\Tests\Common;

use RecipeFinder\CoreBundle\Common\ItemUnit;

/*
* Item unit Test class 
* @author Shaunak Deshmukh
* @since 1.0
*/

class ItemUnitTest extends \PHPUnit_Framework_TestCase {

	public function testUnits() {		
		$this->assertEquals('of', ItemUnit::getUnit('of'));
		$this->assertEquals('slices', ItemUnit::getUnit('slices'));
		$this->assertEquals(false, ItemUnit::getUnit('test'));
	}
} 
