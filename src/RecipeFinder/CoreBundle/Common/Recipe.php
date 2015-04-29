<?php

namespace RecipeFinder\CoreBundle\Common;

use RecipeFinder\CoreBundle\Common\Ingredient;
use JMS\Serializer\Annotation\Type;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/*
* Recipe class to store items in a fridge 
* @author Shaunak Deshmukh
* @since 1.0
*/

/**
 * @Assert\Callback({"RecipeFinder\CoreBundle\Validator\Constraints\RecipeValidator", "validate"})
*/
class Recipe extends \ArrayObject {

    /**
     * @Type("string")
     * @Assert\NotBlank(message="Please enter a recipe name")
     */
	protected $name; 

    /**
     * @Type("ArrayCollection<RecipeFinder\CoreBundle\Common\Ingredient>")
	 * @Assert\All({
	 *     @Assert\Type(type="RecipeFinder\CoreBundle\Common\Ingredient"),
	 * })	 
     * @Assert\Valid(traverse = true)     
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

	/*
	* Set Earliest Ingredients Use By Date 
	* @return void
	*/	
	public function setEarliestIngredientUseBy(\DateTime $date) {
		$this->earliestIngredientUseBy = $date; 
	}

	/*
	* Get Earliest Ingredient use by date
	* @return DateTime earliestIngredientUseBy
	*/	
	public function getEarliestIngredientUseBy() {
		return $this->earliestIngredientUseBy; 	
	}
}