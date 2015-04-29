<?php

namespace RecipeFinder\CoreBundle\Tests\Common;

use RecipeFinder\CoreBundle\Common\Ingredient;

/*
* Ingredient Test class 
* @author Shaunak Deshmukh
* @since 1.0
*/

class IngredientTest extends \PHPUnit_Framework_TestCase {

	protected $ingredient;

	/*
	* Test creating an ingredient object
	*/
	public function testIngredient() {
		$ingredient  	= new Ingredient('bread', '2', 'slices', new \DateTime());

		$this->assertEquals($ingredient->getItem(), 'bread');
		$this->assertEquals($ingredient->getAmount(), 2);
		$this->assertEquals($ingredient->getUnit(), 'slices');
		$this->assertEquals($ingredient->getUseBy(), new \DateTime());
	}
} 

