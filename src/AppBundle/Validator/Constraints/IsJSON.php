<?php

namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/*
* Json Format checker
* @author Shaunak Deshmukh
* @since 1.0
*/

/**
 * @Annotation
 */
class IsJSON extends Constraint
{
    public $message = 'Invalid json object detected';
}
