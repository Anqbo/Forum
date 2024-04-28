<?php

namespace App\DataFixtures;

use App\Entity\Wpis;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $wpis = new Wpis();
        $wpis ->setContent("Zatrudnie osobe ktora zasadzi pomidory");
        $wpis ->setTitle("Pomidory");
        $wpis->setCategory("oferujacy");

        $manager->persist($wpis);

        $wpis2 = new Wpis();
        $wpis2->setContent("Szukam drobnej robory, takiej jak pomoc w ogrodku lub wyprowadzanie zwierzat");
        $wpis2->setTitle("Szukam pracy");
        $wpis2->setCategory("szukajacy");

        $manager->persist($wpis2);

        $manager->flush();
    }
}
