<?php

namespace App\DataFixtures;

use App\Factory\CourseFactory;
use App\Factory\ExerciseFactory;
use App\Factory\ExerciseGroupFactory;
use App\Factory\StudentFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ExerciseGroupFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        CourseFactory::createMany(2);
        StudentFactory::createMany(20);
        ExerciseFactory::createMany(5);

        $manager->flush();

        ExerciseGroupFactory::createMany(10);
    }
}
