<?php

namespace RecipeFinder\CoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\File\File;

/*
* Recipe Finder Command
* @author Shaunak Deshmukh
* @since 1.0
*/

class RecipeFinderCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('recipe-finder')
            ->setDescription('Get a recipe recommendation')
            ->addArgument(
                'recipes',
                InputArgument::REQUIRED,
                'Please provide a recipes json file'
            )
            ->addArgument(
                'fridgeItems',
                InputArgument::REQUIRED,
                'Please provide a fridge items csv'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $recipes        = $input->getArgument('recipes');
        $fridgeItems    = $input->getArgument('fridgeItems');
        $container      = $this->getContainer();

        //validate file 
        if(!is_file($recipes)) {
            $output->writeln('<error>Invalid Recipe Json file</error>');
        } else if(!is_file($fridgeItems)) {
            $output->writeln('<error>Invalid Fridge csv file</error>');
        } else {

            $finder         = $container->get('recipe_finder.common.finder');
            $validator      = $container->get('validator');

            $recipesContent = file_get_contents($recipes);
            $fridgeItems    = file_get_contents($fridgeItems);

            $model = $container->get('recipe_finder.form.model.recipe_finder_model'); 

            //map data onto the model so it can validated 
            $model->setRecipes($recipesContent);
            $model->setFridgeItems($fridgeItems);

            //validate file content
            $errors = $validator->validate($model);

            if(count($errors) > 0) {
                $output->writeln('<error>Invalid input provided</error>');
            } else {
                try { //run finder service
                    $finder->loadRecipes($model->getRecipes());
                    $finder->loadFridgeIngredients($model->getFridgeItems());

                    $recipe = $finder->recommendRecipe();
                    $output->writeln('<info>' . $recipe->getName() . '</info>');
                } catch(\Exception $e) {
                    $output->writeln('<error>' . $e->getMessage() . '</error>');
                }    
            }
        }

    }
}
