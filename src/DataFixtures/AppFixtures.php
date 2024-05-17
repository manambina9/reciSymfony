<?php

namespace App\DataFixtures;

use App\Entity\Ingredients;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use phpDocumentor\Reflection\Types\This;

class AppFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }
    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i < 70 ; $i++) {
            $Ingredients = new ingredients();
            $Ingredients->setNom($this->faker->word())
                        ->setprix(mt_rand(100,1000));
            $manager->persist($Ingredients);
        }

        $manager->flush();
    }
}
