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
        $counter = 0;
        
        for ($i=0; $i <13 ; $i++) { 
        $etage = new Etage();
        $etage->setNumber($i)
              ->setSlug($this->slugger->slug($etage->getNumber()));
              $manager->persist($etage);
            }
        
            
            
            $manager->flush();
            // dd($etage);
    }

    public function createEtage(string $name, ObjectManager $manager)
    {
        $etage = new Etage();
        $etage->setName($name);
        $etage->setSlug($this->slugger->slug($etage->getName())->lower());
        $manager->persist($etage);

        $this->addReference('cat-'.$this->counter, $etage);
        $this->counter++;

        return $etage;
    }
}