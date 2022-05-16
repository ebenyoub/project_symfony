<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Recepe;
use App\Entity\Ingredient;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    /**
     * @var Generator
     */

    private Generator $faker;

    public function __construct() 
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        // Ingredients 
        $ingredients = [];
        for ($i = 0; $i < 50; $i++) 
        {
            $ingredient = new Ingredient();
            $ingredient->setName($this->faker->word())
                ->setPrice(mt_rand(0, 100));

            $ingredients[] = $ingredient;
            $manager->persist($ingredient);
        }
        
        // Recepes 
        $recepes = [];
        for ($i = 0; $i < 25; $i++) 
        {
            $recepe = new Recepe();
            $recepe->setName($this->faker->word())
                ->setTime(mt_rand(1, 1440))
                ->setNbPeople(mt_rand(1, 50))
                ->setDifficulty(mt_rand(1, 5))
                ->setDescription($this->faker->text(300))
                ->setPrice(mt_rand(1, 1000))
                ->setIsFavorite(mt_rand(0, 1) == 1 ? true : false);

            for ($k = 0; $k < mt_rand(5, 15); $k++)
            { 
                $recepe->addIngredient($ingredients[mt_rand(0, count($ingredients) - 1)]);
            }

            $recepes[] = $recepe;
            $manager->persist($recepe);
        }


        $manager->flush();
    }
}
