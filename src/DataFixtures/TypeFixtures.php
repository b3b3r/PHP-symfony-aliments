<?php

namespace App\DataFixtures;

use App\Entity\Aliment;
use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $t1 = new Type();
        $t1->setLabel("Fruits")
            ->setPicture("fruits.jpg");
        $manager->persist($t1);

        $t2 = new Type();
        $t2->setLabel("Légumes")
            ->setPicture("legumes.jpg");
        $manager->persist($t2);

        $alimentRepository = $manager->getRepository(Aliment::class);

        $allAliments = $alimentRepository->findAll();

        foreach ($allAliments as $aliment) {
            if(preg_match('(Carotte|Tomate|Patate)', $aliment->getName()) === 1) { 
                $aliment->setType($t2);
                $manager->persist($aliment);
            } else {
                $aliment->setType($t1);
                $manager->persist($aliment);
            }
            
            
        }

        $manager->flush();
    }
}
