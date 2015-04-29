<?php 

namespace RecipeFinder\CoreBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/*
* CSV Format Validator - checks if given file is in Fridge CSV format
* @author Shaunak Deshmukh
* @since 1.0
*/

class IsCSVFormatValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
    	$data = array_map("str_getcsv", preg_split('/\r*\n+|\r+/', $value));

		if(count($data[0]) != 4) { //if the csv format does not contain four fields per line then return an error
			$this->context->buildViolation($constraint->message)
            	          ->setParameter('%string%', $value)
                		  ->addViolation();				
		}    		
 	}
}
