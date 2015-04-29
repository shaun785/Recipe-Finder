Recipe Finder
========================

This program is a solution to the Recipe Finder Challenge. It is developed using [Symfony2](http://symfony.com]).

Latest Stable Version - 1.0

### Prerequisites

- PHP 5.5.*
- Nginx or Apache
- Symfony2
- Composer

### Installation

Run composer:

```composer install```

### Run

```php app/console recipe-finder <path-to-recipes.json> <path-to-fridge-items.csv>```

Sample data can be found at - src\RecipeFinder\CoreBundle\Resources\public\data

### Tests

```phpunit -c app/```

### Demo

A basic demo website can be found at - [View Website](http://boiling-retreat-9855.herokuapp.com)

## Symfony2 Techniques

The following symfony2 techniques have been used - 

- Custom Constraints (src\RecipeFinder\CoreBundle\Validator\Constraints)
- Unit and Integration Tests (src\RecipeFinder\CoreBundle\Tests)
- Dependancy Injections (src\RecipeFinder\CoreBundle\Resources\config\services.yml)
- Json to Object Serializing using JMS Serializer
- Custom Asserts using to Annotations (src\RecipeFinder\CoreBundle\Common)
