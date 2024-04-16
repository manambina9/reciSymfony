<?php

namespace App\DataFixtures;

use App\Entity\Ingredients;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $Ingredients = new ingredients();
        $Ingredients->setnom('ingredients #1')
                    ->setPrice(3.0);
                    
        $manager->persist($Ingredients);

        $manager->flush();
    }
}
