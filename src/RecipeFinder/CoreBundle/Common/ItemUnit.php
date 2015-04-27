<?php

namespace RecipeFinder\CoreBundle\Common;

/*
* Describes item units as ENUM type
* @author Shaunak Deshmukh
* @since 1.0
*/

class ItemUnit extends \SplEnum {
    const OF     	= 'of';
    const GRAMS     = 'grams';
    const ML        = 'ml';
    const SLICES    = 'slices'
}