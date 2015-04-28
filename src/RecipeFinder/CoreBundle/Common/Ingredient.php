<?php

namespace RecipeFinder\CoreBundle\Common;

use RecipeFinder\CoreBundle\Common\ItemUnit;

use JMS\Serializer\Annotation\Type;

/*
* Item class 
* @author Shaunak Deshmukh
* @since 1.0
*/
 
class Ingredient  {

    /**
     * @Type("string")
    */
	protected $item;
	
	/**
     * @Type("integer")
    */
	protected $amount;

	/**
     * @Type("string")
    */
	protected $unit;

	/**
     * @Type("string")
    */
	protected $useBy;

	public function __construct($item, $amount = 0, $unit, \DateTime $useBy = null) {
		$this->item 	= $item;
		$this->amount 	= $amount;
		$this->unit 	= $unit;
		$this->useBy 	= $useBy;
	}

	/*
	* Get item
	* @return String item	
	*/
	public function getitem() {
		return $this->item;
	}

	/*
	* Set item
	* @param String item
	* @return void	
	*/
	public function setitem($item) {
		$this->item = $item;
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

	public function isPastUseBy() {
		if(!$this->useBy || $this->useBy->getTimestamp() <= strtotime(date('Y-m-d')))
			return true;
		return false;		
	}
}