<?php

namespace App\DataFixtures;

use App\Entity\Cave;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;
;

class CaveFixtures extends Fixture
{

    private $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }


    public function load(ObjectManager $manager): void
    {
        for ($i=1; $i < 301; $i++) { 
            # code...
            $cave = new Cave();
            $cave->setNumber($i)
                 ->setSlug($this->slugger->slug($cave->getNumber()));
            $manager->persist($cave);
        }
        
        $manager->flush();
        // dd($cave);
    }
}