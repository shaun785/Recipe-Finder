<?php

namespace RecipeFinder\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use RecipeFinder\CoreBundle\Form\Type\RecipeFinderType;
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
    	$data = array();	

    	//sample data
    	$data['recipes'] 	=  file_get_contents(__DIR__.'/../Resources/public/data/recipes.json');
    	$data['fridgeItems'] =  file_get_contents(__DIR__.'/../Resources/public/data/fridge.csv');

	    $form = $this->createForm('recipe_finder', $data);    	
	
		if($this->getRequest()->isMethod('POST')) {
		    $form->handleRequest($this->getRequest());   

		    if($form->isValid()) {
		    	$finder = $this->get('recipe_finder.common.finder');
		    	$data 	= $form->getData();

		    	$finder->loadRecipes($data['recipes']);
		    	$finder->loadFridgeIngredients($data['fridgeItems']);	

		    	$recipe = $finder->recommendRecipe();	    	

		    	if($recipe) {
				    $args['recipe'] = $recipe;
				} else {
					$args['orderTakeout'] = 'Order Takeout';
				}
		    }
		}
		$args['form'] = $form->createView(); 
        return $this->render('RecipeFinderCoreBundle:Home:index.html.twig', $args);
    }
}
