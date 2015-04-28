<?php

namespace RecipeFinder\CoreBundle\Tests\Common;

use RecipeFinder\CoreBundle\Common\Fridge;
use RecipeFinder\CoreBundle\Common\Recipe;
use RecipeFinder\CoreBundle\Common\Ingredient;
use Doctrine\Common\Collections\ArrayCollection;

/*
* Fridge test class
* @author Shaunak Deshmukh
* @since 1.0
*/

class FridgeTest extends \PHPUnit_Framework_TestCase {

	protected $finder;

	public function setup() {
		$this->fridge 	= new Fridge();
	}

	public function testAddIngredient() {
		$ingredient  	= new Ingredient('bread', '2', 'slices', new \DateTime());
		$this->fridge->addIngredient($ingredient);

		$count = $this->fridge->getIngredients()->count();

		$this->assertEquals(1, $count);
	}

	public function testHasIngredientsTrue() {
		$ingredient  	= new Ingredient('bread', '2', 'slices', new \DateTime());
		$this->fridge->addIngredient($ingredient);

		$rIngredient  	= new Ingredient('bread', '2', 'slices', new \DateTime());
		$ingredients    = new ArrayCollection();

		$ingredients->add($rIngredient);

		$bool = $this->fridge->hasIngredients($ingredients);

		$this->assertEquals(true, $bool);
	}

	public function testHasIngredientsFalse() {
		$ingredient  	= new Ingredient('bread', '2', 'slices', new \DateTime());
		$this->fridge->addIngredient($ingredient);

		$rIngredient  	= new Ingredient('mixed salad', '2', 'slices', null);
		$ingredients    = new ArrayCollection();

		$ingredients->add($rIngredient);

		$bool = $this->fridge->hasIngredients($ingredients);

		$this->assertEquals(false, $bool);
	}
} 

