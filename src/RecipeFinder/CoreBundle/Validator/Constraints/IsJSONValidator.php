<?php 

namespace RecipeFinder\CoreBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/*
* Json Constraint - Check if the input is a valid json
* @author Shaunak Deshmukh
* @since 1.0
*/

class IsJSONValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
                
    	$json = json_decode($value);

        if (!$json) {            
            $this->context->buildViolation($constraint->message)
                ->setParameter('%string%', $value)
                ->addViolation();
        } else if(count($json) == 0) {
            $this->context->buildViolation('The json object cannot be empty')
                ->setParameter('%string%', $value)
                ->addViolation();
        }
    }
}
