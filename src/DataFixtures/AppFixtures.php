<?php

namespace App\DataFixtures;

use App\Entity\InformationAboutMe;
use App\Entity\Wpis;
use App\Entity\Image;
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
        $wpis->setDateAdded(new \DateTime('2024-05-12'));

        $manager->persist($wpis);
        $idWpis = $wpis->getId();

        $wpis2 = new Wpis();
        $wpis2->setContent("Szukam drobnej robory, takiej jak pomoc w ogrodku lub wyprowadzanie zwierzat");
        $wpis2->setTitle("Szukam pracy");
        $wpis2->setCategory("szukajacy");
        $wpis2->setDateAdded(new \DateTime('2024-05-24'));

        $manager->persist($wpis2);

        $wpis3 = new Wpis();
        $wpis3->setContent("Oferuje prace przy wyprowadzaniu zwierzat, chetnych prosze o kontakt telefoniczny: 000 000 000");
        $wpis3->setTitle("Wyprowadzanie zwierzat");
        $wpis3->setCategory("oferujacy");
        $wpis3->setDateAdded(new \DateTime('2024-06-02'));

        $manager->persist($wpis3);

        $imie = new InformationAboutMe();
        $imie->setKey('name');
        $imie->setValue('Anna');

        $manager->persist($imie);

        $nazwisko = new InformationAboutMe();
        $nazwisko->setKey('surname');
        $nazwisko->setValue('Bork');

        $manager->persist($nazwisko);

        $image = new Image();
        $image->setTitle("kotek");
        $image->setPosts($idWpis);
        $image->setPath("/images/kotek.jpg");
        $image->setAlt("zdjecie kotka chyba");

        $manager->persist($image);

        $manager->flush();
    }
}
