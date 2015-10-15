<?php 

namespace AppBundle\Validator\Constraints;

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

        if (!$json) { //check if the given value is json format           
            $this->context->buildViolation($constraint->message)
                ->setParameter('%string%', $value)
                ->addViolation();
        } elseif (count($json) == 0) { //check if the json object is empty
            $this->context->buildViolation('The json object cannot be empty')
                ->setParameter('%string%', $value)
                ->addViolation();
        }
    }
}
