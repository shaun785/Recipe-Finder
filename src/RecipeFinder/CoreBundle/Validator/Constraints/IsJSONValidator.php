<?php 

namespace RecipeFinder\CoreBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class IsJSONValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (!json_decode($value)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('%string%', $value)
                ->addViolation();
        }
    }
}
