<?php

namespace App\DataFixtures;

use App\Entity\Projects;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ProjectsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create('fr_fr');

        for ($i = 0; $i <= 4; $i++) {
            $project = new Projects();
            $project->setNom($faker->words(3, true));
            $project->setDescription($faker->text);
            $project->setConditions($faker->words(5, true));
            $project->setLanguage($faker->languageCode);

            $manager->persist($project);
            $manager->flush();

        }

        $manager->flush();
    }
}
