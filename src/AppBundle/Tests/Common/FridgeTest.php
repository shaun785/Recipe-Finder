<?php

namespace AppBundle\Tests\Common;

use AppBundle\Common\Fridge;
use AppBundle\Common\Recipe;
use AppBundle\Common\Ingredient;
use Doctrine\Common\Collections\ArrayCollection;

/*
* Fridge test class
* @author Shaunak Deshmukh
* @since 1.0
*/

class FridgeTest extends \PHPUnit_Framework_TestCase
{
    protected $finder;

    /*
    * Setup a fridge object
    */
    public function setup()
    {
        $this->fridge    = new Fridge();
    }

    /*
    * Test Adding an ingredient to a Fridge
    */
    public function testAddIngredient()
    {
        $ingredient    = new Ingredient('bread', '2', 'slices', new \DateTime());
        $this->fridge->addIngredient($ingredient);

        $count = $this->fridge->getIngredients()->count();

        $this->assertEquals(1, $count);
    }

    /*
    * Test to check if a given set of ingredients are in the fridge
    */
    public function testHasIngredientsTrue()
    {
        $ingredient    = new Ingredient('bread', '2', 'slices', new \DateTime());
        $this->fridge->addIngredient($ingredient);

        $rIngredient    = new Ingredient('bread', '2', 'slices', new \DateTime());
        $ingredients    = new ArrayCollection();

        $ingredients->add($rIngredient);

        $bool = $this->fridge->hasIngredients($ingredients);

        $this->assertEquals(true, $bool);
    }

    /*
    * Test to check if a given set of ingredients are not in the fridge
    */
    public function testHasIngredientsFalse()
    {
        $ingredient    = new Ingredient('bread', '2', 'slices', new \DateTime());
        $this->fridge->addIngredient($ingredient);

        $rIngredient    = new Ingredient('mixed salad', '2', 'slices', null);
        $ingredients    = new ArrayCollection();

        $ingredients->add($rIngredient);

        $bool = $this->fridge->hasIngredients($ingredients);

        $this->assertEquals(false, $bool);
    }
}
