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

	    $form = $this->createForm('recipe_finder', $data);    	
	
		if($this->getRequest()->isMethod('POST')) {
		    $form->handleRequest($this->getRequest());   

		    if($form->isValid()) {

		    }
		}

		$args['form'] = $form->createView(); 
        return $this->render('RecipeFinderCoreBundle:Home:index.html.twig', $args);
    }
}
