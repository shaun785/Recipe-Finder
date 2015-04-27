<?php

namespace RecipeFinder\CoreBundle\Common;

use RecipeFinder\CoreBundle\Common\ItemUnit;

/*
* Item class 
* @author Shaunak Deshmukh
* @since 1.0
*/

class Item extends \ArrayObject {

	protected $name;
	
	protected $amount;

	protected $unit;

	protected $useBy;

	public function _construct($name, $amount = 0, ItemUnit $unit, \DateTime $useBy) {
		$this->name 	= $name;
		$this->amount 	= $amount;
		$this->unit 	= $unit;
		$this->useBy 	= $useBy;
	}

	/*
	* Get Name
	* @return String name	
	*/
	public function getName() {
		return $this->name;
	}

	/*
	* Set Name
	* @param String name
	* @return void	
	*/
	public function setName($name) {
		$this->name = $name;
	}

	/*
	* Get Unit
	* @return ItemUnit unit	
	*/
	public function getUnit() {
		return $this->unit;
	}

	/*
	* Set Unit
	* @param ItemUnit unit
	* @return void	
	*/
	public function setUnit($unit) {
		$this->unit = $unit;
	}

	/*
	* Set Amount
	* @param int amount
	* @return void	
	*/
	public function setAmount($amount) {
		$this->amount = $amount;
	}

	/*
	* Get Amount
	* @return int amount	
	*/
	public function getAmount() {
		return $this->amount;
	}

	/*
	* Get UseBy
	* @return DateTime useBy  	
	*/
	public function getUseby() {
		return $this->useBy;
	}

	/*
	* Set Use By
	* @param DateTime useBy
	* @return void 
	*/
	public function setUseby(\DateTime $useBy) {
		$this->useBy = $useBy;
	}
}