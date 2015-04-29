<?php

namespace RecipeFinder\CoreBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class IsCSVFormat extends Constraint
{
    public $message = 'Invalid csv format support';
}
