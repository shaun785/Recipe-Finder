<?php 

namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use AppBundle\Common\ItemUnit;

/*
* Item Unit Validator
* @author Shaunak Deshmukh
* @since 1.0
*/

class IsItemUnitValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (ItemUnit::getUnit($value) == false) { //check if the given unit is valid
            $this->context->buildViolation($constraint->message)
                ->setParameter('%string%', $value)
                ->addViolation();
        }
    }
}
