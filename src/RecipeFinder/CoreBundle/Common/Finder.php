<?php


namespace RecipeFinder\CoreBundle\Common;

use RecipeFinder\CoreBundle\Common\Item;
use namespace Doctrine\Common\Collections\ArrayCollection;

/*
* Finder class to recommend a recipe
* @author Shaunak Deshmukh
* @since 1.0
*/

class Finder {
	
	/*
	  List of Recipes stored as an Array Collection 
	*/
	protected $this->recipes;

	protected function _construct() {
		$this->recipes = new ArrayCollection();
	}

	/*
	* Find Recipe
	*/
	public function findRecipe() {

	}	

	/*
	* Find Recipe
	*/
	public function loadRecipes() {
	}

	/*
	* Find Recipe
	*/
	protected function addRecipe(Recipe $recipe) {
		$this->recipes->add($recipe);
	}
}