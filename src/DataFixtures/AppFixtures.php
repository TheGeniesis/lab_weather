<?php

namespace App\DataFixtures;

use App\Entity\Example;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $wind =  [
            "N",
            "NE",
            "NW",
            "S",
            "SE",
            "SW",
            "W",
            "E"
            ];

        for ($i= 0; $i< 100; ++$i)
        {
            $example = new Example();

            $example->setHumility(mt_rand(0, 100));
            $example->setTemp(mt_rand(0, 100));
            $example->setRainfall(mt_rand(0, 1000));
            $example->setWindDirection($wind[mt_rand(0,count($wind)-1)]);
            $manager->persist($example);
            $manager->flush();
        }
    }
}
