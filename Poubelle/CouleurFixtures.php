<?php

namespace App\DataFixtures;

use App\Entity\Couleur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
;

class CouleurFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
         $color1 = new Couleur();
         $color1->setName('Jaune');
         $manager->persist($color1);

         $color2 = new Couleur();
         $color2->setName('Noir');
         $manager->persist($color2);
                

         $color3 = new Couleur();
         $color3->setName('Rouge');
         $manager->persist($color3);
                

         $color4 = new Couleur();
         $color4->setName('Marron');
         $manager->persist($color4);
                

         $color5 = new Couleur();
         $color5->setName('Bleu');
         $manager->persist($color5);
                

         $color6 = new Couleur();
         $color6->setName('Gris');
         $manager->persist($color6);
                
         $color7 = new Couleur();
         $color7->setName('Vert');
         $manager->persist($color7);
                
         $color8 = new Couleur();
         $color8->setName('Bleu/Gris');
         $manager->persist($color8);
                

        $manager->flush();
    }
}