<?php 

namespace RecipeFinder\CoreBundle\Validator\Constraints;

use Symfony\Component\Validator\Context\ExecutionContextInterface;
/*
* Recipe Validator - validates a recipe
* @author Shaunak Deshmukh
* @since 1.0
*/

class RecipeValidator {

    public static function validate($object, ExecutionContextInterface $context)
    {
        if(!$object->getIngredients() || $object->getIngredients()->count() == 0) {
            $context->buildViolation('No ingredients found for recipe ' . $object->getName())
                    ->addViolation();
        }
    }
}
