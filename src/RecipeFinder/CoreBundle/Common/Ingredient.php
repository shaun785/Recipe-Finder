<?php

namespace RecipeFinder\CoreBundle\Common;

use RecipeFinder\CoreBundle\Common\ItemUnit;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation\Type;
use RecipeFinder\CoreBundle\Validator\Constraints AS RecipeFinderAsserts;

/*
* Item class 
* @author Shaunak Deshmukh
* @since 1.0
*/
 
class Ingredient  {

    /**
     * @Type("string")
	 * @Assert\NotBlank(message="Item name is missing"))
     * 
    */
	protected $item;
	
	/**
     * @Type("integer")
	 * @Assert\NotBlank(message="Amount must be an integer")
	 * @Assert\Type(type="integer", message = "Amount must be an integer")
	 * @Assert\Range(min=0)	 
    */
	protected $amount;

	/**
     * @Type("string")
	 * @Assert\NotBlank(message="Unit not provided");
	 * @RecipeFinderAsserts\IsItemUnit
    */
	protected $unit;

	/**
     * @Type("string")
     * @Assert\DateTime
     */
	protected $useBy;

	public function __construct($item, $amount = 0, $unit, $useBy = null) {
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