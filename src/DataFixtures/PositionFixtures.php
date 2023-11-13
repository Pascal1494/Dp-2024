<?php

namespace App\DataFixtures;

use App\Entity\Position;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;
;

class PositionFixtures extends Fixture
{
    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager): void
    {
        // $postion1 = new Position();
        // $postion1->setName('Gauche')
        //          ->setSlug($this->slugger->slug($postion1->getName()));
        // $manager->persist($postion1);
        
        // $postion2 = new Position();
        // $postion2->setName('Face')
        //          ->setSlug($this->slugger->slug($postion2->getName()));
        // $manager->persist($postion2);
        
        // $postion3 = new Position();
        // $postion3->setName('Face')
        //          ->setSlug($this->slugger->slug($postion3->getName()));
        // $manager->persist($postion3);

        // $manager->flush();


        $positions = ['Gauche', 'Face', 'Droite'];

        foreach ($positions as $positionName) {
            $position = new Position();
            $position->setName($positionName)
                     ->setSlug($this->slugger->slug($position->getName())->lower());
            $manager->persist($position);
        }

        $manager->flush();
    }
}