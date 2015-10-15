<?php

namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/*
* Item Unit checker
* @author Shaunak Deshmukh
* @since 1.0
*/

/**
 * @Annotation
 */
class IsItemUnit extends Constraint
{
    public $message = 'Invalid Item unit supplied';
}
