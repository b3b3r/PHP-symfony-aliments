<?php

namespace App\DataFixtures;

use App\Entity\Aliment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $a1 = new Aliment();
        $a1->setName("Carotte")
            ->setCalories(36)
            ->setPrice(1.80)
            ->setPicture("aliments/carotte.png")
            ->setProteines(0.45)
            ->setGlucides(0.32)
            ->setLipides(0.11);
        $manager->persist($a1);

        $a2 = new Aliment();
        $a2->setName("Tomate")
            ->setCalories(51)
            ->setPrice(2.80)
            ->setPicture("aliments/tomate.png")
            ->setProteines(0.35)
            ->setGlucides(0.12)
            ->setLipides(0.18);
        $manager->persist($a2);

        $a3 = new Aliment();
        $a3->setName("Pomme")
            ->setCalories(56)
            ->setPrice(1.30)
            ->setPicture("aliments/pomme.png")
            ->setProteines(0.85)
            ->setGlucides(0.62)
            ->setLipides(0.84);
        $manager->persist($a3);

        $a4 = new Aliment();
        $a4->setName("Patate")
            ->setCalories(87)
            ->setPrice(0.99)
            ->setPicture("aliments/patate.png")
            ->setProteines(0.94)
            ->setGlucides(0.79)
            ->setLipides(0.56);
        $manager->persist($a4);

        $manager->flush();
    }
}
