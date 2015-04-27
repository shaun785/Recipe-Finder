<?php

namespace RecipeFinder\CoreBundle\Common;

use RecipeFinder\CoreBundle\Common\Item;

/*
* Recipe class to store items in a fridge 
* @author Shaunak Deshmukh
* @since 1.0
*/

class Recipe extends \ArrayObject {

	protected $name; 

	/*
	* List of ingerdients stored as an ArrayCollection
	*/
	protected $ingredients;

	public function _construct() {
		$this->ingredients = new ArrayCollection();
	}

	/*
	* Set Name
	* @param String $name
	* @return void
	*/
	public function setName($name) {
		$this->name = $name;
	}

	/*
	* Get Name
	* @return String name
	*/	
	public function getName() {
		return $this->name;
	}

	/*
	* Add item to ingerdients list
	* @param Item $item
	* @return void
	*/	
	public function addIngredient(Item $item) {
		$this->ingredients->add($item);
	}

	/*
	* Get Ingredients 
	* @return ArrayCollection Ingredients
	*/	
	public function getIngredients() {
		return $this->ingredients;
	}
}