<?php

namespace App\DataFixtures;

use App\Entity\Etage;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;
;

class EtageFixtures extends Fixture
{
    private $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i <13 ; $i++) { 
        $etage = new Etage();
        $etage->setNumber($i)
              ->setSlug($this->slugger->slug($etage->getNumber()));
              $manager->persist($etage);
            }
            
            
            $manager->flush();
            // dd($etage);
    }
}