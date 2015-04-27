<?php

namespace RecipeFinder\CoreBundle\Common;

use RecipeFinder\CoreBundle\Common\Item;
use Doctrine\Common\Collections\ArrayCollection;

/*
* Fridge class to store items in a fridge 
* @author Shaunak Deshmukh
* @since 1.0
*/

class Fridge {

	/*
		List of Items stored as an Array Collection
	*/
	protected $items; 

	public function _construct() {
		$this->items = new ArrayCollection();
	}

	/*
	* Get items
	* @return ArrayCollection $items
	*/
	public function getItems() {
		return $this->items;
	}

	/*
	* Add Item to the fridge
	* @param Item $item
	* @return void
	*/
	public function addToItems(Item $item) {
		$this->items->add($item);
	}

}