<?php

namespace RecipeFinder\CoreBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use RecipeFinder\CoreBundle\Validator\Constraints\IsJSON;
use RecipeFinder\CoreBundle\Validator\Constraints\IsCSVFormat;

/*
* Custom Form Type for recipes
* @author Shaunak Deshmukh
* @since 1.0
*/

class RecipeFinderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('recipes', 'textarea')
            ->add('fridgeItems', 'textarea')
            ->add('send', 'submit', array('label' => 'Get Recommendation'));
    }

    public function getName()
    {
        return 'recipe_finder';
    }
}