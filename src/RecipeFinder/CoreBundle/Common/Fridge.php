<?php

namespace RecipeFinder\CoreBundle\Common;

use RecipeFinder\CoreBundle\Common\Ingredient;
use Doctrine\Common\Collections\ArrayCollection;

/*
* Fridge class to store items in a fridge 
* @author Shaunak Deshmukh
* @since 1.0
*/

class Fridge {

	/*
		List of Ingredients stored as an Array Collection
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

	public function hasIngredients(ArrayCollection $rIngredients) {
		$foundIngredient = 0;
		
		foreach ($rIngredients as $rIngredient) {
			foreach($this->ingredients as $fIngredient) {
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