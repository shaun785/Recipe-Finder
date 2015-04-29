<?php

namespace RecipeFinder\CoreBundle\Common;

use RecipeFinder\CoreBundle\Common\Ingredient;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/*
* Fridge class to store items in a fridge 
* @author Shaunak Deshmukh
* @since 1.0
*/

/**
 * @Assert\Callback({"RecipeFinder\CoreBundle\Validator\Constraints\FridgeValidator", "validate"})
*/

class Fridge {

	/*
	 * @Assert\All({
	 *     @Assert\Type(type="RecipeFinder\CoreBundle\Common\Ingredient"),
	 * })	 
     * @Assert\Valid(traverse = true)     
    */
	protected $ingredients; 

	public function __construct() {
		$this->ingredients = new ArrayCollection();
	}

	/*
	* Get ingredients
	* @return ArrayCollection $ingredients
	*/
	public function getIngredients() {
		return $this->ingredients;
	}

	/*
	* Add Item to the fridge
	* @param Item $item
	* @return void
	*/
	public function addIngredient(Ingredient $item) {
		$this->ingredients->add($item);
	}

	/*
	* Check if Fridge contains the give ingredients
	* @param ArrayCOllection<Ingredients> $rIngredients
	* @return bool true if all ingredients exists
	*/
	public function hasIngredients(ArrayCollection $rIngredients) {
		$foundIngredient = 0;
		
		foreach ($rIngredients as $rIngredient) {
			foreach($this->ingredients as $fIngredient) { //get items in the fridge
				// check to see if ingredient is past it's use by date
				if($fIngredient->isPastUseBy() == true) {
					continue;
				}

			    if($fIngredient->getItem() == $rIngredient->getItem() && $fIngredient->getUnit() == $rIngredient->getUnit() && $fIngredient->getAmount() >= $rIngredient->getAmount()) {
			    	$foundIngredient += 1;
			    }
		    }
		}

		if($rIngredients->count() == $foundIngredient) {
			return true;
		}
	}

	/*
	* Get use by dates on given ingredients and sort them in ASC order
	* @param ArrayCOllection<Ingredients> $rIngredients
	* @return Array $useyDates
	*/
	public function getIngredientsUseByDates(ArrayCollection $rIngredients) {
		$useByDates = array();
		
		foreach ($rIngredients as $rIngredient) {
			foreach($this->ingredients as $fIngredient) {
				// check to see if ingredient is past it's use by date
				if($fIngredient->isPastUseBy() == true) {
					continue;
				}

			    if($fIngredient->getItem() == $rIngredient->getItem() && $fIngredient->getUnit() == $rIngredient->getUnit() && $fIngredient->getAmount() >= $rIngredient->getAmount()) {
			    	$useByDates[] = $fIngredient->getUseBy();
			    }
		    }
		}

		sort($useByDates);

		return $useByDates;
	}
}