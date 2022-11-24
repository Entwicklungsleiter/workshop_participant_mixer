<?php

namespace App\DataFixtures;

use App\Entity\Course;
use App\Factory\CourseFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CourseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
         $course = new Course();
         $course->setName('Learning how to repair a bicycle');
         $manager->persist($course);

         CourseFactory::createMany(100);

        $manager->flush();
    }
}
