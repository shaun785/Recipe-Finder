<?php


namespace RecipeFinder\CoreBundle\Common;

use RecipeFinder\CoreBundle\Common\Ingredient;
use RecipeFinder\CoreBundle\Common\Fridge;
use Doctrine\Common\Collections\ArrayCollection;

/*
* Finder class to recommend a recipe
* @author Shaunak Deshmukh
* @since 1.0
*/

class Finder {
	
	/*
	  List of Recipes stored as an Array Collection 
	*/
	protected $recipes;
	protected $fridge;
	protected $serializer;

	public function __construct($serializer, $fridge) {
		$this->recipes 		= new ArrayCollection();
		$this->serializer 	= $serializer;
		$this->fridge 		= $fridge;
	}

	/*
	* Recommends a Recipe 
	* @return Recipe $recipe
	*/
	public function recommendRecipe() {
		$potentials = array();

		foreach($this->recipes as $recipe) {
			$ingredients = $recipe->getIngredients();

			if($this->fridge->hasIngredients($ingredients) == true) {
				$potentials[] = $recipe;
			}			
		}

		return $potentials;
	}	

	/*
	* Load Recipes
	* @param Json $recipes
	*/
	public function loadRecipes($recipes) {
		$this->recipes = $this->serializer->deserialize($recipes, 'ArrayCollection<RecipeFinder\CoreBundle\Common\Recipe>', 'json');	
	}

	/*
	* Load Fridge Items
	* @param String $fridgeItems - in CSV Format
	*/
	public function loadFridgeIngredients($fridgeItems) {
		$data = array_map("str_getcsv", preg_split('/\r*\n+|\r+/', $fridgeItems));
		
		foreach($data as $k => $value) {
			$name 		= $value[0];
			$amount  	= $value[1];
			$unit    	= $value[2];
			$date       = str_replace('/', '-', $value[3]);

			$item 		= new Ingredient($name, $amount, $unit, new \DateTime($date));

			$this->fridge->addIngredient($item);
		}	

	}

	/*
	* Find Recipe
	*/
	protected function addRecipe(Recipe $recipe) {
		$this->recipes->add($recipe);
	}

	protected static function mapCSVToArray($csv) {
		$array = array();

	}
}