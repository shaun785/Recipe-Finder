<?php 

namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Context\ExecutionContextInterface;

/*
* Recipe Validator - validates a recipe object
* @author Shaunak Deshmukh
* @since 1.0
*/

class RecipeValidator
{
    public static function validate($object, ExecutionContextInterface $context)
    {
        if (!$object->getIngredients() || $object->getIngredients()->count() == 0) { //check if the ingredients are empty
            $context->buildViolation('No ingredients found for recipe ' . $object->getName())
                    ->addViolation();
        }
    }
}
