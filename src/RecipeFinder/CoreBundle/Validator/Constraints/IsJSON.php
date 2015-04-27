<?php

namespace RecipeFinder\CoreBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class IsJSON extends Constraint
{
    public $message = 'The string "%string%" must be of json format';
}
