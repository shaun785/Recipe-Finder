<?php

use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use RecipeFinder\CoreBundle\Command\RecipeFinderCommand;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/*
* Recipe Finder Command test
* @author Shaunak Deshmukh
* @since 1.0
*/

class RecipeFinderCommandTest extends WebTestCase
{
    public function testExecute()
    {
		static::$kernel = static::createKernel();
    	static::$kernel->boot();        

    	$application = new Application(static::$kernel);
        $application->add(new RecipeFinderCommand());

        $command = $application->find('recipe-finder');
        $commandTester = new CommandTester($command);

        //test invalid scenario
        $commandTester->execute(
            array(
                'recipes'    => 'Fabien',
                'fridgeItems'  => 'test',
            )
        );

        //test valid scenario
        $this->assertRegExp('/Invalid Recipe Json file/', $commandTester->getDisplay());

    	$recipesJson 	= __DIR__ . '/../../Resources/public/data/recipes.json';
    	$fridgeCSV   	= __DIR__ . '/../../Resources/public/data/fridge.csv';

        $commandTester->execute(
            array(
                'recipes'    	=> $recipesJson,
                'fridgeItems'  	=> $fridgeCSV
            )
        );

        $this->assertRegExp('/Grilled cheese on toast/', $commandTester->getDisplay());
    }
}