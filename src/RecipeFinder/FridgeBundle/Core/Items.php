<?php

namespace RecipeFinder\FridgeBundle;

use Symfony\Component\Validator\Constraints as Assert;

/*
* Items class to store individual items 
* @author Shaunak Deshmukh
* @since 1.0
*/

class Items implements Iterator {

	private $position = 0;

	/*
	  Stores an Array of Items
	*/
	protected Array $items;

	public function _construct() {
		$this->position = 0;
	} 

	/*
	* Adds an item to an array
	* @param Array $item array('name' => ')
	*/
	public function addItem(Array $item) {
		$this->items[] = $item;
	}

	public function removeItem(int $key) {
		unset($this->item[$key]);
	}

    public function rewind() {
        $this->position = 0;
    }

    public function current() {
        return $this->items[$this->position];
    }

    public function key() {
        return $this->position;
    }

    public function next() {
        ++$this->position;
    }

    public function valid() {
        return isset($this->items[$this->position]);
    }
}