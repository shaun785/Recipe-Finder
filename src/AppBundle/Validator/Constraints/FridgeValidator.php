<?php 

namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Context\ExecutionContextInterface;

/*
* Fridge Validator - validates the Fridge object
* @author Shaunak Deshmukh
* @since 1.0
*/

class FridgeValidator
{
    public static function validate($object, ExecutionContextInterface $context)
    {
        //check to see if the Fridge csv contains any ingredients
        if (!$object->getIngredients() || $object->getIngredients()->count() == 0) {
            $context->buildViolation('No ingredients found for recipe ' . $object->getName())
                    ->addViolation();
        }
    }
}
