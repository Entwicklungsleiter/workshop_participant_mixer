<?php

namespace App\DataFixtures;

use App\Entity\Course;
use App\Entity\Exercise;
use App\Factory\CourseFactory;
use App\Factory\ExerciseFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ExerciseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $course = new Course();
        $course->setName('Bicycle Touring Howto');
        $manager->persist($course);

        $exercise = new Exercise();
        $exercise->setName('We practice cleaning our bicycle.');
        $exercise->setMaxPeople(5);
        $exercise->setCourse( $course);
        $manager->persist($exercise);

        ExerciseFactory::createMany(12);

        $manager->flush();
    }
}
