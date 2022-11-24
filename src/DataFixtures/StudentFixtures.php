<?php

namespace App\DataFixtures;

use App\Entity\Student;
use App\Factory\StudentFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StudentFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $student = new Student();
        $student->setName('Stefan Rank-Kunitz');
        $manager->persist($student);

        StudentFactory::createMany(100);

        $manager->flush();
    }
}
