<?php

namespace RecipeFinder\FridgeBundle;

use RecipeFinder\FridgeBundle\Items;

/*
* Fridge class to store items in a fridge 
* @author Shaunak Deshmukh
* @since 1.0
*/

class Fridge {

	/*
		List of Items in the Fridge
	*/
	protected Items $items;

	public function _construct(Items $items) {
		$this->items = $items;
	}

	/*
	* Returns Items in a Fridge
	* @return Items 
	*/
	public function getItems() {
		return $this->items;		
	}

	/*
	* Set Items in a Fridge
	* @param Items $items 
	* @return void
	*/
	public function setItems(Items $items) {
		return $this->items;			
	}
}