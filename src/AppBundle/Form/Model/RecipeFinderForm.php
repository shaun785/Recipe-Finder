<?php 

namespace AppBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Validator\Constraints as RecipeFinderAsserts;

/*
* Custom Recipe Finder Model
* @author Shaunak Deshmukh
* @since 1.0
*/

class RecipeFinderForm
{
    /**
     * @Assert\NotBlank()
     * @RecipeFinderAsserts\IsJSON
    */
    protected $recipes;

    /**
     * @Assert\NotBlank()
     * @RecipeFinderAsserts\IsCSVFormat     
    */
    protected $fridgeItems;

    /*
    * Set Recipes 
    * @param Json Format $recipes
    * @return void
    */
    public function setRecipes($recipes)
    {
        $this->recipes = $recipes;
    }

    /*
    * Get Recipes 
    * @return Json Format $recipes
    */
    public function getRecipes()
    {
        return $this->recipes;
    }

    /*
    * Set Fridge Items 
    * @param CSV Format Fridge Items
    * @return void
    */
    public function setFridgeItems($fridgeItems)
    {
        $this->fridgeItems = $fridgeItems;
    }

    /*
    * Get Fridge Items 
    * @return CSV Format $fridgeItems
    */
    public function getFridgeItems()
    {
        return $this->fridgeItems;
    }
}
