<?php 

namespace RecipeFinder\CoreBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use RecipeFinder\CoreBundle\Common\ItemUnit;

class IsItemUnitValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
    	if(ItemUnit::getUnit($value) == false) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('%string%', $value)
                ->addViolation();
    	} 
 	}
}
