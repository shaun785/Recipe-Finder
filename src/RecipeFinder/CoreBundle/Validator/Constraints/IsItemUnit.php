<?php

namespace RecipeFinder\CoreBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class IsItemUnit extends Constraint
{
    public $message = 'Invalid Item unit supplied';
}
