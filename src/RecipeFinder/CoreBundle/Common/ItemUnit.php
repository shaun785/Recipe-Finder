<?php

namespace RecipeFinder\CoreBundle\Common;

/*
* Describes item units as ENUM type
* @author Shaunak Deshmukh
* @since 1.0
*/

class ItemUnit {
    const OF     	= 'of';
    const GRAMS     = 'grams';
    const ML        = 'ml';
    const SLICES    = 'slices';

    /*
    * Get Unit	
    * @param String $val
    * @return ITEMUnit
    */
    public static function getUnit($val) {
    	switch(strtolower($val)) {
    		case "of":
    			return self::OF;
    		case "grams":
    			return self::GRAMS;
			case "ml":
				return self::ML;
			case "slices":
				return self::SLICES;				    				
    	}
    }
}