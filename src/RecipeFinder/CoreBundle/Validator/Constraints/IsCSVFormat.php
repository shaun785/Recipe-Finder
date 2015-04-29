<?php

namespace RecipeFinder\CoreBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/*
* CSV Format checker - checks if given file is in CSV format
* @author Shaunak Deshmukh
* @since 1.0
*/

/**
 * @Annotation
 */
class IsCSVFormat extends Constraint
{
    public $message = 'Invalid csv format support';
}
