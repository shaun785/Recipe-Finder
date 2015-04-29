<?php

namespace RecipeFinder\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use RecipeFinder\CoreBundle\Form\Type\RecipeFinderType;
use RecipeFinder\CoreBundle\Form\Model\RecipeFinderForm;
use Symfony\Component\Form\FormError;
use RecipeFinder\CoreBundle\Common\Item;
/*
* Home Controller
* @author Shaunak Deshmukh
* @since 1.0
*/

class HomeController extends Controller
{
    public function indexAction()
    {
		$args = array();

		// get form model
		$data = $this->get('recipe_finder.form.model.recipe_finder_model');	

		$sampleData = $this->getSampleData(); //get sample data for testing purpose

		$data->setRecipes($sampleData['recipes']);
		$data->setFridgeItems($sampleData['fridgeItems']);

		$form = $this->createForm('recipe_finder', $data);    	

		if($this->getRequest()->isMethod('POST')) {
			$form->handleRequest($this->getRequest());   

			if($form->isValid()) {
				$finder = $this->get('recipe_finder.common.finder');
				$data 	= $form->getData();

				try {  //load data into the finder service
			    	$finder->loadRecipes($data->getRecipes());
			    	$finder->loadFridgeIngredients($data->getFridgeItems());	

			    	$recipe = $finder->recommendRecipe();	    	

			    	if($recipe) {
					    $args['recipe'] = $recipe;
					} else {
						$args['orderTakeout'] = 'Order Takeout';
					}
				} catch(\Exception $e) {
					$args['error'] = $e->getMessage();
				}	
			}
		}

		$args['form'] = $form->createView(); 
		return $this->render('RecipeFinderCoreBundle:Home:index.html.twig', $args);
    }

    /* 
     * Get Sample Data
     * @return Array $data
    */
    protected function getSampleData() {
		$data = array();

		//sample data
		$data['recipes'] 			= file_get_contents(__DIR__.'/../Resources/public/data/recipes.json');
		$data['fridgeItems'] 		= file_get_contents(__DIR__.'/../Resources/public/data/fridge.csv');
		return $data;
    }
}

