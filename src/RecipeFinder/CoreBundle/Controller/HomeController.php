<?php

namespace RecipeFinder\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('RecipeFinderCoreBundle:Home:index.html.twig');
    }
}
