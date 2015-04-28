<?php

namespace RecipeFinder\CoreBundle\Common;

use RecipeFinder\CoreBundle\Common\Ingredient;
use JMS\Serializer\Annotation\Type;
use Doctrine\Common\Collections\ArrayCollection;

/*
* Recipe class to store items in a fridge 
* @author Shaunak Deshmukh
* @since 1.0
*/

class Recipe extends \ArrayObject {

    /**
     * @Type("string")
     */
	protected $name; 

    /**
     * @Type("ArrayCollection<RecipeFinder\CoreBundle\Common\Ingredient>")
    */
	protected $ingredients;


    /**
     * @Type("string")
    */	
    protected $earliestIngredientUseBy;

	public function __construct() {
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
	* Get Ingredients 
	* @return ArrayCollection Ingredients
	*/	
	public function getIngredients() {
		return $this->ingredients;
	}

	public function setEarliestIngredientUseBy(\DateTime $date) {
		$this->earliestIngredientUseBy = $date; 
	}

	public function getEarliestIngredientUseBy() {
		return $this->earliestIngredientUseBy; 	
	}
}